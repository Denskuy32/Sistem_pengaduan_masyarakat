<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');

        $pengguna = Pengguna::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('nama', 'LIKE', "%$search%")
                                     ->orWhere('email', 'LIKE', "%$search%")
                                     ->orWhere('id_pengguna', 'LIKE', "%$search%");
                    })
                    ->get();

        return view('pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:100',
            'nama' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:pengguna',
            'nomor_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string|max:100',
            'role' => 'required|in:Admin,masyarakat',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Pengguna::create($validatedData);

        return redirect('/pengguna')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pengguna.show', compact('pengguna'));
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:100',
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:pengguna,email,' . $id . ',id_pengguna',
            'nomor_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string|max:100',
            'role' => 'required|in:Admin,masyarakat',
            'password' => 'required|string|min:8',
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update([
            'nik' => $validatedData['nik'],
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'nomor_hp' => $validatedData['nomor_hp'] ?? $pengguna->nomor_hp,
            'alamat' => $validatedData['alamat'],
            'role' => $validatedData['role'],
            'password' => !empty($validatedData['password']) ? Hash::make($validatedData['password']) : $pengguna->password,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
