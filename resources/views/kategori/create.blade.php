@extends('layouts.admin')

@section('title', 'Kategori')

@section('page-title', 'Tambah Kategori')

@section('content')

        @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('/kategori') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama_kategori" class="block text-gray-700 font-medium mb-2">Nama kategori:</label>
                <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                Tambah
            </button>
        </form>
    </div>
@endsection