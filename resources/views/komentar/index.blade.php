<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Komentar')

@section('page-title', 'Daftar Komentar')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('komentar.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari komentar..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Add Button -->
    <div class="mb-4">
        <a href="{{ route('komentar.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Komentar
        </a>
    </div>
    
    <!-- Table -->
    <div class="border border-gray-300 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto max-h-[70vh]">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-200 sticky top-0 shadow-sm">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">ID Pengaduan</th>
                        <th class="px-4 py-2 text-left">ID Pengguna</th>
                        <th class="px-4 py-2 text-left">Isi Komentar</th>
                        <th class="px-4 py-2 text-left">Tanggal Komentar</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($komentar as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $order->id_komentar }}</td>
                            <td class="px-4 py-3">{{ $order->pengaduan->judul_pengaduan ?? 'Judul tidak tersedia' }}</td>
                            <td class="px-4 py-3">{{ $order->pengguna->nama }}</td>
                            <td class="px-4 py-3">{{ $order->isi_komentar }}</td>
                            <td class="px-4 py-3">{{ $order->tanggal_komentar }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('komentar.edit', $order->id_komentar) }}" 
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('komentar.destroy', $order->id_komentar) }}" method="POST" 
                                        onsubmit="return confirm('Yakin ingin menghapus komentar ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
=======
@extends('layouts.admin')

@section('title', 'Komentar')

@section('page-title', 'Daftar Komentar')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('komentar.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari komentar..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Add Button -->
    <div class="mb-4">
        <a href="{{ route('komentar.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Komentar
        </a>
    </div>
    
    <!-- Table -->
    <div class="border border-gray-300 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto max-h-[70vh]">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-200 sticky top-0 shadow-sm">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">ID Pengaduan</th>
                        <th class="px-4 py-2 text-left">ID Pengguna</th>
                        <th class="px-4 py-2 text-left">Isi Komentar</th>
                        <th class="px-4 py-2 text-left">Tanggal Komentar</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($komentar as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $order->id_komentar }}</td>
                            <td class="px-4 py-3">{{ $order->pengaduan->judul_pengaduan ?? 'Judul tidak tersedia' }}</td>
                            <td class="px-4 py-3">{{ $order->pengguna->nama }}</td>
                            <td class="px-4 py-3">{{ $order->isi_komentar }}</td>
                            <td class="px-4 py-3">{{ $order->tanggal_komentar }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('komentar.edit', $order->id_komentar) }}" 
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('komentar.destroy', $order->id_komentar) }}" method="POST" 
                                        onsubmit="return confirm('Yakin ingin menghapus komentar ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
@endsection