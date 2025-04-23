@extends('layouts.admin')

@section('title', 'Komentar')

@section('page-title', 'Tambah Komentar')

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

        <form action="{{ url('/komentar') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                        <label for="id_pengaduan" class="block text-gray-700 font-medium mb-2">pengaduan:</label>
                        <select id="id_pengaduan" name="id_pengaduan" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">-- Pilih pengaduan --</option>
                            @foreach($pengaduan as $aduan)
                                <option value="{{ $aduan->id_pengaduan }}">pelapor: {{ $aduan->pengguna->nama }} || {{ $aduan->judul_pengaduan}} </option>
                            @endforeach
                        </select>
                    </div>
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
                <label for="isi_komentar" class="block text-gray-700 font-medium mb-2">isi komentar:</label>
                <input type="text" id="isi_komentar" name="isi_komentar" value="{{ old('isi_komentar') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                Tambah
            </button>
        </form>
@endsection