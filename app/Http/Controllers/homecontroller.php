<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Pengaduan_Instansi;
use App\Models\Pengguna;
use App\Models\Komentar;
use App\Models\Tanggapan;
use App\Models\Dukungan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Menampilkan form pengaduan.
     *
     * @return \Illuminate\Http\Response
     */
    public function lapor()
    {
        // Mengambil data kategori
        $kategori = Kategori::all();
        
        // Mengambil data instansi
        $instansi = Instansi::all();
        
        // Mengambil data instansi terhangat (berdasarkan jumlah pengaduan)
        $instansiTerhangat = DB::table('pengaduan_instansi')
            ->join('instansi', 'pengaduan_instansi.id_instansi', '=', 'instansi.id_instansi')
            ->select('instansi.id_instansi', 'instansi.nama_instansi', DB::raw('count(*) as total'))
            ->groupBy('instansi.id_instansi', 'instansi.nama_instansi')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();
        
        // Inisialisasi variabel statistik
        $userStats = [
            'terverifikasi' => 0,
            'diproses' => 0,
            'selesai' => 0
        ];
        
        // Jika user login, ambil data statistik
        if (Auth::check()) {
            $userStats = [
                'terverifikasi' => Pengaduan::where('id_pengguna', Auth::id())
                    ->where('status', 'Diverifikasi')
                    ->count(),
                'diproses' => Pengaduan::where('id_pengguna', Auth::id())
                    ->where('status', 'Diproses')
                    ->count(),
                'selesai' => Pengaduan::where('id_pengguna', Auth::id())
                    ->where('status', 'Selesai')
                    ->count()
            ];
        }
        
        // Ambil data pengaduan untuk listing
        $pengaduanList = Pengaduan::with(['pengguna', 'kategori'])
            ->orderBy('created_at', 'desc')
            ->limit(7)
            ->get();
            
        // Ambil pengaduan user jika login
        $userPengaduan = [];
        if (Auth::check()) {
            $userPengaduan = Pengaduan::where('id_pengguna', Auth::id())
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        }
        
        // Ambil pengaduan terhangat (dengan jumlah komentar terbanyak)
        $trendingPengaduan = DB::table('pengaduan')
            ->select('pengaduan.*')
            ->selectRaw('(SELECT COUNT(*) FROM komentar WHERE komentar.id_pengaduan = pengaduan.id_pengaduan) as comment_count')
            ->orderByRaw('comment_count DESC')
            ->limit(5)
            ->get();
        
        // Ambil pengaduan terbaru untuk Kisah Sukses
        $successStories = Pengaduan::where('status', 'Selesai')
            ->orderBy('updated_at', 'desc')
            ->limit(3)
            ->get();
        
        return view('homepage.home', compact(
            'kategori', 
            'instansi', 
            'instansiTerhangat',
            'userStats',
            'pengaduanList',
            'userPengaduan',
            'trendingPengaduan',
            'successStories'
        ));
    }

    /**
     * Menyimpan pengaduan baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'judul_pengaduan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_kejadian' => 'required|date',
            'lokasi' => 'required',
            'id_kategori' => 'required',
            'lampiran' => 'nullable|file|max:2048',
        ]);

        // Jika tidak login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu untuk mengirim pengaduan');
        }

        // Menangani upload file
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran_pengaduan', 'public');
        }

        // Mendapatkan ID pengguna yang terautentikasi
        $userId = Auth::id();

        // Membuat pengaduan baru
        $pengaduan = Pengaduan::create([
            'id_pengguna' => $userId,
            'id_kategori' => $request->id_kategori,
            'judul_pengaduan' => $request->judul_pengaduan,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'lampiran' => $lampiranPath,
            'tanggal_pengaduan' => now(),
            'status' => 'Pending',
        ]);

        // Membuat relasi dengan instansi (untuk multiple instansi)
        if ($request->has('id_instansi')) {
            if (is_array($request->id_instansi)) {
                foreach ($request->id_instansi as $instansiId) {
                    Pengaduan_Instansi::create([
                        'id_pengaduan' => $pengaduan->id_pengaduan,
                        'id_instansi' => $instansiId
                    ]);
                }
            } else {
                // Jika id_instansi bukan array (hanya satu instansi)
                Pengaduan_Instansi::create([
                    'id_pengaduan' => $pengaduan->id_pengaduan,
                    'id_instansi' => $request->id_instansi
                ]);
            }
        }

        return redirect()->route('home.success')
            ->with('success', 'Laporan Anda berhasil dikirim dan akan segera diproses!')
            ->with('pengaduan_id', 'PGD-' . $pengaduan->id_pengaduan);
    }

    /**
     * Menampilkan halaman sukses setelah pengaduan berhasil disimpan.
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return view('homepage.success');
    }

    /**
     * Menampilkan detail pengaduan dan menangani komentar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $pengaduan = Pengaduan::with(['pengguna', 'kategori'])->findOrFail($id);
        
        // Pastikan pengaduan yang ditampilkan sudah diproses (tidak lagi Pending)
        if ($pengaduan->status === 'Pending' && (!Auth::check() || (Auth::check() && Auth::id() !== $pengaduan->id_pengguna && Auth::user()->role !== 'admin'))) {
            return redirect()->route('home.lapor')->with('error', 'Pengaduan masih dalam tahap verifikasi.');
        }
        
        // Ambil instansi terkait
        $pengaduanInstansi = Pengaduan_Instansi::with('instansi')
            ->where('id_pengaduan', $id)
            ->first();
            
        // Ambil komentar
        $komentar = Komentar::with('pengguna')
            ->where('id_pengaduan', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        // Ambil jumlah dukungan
        $dukunganCount = Dukungan::where('id_pengaduan', $id)->count();
        
        // Cek apakah user memberikan dukungan
        $isSupported = false;
        if (Auth::check()) {
            $isSupported = Dukungan::where('id_pengaduan', $id)
                ->where('id_pengguna', Auth::id())
                ->exists();
        }
        
        // Ambil tanggapan dari instansi/admin jika ada
        $tanggapan = Tanggapan::with('pengguna')
            ->where('id_pengaduan', $id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('pengaduan.show', compact(
            'pengaduan', 
            'pengaduanInstansi', 
            'komentar', 
            'dukunganCount', 
            'isSupported',
            'tanggapan'
        ));
    }

    /**
     * Menyimpan komentar baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKomentar(Request $request)
    {
        // Hanya untuk user yang sudah login
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'error' => 'unauthenticated',
                'message' => 'Silahkan login untuk memberikan komentar'
            ], 401);
        }

        // Validasi request
        $request->validate([
            'id_pengaduan' => 'required|exists:pengaduan,id_pengaduan',
            'isi_komentar' => 'required|string|max:1000',
        ]);

        // Buat komentar baru
        $komentar = new Komentar();
        $komentar->id_pengaduan = $request->id_pengaduan;
        $komentar->id_pengguna = Auth::id();
        $komentar->isi_komentar = $request->isi_komentar;
        $komentar->tanggal_komentar = now();
        $komentar->save();

        // Ambil data pengaduan
        $pengaduan = Pengaduan::find($request->id_pengaduan);

        // Buat notifikasi untuk pembuat pengaduan jika bukan pembuat sendiri yang mengomentari
        if ($pengaduan->id_pengguna !== Auth::id()) {
            Notifikasi::create([
                'id_pengguna' => $pengaduan->id_pengguna,
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'pesan_notifikasi' => Auth::user()->nama . ' mengomentari laporan Anda: "' . 
                                      $pengaduan->judul_pengaduan . '"',
                'status' => 'Belum Dibaca',
                'tanggal_kirim' => now()
            ]);
        }

        // Data untuk respons JSON
        $responseData = [
            'success' => true,
            'comment' => [
                'id' => $komentar->id_komentar,
                'isi_komentar' => $komentar->isi_komentar,
                'tanggal' => Carbon::parse($komentar->created_at)->diffForHumans(),
                'user' => [
                    'nama' => Auth::user()->nama,
                    'foto_profil' => Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : null
                ]
            ]
        ];

        return response()->json($responseData);
    }

    /**
     * Toggle dukungan (like) untuk pengaduan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleDukungan($id)
    {
        // Hanya user yang login yang bisa memberikan dukungan
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'error' => 'unauthenticated',
                'message' => 'Silahkan login untuk memberikan dukungan'
            ], 401);
        }

        // Cek apakah pengaduan ada
        $pengaduan = Pengaduan::findOrFail($id);
        
        // Cek apakah user sudah memberikan dukungan sebelumnya
        $dukungan = Dukungan::where('id_pengaduan', $id)
            ->where('id_pengguna', Auth::id())
            ->first();
        
        // Jika belum ada dukungan, buat baru
        if (!$dukungan) {
            Dukungan::create([
                'id_pengaduan' => $id,
                'id_pengguna' => Auth::id()
            ]);
            
            // Buat notifikasi untuk pembuat pengaduan jika bukan pembuat sendiri yang mendukung
            if ($pengaduan->id_pengguna !== Auth::id()) {
                Notifikasi::create([
                    'id_pengguna' => $pengaduan->id_pengguna,
                    'id_pengaduan' => $pengaduan->id_pengaduan,
                    'pesan_notifikasi' => Auth::user()->nama . ' mendukung laporan Anda: "' . 
                                          $pengaduan->judul_pengaduan . '"',
                    'status' => 'Belum Dibaca',
                    'tanggal_kirim' => now()
                ]);
            }
            
            $supported = true;
        } else {
            // Jika sudah ada, hapus dukungan (toggle)
            $dukungan->delete();
            $supported = false;
        }
        
        // Hitung jumlah dukungan setelah aksi
        $count = Dukungan::where('id_pengaduan', $id)->count();
        
        return response()->json(['success' => true,
            'supported' => $supported,
            'count' => $count
        ]);
    }
    
    /**
     * Share pengaduan (generate URL untuk berbagi)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function share($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        // Pastikan pengaduan yang dibagikan sudah diproses (tidak lagi Pending)
        if ($pengaduan->status === 'Pending') {
            return response()->json([
                'success' => false,
                'message' => 'Pengaduan masih dalam tahap verifikasi.'
            ], 403);
        }
        
        // Generate URL untuk berbagi
        $shareUrl = url('/pengaduan/' . $id);
        
        // Data untuk respons JSON
        $shareData = [
            'title' => $pengaduan->judul_pengaduan,
            'text' => \Illuminate\Support\Str::limit($pengaduan->deskripsi, 100),
            'url' => $shareUrl
        ];
        
        return response()->json([
            'success' => true,
            'share_data' => $shareData
        ]);
    }
    
    /**
     * Menampilkan daftar pendukung pengaduan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSupporters($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        // Pastikan pengaduan yang ditampilkan sudah diproses (tidak lagi Pending)
        if ($pengaduan->status === 'Pending' && (!Auth::check() || (Auth::check() && Auth::id() !== $pengaduan->id_pengguna && Auth::user()->role !== 'admin'))) {
            return redirect()->route('home.lapor')->with('error', 'Pengaduan masih dalam tahap verifikasi.');
        }
        
        $supporters = Dukungan::where('id_pengaduan', $id)
            ->with('pengguna')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
            
        return view('pengaduan.supporters', compact('pengaduan', 'supporters'));
    }
    
    /**
     * Menampilkan daftar pengaduan berdasarkan filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $query = Pengaduan::with(['pengguna', 'kategori']);
        
        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        } else {
            // Secara default, filter out Pending
            $query->where('status', '!=', 'Pending');
        }
        
        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }
        
        // Filter berdasarkan instansi
        if ($request->filled('instansi')) {
            $query->whereHas('pengaduan_instansi', function($q) use ($request) {
                $q->where('id_instansi', $request->instansi);
            });
        }
        
        // Filter berdasarkan lokasi
        if ($request->filled('lokasi')) {
            $query->where('lokasi', $request->lokasi);
        }
        
        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul_pengaduan', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }
        
        // Sortir berdasarkan parameter
        $sortBy = $request->filled('sort') ? $request->sort : 'created_at';
        $sortDirection = $request->filled('direction') ? $request->direction : 'desc';
        
        $query->orderBy($sortBy, $sortDirection);
        
        // Pagination
        $pengaduan = $query->paginate(10)->appends($request->except('page'));
        
        // Ambil data filter untuk dropdown
        $kategori = Kategori::all();
        $instansi = Instansi::all();
        $lokasi = Pengaduan::select('lokasi')->distinct()->pluck('lokasi');
        
        return view('pengaduan.filter', compact('pengaduan', 'kategori', 'instansi', 'lokasi', 'request'));
    }
    
    /**
     * Menampilkan statistik pengaduan.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics()
    {
        // Statistik berdasarkan status
        $statusStats = DB::table('pengaduan')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
            
        // Statistik berdasarkan kategori
        $kategoriStats = DB::table('pengaduan')
            ->join('kategori', 'pengaduan.id_kategori', '=', 'kategori.id_kategori')
            ->select('kategori.nama_kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori.id_kategori', 'kategori.nama_kategori')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
            
        // Statistik berdasarkan instansi
        $instansiStats = DB::table('pengaduan_instansi')
            ->join('instansi', 'pengaduan_instansi.id_instansi', '=', 'instansi.id_instansi')
            ->select('instansi.nama_instansi', DB::raw('count(*) as total'))
            ->groupBy('instansi.id_instansi', 'instansi.nama_instansi')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
            
        // Statistik berdasarkan lokasi
        $lokasiStats = DB::table('pengaduan')
            ->select('lokasi', DB::raw('count(*) as total'))
            ->groupBy('lokasi')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
            
        // Statistik bulanan (12 bulan terakhir)
        $monthlyStats = [];
        $months = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $month = $date->format('M Y');
            $months[] = $month;
            
            $count = Pengaduan::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
                
            $monthlyStats[] = $count;
        }
        
        return view('pengaduan.statistics', compact(
            'statusStats', 
            'kategoriStats', 
            'instansiStats', 
            'lokasiStats',
            'months',
            'monthlyStats'
        ));
    }
    /**
 * Menampilkan form pengaduan dengan tampilan baru.
 *
 * @return \Illuminate\Http\Response
 */
