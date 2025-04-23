@extends('layouts.admin')

@section('title', 'Kategori')

@section('page-title', 'Edit Kategori')

@section('content')

        <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_kategori" class="block text-gray-700 font-medium mb-2">Nama kategori:</label>
                <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi:</label>
                <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $kategori->deskripsi) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                    Perbarui
                </button>
            </div>
        </form>
@endsection