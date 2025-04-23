<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $kategori = kategori::where('nama_kategori', 'LIKE', "%$search%")
                        ->orWhere('id_kategori', 'LIKE', "%$search%")
                        ->get();
        } else {
            $kategori = kategori::all();
        }

        if (app()->runningInConsole()) {
            if ($kategori->isEmpty()) {
                echo "No kategori found.\n";
            } else {
                foreach ($kategori as $order) {
                    echo "ID kategori: " . $order->id_kategori . "\n";
                    echo "Nama kategori: " . $order->nama_kategori . "\n";
                    echo "Deskripsi: " . $order->deskripsi . "\n";
                    echo "--------------------------\n";
                }
            }
        }

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string|max:255',
        ]);

        kategori::create($validatedData);

        return redirect('/kategori')->with('success', 'kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string|max:255',
        ]);

        $kategori = kategori::findOrFail($id);

        $kategori->update($validatedData);

        return redirect()->route('kategori.index')->with('success', 'kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = kategori::findOrFail($id);

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'kategori berhasil dihapus.');
    }
}
