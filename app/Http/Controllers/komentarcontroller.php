<?php

namespace App\Http\Controllers;

use App\Console\Commands\pengguna\penggunalistcommand;
use App\Models\komentar;
use App\Models\pengaduan;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class komentarcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $komentar = komentar::when($search, function ($query) use ($search) {
            $query->where('id_komentar', 'LIKE', "%$search%")
                  ->orWhere('id_pengaduan', 'LIKE', "%$search%")
                  ->orWhere('id_pengguna', 'LIKE', "%$search%")
                  ->orWhereHas('pengaduan', function ($q) use ($search) {
                      $q->where('judul_pengaduan', 'LIKE', "%$search%");
                  })
                  ->orWhereHas('pengguna', function ($q) use ($search) {
                      $q->where('nama', 'LIKE', "%$search%");
                  });
        })->get();

        if (app()->runningInConsole()) {
            if ($komentar->isEmpty()) {
                echo "No komentar found.\n";
            } else {
                foreach ($komentar as $order) {
                    echo "ID komentar: " . $order->id_komentar . "\n";
                    echo "ID pengaduan: " . $order->id_pengaduan . "\n";
                    echo "ID pengguna: " . $order->id_pengguna . "\n";
                    echo "isi komentar: " . $order->isi_komentar . "\n";
                    echo "tanggal komentar: " . $order->tanggal_komentar . "\n";
                    echo "--------------------------\n";
                }
            }
        }

        return view('komentar.index', compact('komentar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengaduan = pengaduan::all();
        $pengguna = pengguna::all();

        return view('komentar.create' ,compact('pengaduan','pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengaduan' => 'required|string|max:100',
            'id_pengguna' => 'required|string|max:100',
            'isi_komentar' => 'required|string|max:20|distinct|unique:komentar,isi_komentar',
        ]);

        komentar::create($validatedData);

        return redirect('/komentar')->with('success', 'komentar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $komentar = komentar::findOrFail($id);
        $pengaduan = pengaduan::all();
        $pengguna = pengguna::all();

        return view('komentar.edit', compact('komentar','pengaduan','pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'isi_komentar' => 'required|string|max:20',
        ]);

        $komentar = komentar::findOrFail($id);

        $komentar->update($validatedData);

        return redirect()->route('komentar.index')->with('success', 'komentar berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $komentar = komentar::findOrFail($id);

        $komentar->delete();

        return redirect()->route('komentar.index')->with('success', 'komentar berhasil dihapus.');
    }
}
