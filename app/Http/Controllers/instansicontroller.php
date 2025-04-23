<?php

namespace App\Http\Controllers;

use App\Models\instansi;
use Illuminate\Http\Request;

class instansicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $instansi = instansi::where('nama_instansi', 'LIKE', "%$search%")
                        ->orWhere('alamat', 'LIKE', "%$search%")
                        ->orWhere('id_instansi', 'LIKE', "%$search%")
                        ->get();
        } else {
            $instansi = instansi::all();
        }

        if (app()->runningInConsole()) {
            if ($instansi->isEmpty()) {
                echo "No instansi found.\n";
            } else {
                foreach ($instansi as $order) {
                    echo "ID instansi: " . $order->id_instansi . "\n";
                    echo "Nama instansi: " . $order->nama_instansi . "\n";
                    echo "Kontak: " . $order->kontak . "\n";
                    echo "alamat: " . $order->alamat . "\n";
                    echo "--------------------------\n";
                }
            }
        }

        return view('instansi.index', compact('instansi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_instansi' => 'required|string|max:100',
            'kontak' => 'required|string|max:100|distinct|unique:instansi,kontak',
            'alamat' => 'required|string|max:100',
        ]);

        instansi::create($validatedData);

        return redirect('/instansi')->with('success', 'instansi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $instansi = instansi::findOrFail($id);

        return view('instansi.edit', compact('instansi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_instansi' => 'required|string|max:100',
            'kontak' => 'required|string|max:20',
            'alamat' => 'required|string|max:100',
        ]);

        $instansi = instansi::findOrFail($id);

        $instansi->update($validatedData);

        return redirect()->route('instansi.index')->with('success', 'instansi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instansi = instansi::findOrFail($id);

        $instansi->delete();

        return redirect()->route('instansi.index')->with('success', 'instansi berhasil dihapus.');
    }
}
