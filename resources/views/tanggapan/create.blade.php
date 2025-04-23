@extends('layouts.admin')

@section('title', 'Tanggapan')

@section('page-title', 'Tambah tanggapan')

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

        <form action="{{ url('/tanggapan') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
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
                <label for="isi_tanggapan" class="block text-gray-700 font-medium mb-2">isi tanggapan:</label>
                <input type="text" id="isi_tanggapan" name="isi_tanggapan" value="{{ old('isi_tanggapan') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="lampiran" class="block text-gray-700 font-medium mb-2">Lampiran (Opsional):</label>
                <input type="file" id="lampiran" name="lampiran" 
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    accept=".jpg,.jpeg,.png,.pdf">
                <p class="text-xs text-gray-500 mt-1">Format yang didukung: JPG, PNG, PDF (Maks. 2MB)</p>
            </div>
            <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                Tambah
            </button>
        </form>
@endsection