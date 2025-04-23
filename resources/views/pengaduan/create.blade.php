<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Pengaduan')

@section('page-title', 'Tambah Pengaduan')

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

        <form action="{{ url('/pengaduan') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                        <label for="id_pengguna" class="block text-gray-700 font-medium mb-2">pengguna:</label>
                        <select id="id_pengguna" name="id_pengguna" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">-- Pilih pengguna --</option>
                            @foreach($pengguna as $user)
                                <option value="{{ $user->id_pengguna }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>
            <div>
                        <label for="id_kategori" class="block text-gray-700 font-medium mb-2">kategori:</label>
                        <select id="id_kategori" name="id_kategori" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">-- Pilih kategori --</option>
                            @foreach($kategori as $kate)
                                <option value="{{ $kate->id_kategori }}">{{ $kate->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
            <div>
            <div>
                <label for="judul_pengaduan" class="block text-gray-700 font-medium mb-2">Judul Pengaduan:</label>
                <input type="text" id="judul_pengaduan" name="judul_pengaduan" value="{{ old('judul_pengaduan') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ old('deskripsi') }}</textarea>
            </div>
            <div>
                <label for="lokasi" class="block text-gray-700 font-medium mb-2">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="lampiran" class="block text-gray-700 font-medium mb-2">Lampiran:</label>
                <input type="file" id="lampiran" name="lampiran" accept="image/*,application/pdf"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="batas_waktu" class="block text-gray-700 font-medium mb-2">Batas Waktu:</label>
                <input type="date" id="batas_waktu" name="batas_waktu" value="{{ old('batas_waktu') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                Tambah
            </button>
        </form>
@endsection
=======
@extends('layouts.admin')

@section('title', 'Pengaduan')

@section('page-title', 'Tambah Pengaduan')

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

        <form action="{{ url('/pengaduan') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                        <label for="id_pengguna" class="block text-gray-700 font-medium mb-2">pengguna:</label>
                        <select id="id_pengguna" name="id_pengguna" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">-- Pilih pengguna --</option>
                            @foreach($pengguna as $user)
                                <option value="{{ $user->id_pengguna }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>
            <div>
                        <label for="id_kategori" class="block text-gray-700 font-medium mb-2">kategori:</label>
                        <select id="id_kategori" name="id_kategori" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">-- Pilih kategori --</option>
                            @foreach($kategori as $kate)
                                <option value="{{ $kate->id_kategori }}">{{ $kate->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
            <div>
            <div>
                <label for="judul_pengaduan" class="block text-gray-700 font-medium mb-2">Judul Pengaduan:</label>
                <input type="text" id="judul_pengaduan" name="judul_pengaduan" value="{{ old('judul_pengaduan') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ old('deskripsi') }}</textarea>
            </div>
            <div>
                <label for="lokasi" class="block text-gray-700 font-medium mb-2">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="lampiran" class="block text-gray-700 font-medium mb-2">Lampiran:</label>
                <input type="file" id="lampiran" name="lampiran" accept="image/*,application/pdf"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="batas_waktu" class="block text-gray-700 font-medium mb-2">Batas Waktu:</label>
                <input type="date" id="batas_waktu" name="batas_waktu" value="{{ old('batas_waktu') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                Tambah
            </button>
        </form>
@endsection
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
