@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('page-title', 'Edit instansi')

@section('content')

        <form action="{{ route('instansi.update', $instansi->id_instansi) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_instansi" class="block text-gray-700 font-medium mb-2">Nama instansi:</label>
                <input type="text" id="nama_instansi" name="nama_instansi" value="{{ old('nama_instansi', $instansi->nama_instansi) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="kontak" class="block text-gray-700 font-medium mb-2">Kontak:</label>
                <input type="text" id="kontak" name="kontak" value="{{ old('kontak', $instansi->kontak) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="alamat" class="block text-gray-700 font-medium mb-5">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $instansi->alamat) }}" required
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