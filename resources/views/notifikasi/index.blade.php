<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('page-title', 'Daftar Notifikasi')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('notifikasi.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari notifikasi..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Add Button -->
    <div class="mb-4">
        <a href="{{ route('notifikasi.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Notifikasi
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
                        <th class="px-4 py-2 text-left">Pesan Notifikasi</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Tanggal Kirim</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($notifikasi as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $order->id_notifikasi }}</td>
                            <td class="px-4 py-3">{{ $order->pengaduan->judul_pengaduan }}</td>
                            <td class="px-4 py-3">{{ $order->pengguna->nama }}</td>
                            <td class="px-4 py-3">{{ $order->pesan_notifikasi }}</td>
                            <td class="px-4 py-3">{{ $order->status }}</td>
                            <td class="px-4 py-3">{{ $order->tanggal_kirim }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('notifikasi.edit', $order->id_notifikasi) }}" 
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('notifikasi.destroy', $order->id_notifikasi) }}" method="POST" 
                                        onsubmit="return confirm('Yakin ingin menghapus notifikasi ini?');">
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

@section('title', 'Notifikasi')

@section('page-title', 'Daftar Notifikasi')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('notifikasi.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari notifikasi..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Add Button -->
    <div class="mb-4">
        <a href="{{ route('notifikasi.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Notifikasi
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
                        <th class="px-4 py-2 text-left">Pesan Notifikasi</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Tanggal Kirim</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($notifikasi as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $order->id_notifikasi }}</td>
                            <td class="px-4 py-3">{{ $order->pengaduan->judul_pengaduan }}</td>
                            <td class="px-4 py-3">{{ $order->pengguna->nama }}</td>
                            <td class="px-4 py-3">{{ $order->pesan_notifikasi }}</td>
                            <td class="px-4 py-3">{{ $order->status }}</td>
                            <td class="px-4 py-3">{{ $order->tanggal_kirim }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('notifikasi.edit', $order->id_notifikasi) }}" 
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('notifikasi.destroy', $order->id_notifikasi) }}" method="POST" 
                                        onsubmit="return confirm('Yakin ingin menghapus notifikasi ini?');">
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