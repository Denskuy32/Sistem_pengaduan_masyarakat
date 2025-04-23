<?php

namespace App\Http\Controllers;

use App\Models\pengaduan_instansi;
use App\Models\pengaduan;
use App\Models\instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pengaduan_instansicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $pengaduan_instansi = pengaduan_instansi::when($search, function ($query) use ($search) {
            $query->where('id_instansi', 'LIKE', "%$search%")
                  ->orWhere('id_pengaduan', 'LIKE', "%$search%")
                  ->orWhereHas('pengaduan', function ($q) use ($search) {
                      $q->where('judul_pengaduan', 'LIKE', "%$search%");
                  })
                  ->orWhereHas('instansi', function ($q) use ($search) {
                      $q->where('nama_instansi', 'LIKE', "%$search%");
                  });
        })->get();

        if (app()->runningInConsole()) {
            if ($pengaduan_instansi->isEmpty()) {
                echo "No pengaduan_instansi found.\n";
            } else {
                foreach ($pengaduan_instansi as $order) {
                    echo "ID pengaduan: " . $order->id_pengaduan . "\n";
                    echo "ID instansi: " . $order->id_instansi . "\n";
                    echo "--------------------------\n";
                }
            }
        }

        return view('pengaduan_instansi.index', compact('pengaduan_instansi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengaduan = pengaduan::all();
        $instansi = instansi::all();

        return view('pengaduan_instansi.create', compact('pengaduan','instansi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengaduan' => 'required|integer|exists:pengaduan,id_pengaduan',
            'id_instansi' => 'required|integer|exists:instansi,id_instansi',
        ]);

        pengaduan_instansi::create($validatedData);

        return redirect('/pengaduan_instansi')->with('success', 'pengaduan_instansi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pengaduan_instansi $pengaduan_instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_pengaduan, $id_instansi)
    {
        $pengaduan_instansi = pengaduan_instansi::where('id_pengaduan', $id_pengaduan)
            ->where('id_instansi', $id_instansi)
            ->firstOrFail();

        $pengaduan = pengaduan::all();
        $instansi = instansi::all();

        return view('pengaduan_instansi.edit', compact('pengaduan_instansi', 'pengaduan', 'instansi'));
    }

    /**
     * Memperbarui data pengaduan instansi berdasarkan composite key.
     */
    public function update(Request $request, $id_pengaduan, $id_instansi)
    {
        $validatedData = $request->validate([
            'id_pengaduan' => 'required|integer|exists:pengaduan,id_pengaduan',
            'id_instansi' => 'required|integer|exists:instansi,id_instansi',
        ]);

        pengaduan_instansi::where('id_pengaduan', $id_pengaduan)
            ->where('id_instansi', $id_instansi)
            ->update($validatedData);

        return redirect()->route('pengaduan_instansi.index')->with('success', 'Pengaduan instansi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pengaduan, $id_instansi)
    {
        // Mencari data berdasarkan dua kunci (id_pengaduan dan id_instansi)
        $pengaduan_instansi = DB::table('pengaduan_instansi')
            ->where('id_pengaduan', $id_pengaduan)
            ->where('id_instansi', $id_instansi)
            ->delete();
    
        return redirect()->route('pengaduan_instansi.index')->with('success', 'Pengaduan instansi berhasil dihapus.');
    }
}    