public function laporBaru()
{
    // Mengambil data kategori
    $kategori = Kategori::all();
    
    // Mengambil data instansi
    $instansi = Instansi::all();
    
    // Mengambil data instansi terhangat (berdasarkan jumlah pengaduan)
    $instansiTerhangat = DB::table('pengaduan_instansi')
        ->join('instansi', 'pengaduan_instansi.id_instansi', '=', 'instansi.id_instansi')
        ->select('instansi.id_instansi', 'instansi.nama_instansi', DB::raw('count(*) as total'))
        ->groupBy('instansi.id_instansi', 'instansi.nama_instansi')
        ->orderBy('total', 'desc')
        ->limit(5)
        ->get();
    
    // Inisialisasi variabel statistik
    $userStats = [
        'terverifikasi' => 0,
        'diproses' => 0,
        'selesai' => 0
    ];
    
    // Jika user login, ambil data statistik
    if (Auth::check()) {
        $userStats = [
            'terverifikasi' => Pengaduan::where('id_pengguna', Auth::id())
                ->where('status', 'Diverifikasi')
                ->count(),
            'diproses' => Pengaduan::where('id_pengguna', Auth::id())
                ->where('status', 'Diproses')
                ->count(),
            'selesai' => Pengaduan::where('id_pengguna', Auth::id())
                ->where('status', 'Selesai')
                ->count()
        ];
    }
    
    // Ambil data pengaduan untuk listing
    $pengaduanList = Pengaduan::with(['pengguna', 'kategori'])
        ->orderBy('created_at', 'desc')
        ->limit(7)
        ->get();
        
    // Ambil pengaduan user jika login
    $userPengaduan = [];
    if (Auth::check()) {
        $userPengaduan = Pengaduan::where('id_pengguna', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }
    
    // Ambil pengaduan terhangat (dengan jumlah komentar terbanyak)
    $trendingPengaduan = DB::table('pengaduan')
        ->select('pengaduan.*')
        ->selectRaw('(SELECT COUNT(*) FROM komentar WHERE komentar.id_pengaduan = pengaduan.id_pengaduan) as comment_count')
        ->orderByRaw('comment_count DESC')
        ->limit(5)
        ->get();
    
    // Ambil pengaduan terbaru untuk Kisah Sukses
    $successStories = Pengaduan::where('status', 'Selesai')
        ->orderBy('updated_at', 'desc')
        ->limit(3)
        ->get();
    
    return view('homepage.main_home', compact(
        'kategori', 
        'instansi', 
        'instansiTerhangat',
        'userStats',
        'pengaduanList',
        'userPengaduan',
        'trendingPengaduan',
        'successStories'
    ));
}


public function loadMoreComplaints(Request $request)
{
    // Validate the request
    $page = $request->input('page', 1);
    $perPage = 10; // Number of complaints to load per request

    // Query for complaints, excluding pending ones
    $complaints = Pengaduan::with(['pengguna', 'kategori'])
        ->where('status', '!=', 'Pending')
        ->orderBy('created_at', 'desc')
        ->paginate($perPage, ['*'], 'page', $page);
    // Transform complaints into a format suitable for the frontend
    $transformedComplaints = $complaints->map(function($pengaduan) {
        // Similar transformation logic as before
        return [
            'id_pengaduan' => $pengaduan->id_pengaduan,
            'judul_pengaduan' => $pengaduan->judul_pengaduan,
            'deskripsi' => $pengaduan->deskripsi,
            'status' => $pengaduan->status,
            'created_at_formatted' => $pengaduan->created_at->format('d M, H:i'),
            'created_at_human' => $pengaduan->created_at->diffForHumans(),
            'lokasi' => $pengaduan->lokasi,
            'user_name' => $pengaduan->pengguna ? $pengaduan->pengguna->nama : 'Anonim',
            'user_photo' => $pengaduan->pengguna && $pengaduan->pengguna->foto_profil 
                ? asset('storage/' . $pengaduan->pengguna->foto_profil) 
                : null,
        ];
    });

    // Return JSON response
    return response()->json([
        'complaints' => $transformedComplaints,
        'has_more' => $complaints->hasMorePages()
    ]);
}

public function getTanggapan($id)
{
    // Check if the pengaduan exists
    $pengaduan = Pengaduan::findOrFail($id);
    
    // Get tanggapan for this pengaduan
    $tanggapan = Tanggapan::where('id_pengaduan', $id)
        ->orderBy('created_at', 'desc')
        ->get();
    
    // Transform tanggapan data
    $transformedTanggapan = $tanggapan->map(function($item) {
        return [
            'id_tanggapan' => $item->id_tanggapan,
            'isi_tanggapan' => $item->isi_tanggapan,
            'lampiran' => $item->lampiran,
            'created_at_formatted' => Carbon::parse($item->created_at)->format('d M Y, H:i'),
            'created_at_human' => Carbon::parse($item->created_at)->diffForHumans(),
        ];
    });
    
    return response()->json([
        'success' => true,
        'tanggapan' => $transformedTanggapan
    ]);
}
}