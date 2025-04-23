<?php

namespace App\Http\Controllers;

use App\Models\notifikasi;
use App\Models\pengaduan;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class notifikasicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $notifikasi = notifikasi::when($search, function ($query) use ($search) {
            $query->where('id_notifikasi', 'LIKE', "%$search%")
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
            if ($notifikasi->isEmpty()) {
                echo "No notifikasi found.\n";
            } else {
                foreach ($notifikasi as $order) {
                    echo "ID notifikasi: " . $order->id_notifikasi . "\n";
                    echo "ID pengaduan: " . $order->id_pengaduan . "\n";
                    echo "ID pengguna: " . $order->id_pengguna . "\n";
                    echo "pesan_notifikasi: " . $order->pesan_notifikasi . "\n";
                    echo "status: " . $order->status . "\n";
                    echo "tanggal kirim: " . $order->tanggal_kirim . "\n";
                    echo "--------------------------\n";
                }
            }
        }

        return view('notifikasi.index', compact('notifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengaduan = pengaduan::all();
        $pengguna = Pengguna::all();

        return view('notifikasi.create', compact('pengaduan', 'pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengaduan' => 'required|string|max:100',
            'id_pengguna' => 'required|string|max:100',
            'pesan_notifikasi' => 'required|string|max:255|distinct|unique:notifikasi,pesan_notifikasi',
        ]);

        notifikasi::create($validatedData);

        return redirect('/notifikasi')->with('success', 'notifikasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(notifikasi $notifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $notifikasi = notifikasi::findOrFail($id);
        $pengaduan = pengaduan::all();
        $pengguna = pengguna::all();

        return view('notifikasi.edit', compact('notifikasi','pengaduan','pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'pesan_notifikasi' => 'required|string|max:255',
        ]);

        $notifikasi = notifikasi::findOrFail($id);

        $notifikasi->update($validatedData);

        return redirect()->route('notifikasi.index')->with('success', 'notifikasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notifikasi = notifikasi::findOrFail($id);

        $notifikasi->delete();

        return redirect()->route('notifikasi.index')->with('success', 'notifikasi berhasil dihapus.');
    }
}
