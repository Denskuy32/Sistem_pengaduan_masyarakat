<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('page-title', 'Edit instansi')

@section('content')

        <form action="{{ route('pengaduan_instansi.update', ['id_pengaduan' => $pengaduan_instansi->id_pengaduan, 'id_instansi' => $pengaduan_instansi->id_instansi]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                        <label for="id_pengaduan" class="block text-gray-700 font-medium mb-2">pengaduan:</label>
                        <select id="id_pengaduan" name="id_pengaduan" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            @foreach($pengaduan as $aduan)
                                <option value="{{ $aduan->id_pengaduan }}"> {{ $aduan->id_pengaduan == $pengaduan->id_pengaduan ? 'selected' : '' }}>pelapor: {{ $aduan->pengguna->nama }} || {{ $aduan->judul_pengaduan}}</option>
                            @endforeach
                        </select>
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
=======
@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('page-title', 'Edit instansi')

@section('content')

        <form action="{{ route('pengaduan_instansi.update', ['id_pengaduan' => $pengaduan_instansi->id_pengaduan, 'id_instansi' => $pengaduan_instansi->id_instansi]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                        <label for="id_pengaduan" class="block text-gray-700 font-medium mb-2">pengaduan:</label>
                        <select id="id_pengaduan" name="id_pengaduan" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            @foreach($pengaduan as $aduan)
                                <option value="{{ $aduan->id_pengaduan }}"> {{ $aduan->id_pengaduan == $pengaduan->id_pengaduan ? 'selected' : '' }}>pelapor: {{ $aduan->pengguna->nama }} || {{ $aduan->judul_pengaduan}}</option>
                            @endforeach
                        </select>
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
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
@endsection