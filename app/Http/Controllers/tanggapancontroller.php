<?php

namespace App\Http\Controllers;

use App\Models\tanggapan;
use App\Models\pengaduan;
use App\Models\pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class tanggapancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        $tanggapan = tanggapan::when($search, function ($query) use ($search) {
            $query->where('id_tanggapan', 'LIKE', "%$search%")
                  ->orWhere('id_pengaduan', 'LIKE', "%$search%")
                  ->orWhereHas('pengaduan', function ($q) use ($search) {
                      $q->where('judul_pengaduan', 'LIKE', "%$search%");
                  });
        })->get();

        if (app()->runningInConsole()) {
            if ($tanggapan->isEmpty()) {
                echo "No tanggapan found.\n";
            } else {
                foreach ($tanggapan as $order) {
                    echo "ID tanggapan: " . $order->id_tanggapan . "\n";
                    echo "ID pengaduan: " . $order->id_pengaduan . "\n";
                    echo "isi tanggapan: " . $order->isi_tanggapan . "\n";
                    echo "lampiran: " . $order->lampiran . "\n";
                    echo "--------------------------\n";
                }
            }
        }

        return view('tanggapan.index', compact('tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $pengaduan = pengaduan::all();
       $pengguna = pengguna::all();

       return view('tanggapan.create', compact('pengaduan', 'pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pengaduan' => 'required|string|max:100',
            'isi_tanggapan' => 'required|string|max:255',
            'lampiran' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('lampiran')) {
            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran_tanggapan', 'public');
        }

        tanggapan::create($validatedData);

        return redirect('/tanggapan')->with('success', 'tanggapan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(tanggapan $tanggapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tanggapan = tanggapan::findOrFail($id);
        $pengaduan = pengaduan::all();

        return view('tanggapan.edit', compact('tanggapan','pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'isi_tanggapan' => 'required|string|max:255',
            'lampiran' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        $tanggapan = tanggapan::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('lampiran')) {
            // Delete old file if exists
            if ($tanggapan->lampiran) {
                Storage::disk('public')->delete($tanggapan->lampiran);
            }
            
            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran_tanggapan', 'public');
        }

        $tanggapan->update($validatedData);

        return redirect()->route('tanggapan.index')->with('success', 'tanggapan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tanggapan = tanggapan::findOrFail($id);

        // Delete lampiran file if exists
        if ($tanggapan->lampiran) {
            Storage::disk('public')->delete($tanggapan->lampiran);
        }

        $tanggapan->delete();

        return redirect()->route('tanggapan.index')->with('success', 'tanggapan berhasil dihapus.');
    }
}