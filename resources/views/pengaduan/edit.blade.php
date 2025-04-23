@extends('layouts.admin')

@section('title', 'Pengaduan')

@section('page-title', 'Edit Pengaduan')

@section('content')

        <form action="{{ route('pengaduan.update', $pengaduan->id_pengaduan) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                        <label for="id_pengguna" class="block text-gray-700 font-medium mb-2">pengguna:</label>
                        <select id="id_pengguna" name="id_pengguna" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            @foreach($pengguna as $user)
                                <option value="{{ $user->id_pengguna }}" {{ $user->id_pengguna == $pengaduan->id_pengguna ? 'selected' : '' }}>{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="id_kategori" class="block text-gray-700 font-medium mb-2">kategori:</label>
                        <select id="id_kategori" name="id_kategori" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            @foreach($kategori as $kate)
                                <option value="{{ $kate->id_kategori }}" {{ $kate->id_kategori == $pengaduan->id_kategori ? 'selected' : '' }}>{{ $kate->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

            <div>
                <label for="judul_pengaduan" class="block text-gray-700 font-medium mb-2">Judul Pengaduan:</label>
                <input type="text" id="judul_pengaduan" name="judul_pengaduan" value="{{ old('judul_pengaduan', $pengaduan->judul_pengaduan) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ old('deskripsi', $pengaduan->deskripsi) }}</textarea>
            </div>

            <div>
                <label for="lokasi" class="block text-gray-700 font-medium mb-2">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $pengaduan->lokasi) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="lampiran" class="block text-gray-700 font-medium mb-2">Lampiran:</label>
                <input type="file" id="lampiran" name="lampiran"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                <p class="text-gray-500 text-sm mt-1">Kosongkan jika tidak ingin mengubah lampiran.</p>
            </div>
            <div class="mb-4">
                        <label for="status" class="block font-semibold mb-2">Status:</label>
                        <select name="status" id="status"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="Pending" {{ old('status', $pengaduan->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Diverifikasi" {{ old('status', $pengaduan->status) == 'Diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                            <option value="Diproses" {{ old('status', $pengaduan->status) == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ old('status', $pengaduan->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

            <div>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                    Perbarui
                </button>
            </div>
        </form>
@endsection