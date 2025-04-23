<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Instansi;
use App\Models\Tanggapan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $pengaduan = pengaduan::when($search, function ($query) use ($search) {
            $query->where('id_pengguna', 'LIKE', "%$search%")
                  ->orWhere('id_kategori', 'LIKE', "%$search%")
                  ->orWhere('id_pengaduan', 'LIKE', "%$search%")
                  ->orWhere('judul_pengaduan', 'LIKE', "%$search%")
                  ->orWhere('status', 'LIKE', "%$search%")
                  ->orWhereHas('pengguna', function ($q) use ($search) {
                      $q->where('nama', 'LIKE', "%$search%");
                  })
                  ->orWhereHas('kategori', function ($q) use ($search) {
                      $q->where('nama_kategori', 'LIKE', "%$search%");
                  });
        })->get();

        if (app()->runningInConsole()) {
            if ($pengaduan->isEmpty()) {
                echo "No pengaduan found.\n";
            } else {
                foreach ($pengaduan as $item) {
                    echo "ID Pengaduan: " . $item->id_pengaduan . "\n";
                    echo "Judul: " . $item->judul_pengaduan . "\n";
                    echo "Status: " . $item->status . "\n";
                    echo "--------------------------\n";
                }
            }
        }

        return view('pengaduan.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pengaduan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|integer|exists:kategori,id_kategori',
            'judul_pengaduan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Set the current authenticated user's ID
        $validatedData['id_pengguna'] = Auth::id();
        
        // Set default status
        $validatedData['status'] = 'Pending';
        
        // Set tanggal pengaduan
        $validatedData['tanggal_pengaduan'] = now();

        // Handle file upload
        if ($request->hasFile('lampiran')) {
            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran_pengaduan', 'public');
        }

        // Create the pengaduan
        $pengaduan = Pengaduan::create($validatedData);

        // Create a notification for the admin
        Notifikasi::create([
            'id_pengguna' => $validatedData['id_pengguna'],
            'id_pengaduan' => $pengaduan->id_pengaduan,
            'pesan_notifikasi' => "Pengaduan baru telah dibuat dengan judul '{$pengaduan->judul_pengaduan}'.",
            'status' => 'Belum Dibaca',
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the pengaduan with all related data
        $pengaduan = Pengaduan::findOrFail($id);
    
        // Fetch tanggapan separately to maintain compatibility with the view
        $tanggapan = Tanggapan::where('id_pengaduan', $id)
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Get all institutions for forwarding
        $instansi = Instansi::all();
    
        // Get forwarded institutions if applicable
        $pengaduanInstansi = DB::table('pengaduan_instansi')
            ->where('id_pengaduan', $id)
            ->join('instansi', 'pengaduan_instansi.id_instansi', '=', 'instansi.id_instansi')
            ->select('instansi.*')
            ->get();
    
        return view('pengaduan.detail', compact('pengaduan', 'tanggapan', 'instansi', 'pengaduanInstansi'));
    }

    /**
     * Store a new tanggapan (response) for a complaint
     */
    public function storeTanggapan(Request $request)
    {        
        $validatedData = $request->validate([
            'id_pengaduan' => 'required|exists:pengaduan,id_pengaduan',
            'isi_tanggapan' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx|max:5120', // 5MB max
        ]);

        // Get the pengaduan
        $pengaduan = Pengaduan::findOrFail($validatedData['id_pengaduan']);

        // Create tanggapan
        $tanggapan = new Tanggapan();
        $tanggapan->id_pengaduan = $validatedData['id_pengaduan'];
        $tanggapan->isi_tanggapan = $validatedData['isi_tanggapan'];
        
        // Handle file upload
        if ($request->hasFile('lampiran')) {
            $tanggapan->lampiran = $request->file('lampiran')->store('lampiran_tanggapan', 'public');
        }
        
        $tanggapan->save();

        // Create a notification for the complaint creator
        if ($pengaduan->id_pengguna) {
            Notifikasi::create([
                'id_pengguna' => $pengaduan->id_pengguna,
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'pesan_notifikasi' => "Terdapat tanggapan baru untuk pengaduan '{$pengaduan->judul_pengaduan}'.",
                'status' => 'Belum Dibaca',
            ]);
        }

        return redirect()->route('pengaduan.show', $validatedData['id_pengaduan'])
            ->with('success', 'Tanggapan berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|integer|exists:kategori,id_kategori',
            'judul_pengaduan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'sometimes|in:Pending,Diverifikasi,Diproses,Selesai',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('lampiran')) {
            // Delete old attachment if exists
            if ($pengaduan->lampiran) {
                Storage::disk('public')->delete($pengaduan->lampiran);
            }
            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran_pengaduan', 'public');
        }

        // Update the pengaduan
        $pengaduan->update($validatedData);

        return redirect()->route('pengaduan.show', $id)
            ->with('success', 'Pengaduan berhasil diperbarui!');
    }

    /**
     * Update the status of a complaint.
     */
    public function updateStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:Pending,Diverifikasi,Diproses,Selesai',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $oldStatus = $pengaduan->status;
        $pengaduan->status = $validatedData['status'];
        $pengaduan->save();

        // Kirim notifikasi ke pengguna
        if ($pengaduan->id_pengguna) {
            Notifikasi::create([
                'id_pengguna' => $pengaduan->id_pengguna,
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'pesan_notifikasi' => "Status pengaduan Anda dengan judul '{$pengaduan->judul_pengaduan}' telah diubah dari '{$oldStatus}' menjadi '{$validatedData['status']}'.",
                'status' => 'Belum Dibaca',
            ]);
        }

        return redirect()->route('pengaduan.show', $id)
            ->with('success', 'Status pengaduan berhasil diperbarui!');
    }

    /**
     * Forward a complaint to agencies.
     */
    public function forward(Request $request, $id)
    {
        $validatedData = $request->validate([
            'instansi' => 'required|array',
            'instansi.*' => 'exists:instansi,id_instansi',
            'catatan' => 'nullable|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        
        // Simpan ke tabel pengaduan_instansi
        $forwardedInstansi = [];
        foreach ($validatedData['instansi'] as $instansiId) {
            $forwardedInstansi[] = [
                'id_pengaduan' => $id,
                'id_instansi' => $instansiId,
            ];
        }
        
        // Insert multiple records at once
        DB::table('pengaduan_instansi')->insert($forwardedInstansi);

        // Update status pengaduan menjadi Diproses
        $pengaduan->status = 'Diproses';
        $pengaduan->save();

        // Kirim notifikasi ke pengguna
        if ($pengaduan->id_pengguna) {
            Notifikasi::create([
                'id_pengguna' => $pengaduan->id_pengguna,
                'id_pengaduan' => $pengaduan->id_pengaduan,
                'pesan_notifikasi' => "Pengaduan Anda dengan judul '{$pengaduan->judul_pengaduan}' telah diteruskan ke " . count($validatedData['instansi']) . " instansi terkait.",
                'status' => 'Belum Dibaca',
            ]);
        }

        return redirect()->route('pengaduan.show', $id)
            ->with('success', 'Pengaduan berhasil diteruskan ke instansi terkait!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // Hapus lampiran jika ada
        if ($pengaduan->lampiran) {
            Storage::disk('public')->delete($pengaduan->lampiran);
        }

        // Hapus semua tanggapan terkait
        Tanggapan::where('id_pengaduan', $id)->delete();

        // Hapus semua notifikasi terkait
        Notifikasi::where('id_pengaduan', $id)->delete();

        // Hapus relasi dengan instansi
        DB::table('pengaduan_instansi')->where('id_pengaduan', $id)->delete();

        // Hapus pengaduan
        $pengaduan->delete();

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus beserta seluruh data terkait.');
    }
}