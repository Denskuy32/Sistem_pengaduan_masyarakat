<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('page-title', 'Tambah instansi')

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

        <form action="{{ url('/instansi') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama_instansi" class="block text-gray-700 font-medium mb-2">Nama instansi:</label>
                <input type="text" id="nama_instansi" name="nama_instansi" value="{{ old('nama_instansi') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="kontak" class="block text-gray-700 font-medium mb-2">Kontak:</label>
                <input type="text" id="kontak" name="kontak" value="{{ old('kontak') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                Tambah
            </button>
        </form>
    </div>
=======
@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('page-title', 'Tambah instansi')

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

        <form action="{{ url('/instansi') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama_instansi" class="block text-gray-700 font-medium mb-2">Nama instansi:</label>
                <input type="text" id="nama_instansi" name="nama_instansi" value="{{ old('nama_instansi') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="kontak" class="block text-gray-700 font-medium mb-2">Kontak:</label>
                <input type="text" id="kontak" name="kontak" value="{{ old('kontak') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                Tambah
            </button>
        </form>
    </div>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
@endsection