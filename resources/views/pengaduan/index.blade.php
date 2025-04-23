<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Pengaduan')

@section('page-title', 'Daftar Pengaduan')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('pengaduan.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari pengaduan..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Table -->
    <div class="border border-gray-300 rounded-lg shadow overflow-hidden">
        @if($pengaduan->isEmpty())
            <p class="p-4 text-center text-gray-500">Tidak ada pengaduan yang tersedia.</p>
        @else
            <div class="overflow-x-auto max-h-[70vh]">
                <table class="table-auto w-full border-collapse">
                    <thead class="bg-gray-200 sticky top-0 shadow-sm">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Nama Pengguna</th>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 bg-white">
                        @foreach($pengaduan as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">{{ $item->id_pengaduan }}</td>
                                <td class="px-4 py-3">{{ $item->pengguna->nama ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $item->judul_pengaduan }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded text-white 
                                        {{ $item->status == 'Pending' ? 'bg-yellow-500' : 
                                        ($item->status == 'Diverifikasi' ? 'bg-blue-500' : 
                                        ($item->status == 'Diproses' ? 'bg-orange-500' : 'bg-green-500')) }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <a href="{{ route('pengaduan.show', $item->id_pengaduan) }}" 
                                        class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
=======
@extends('layouts.admin')

@section('title', 'Pengaduan')

@section('page-title', 'Daftar Pengaduan')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('pengaduan.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari pengaduan..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Table -->
    <div class="border border-gray-300 rounded-lg shadow overflow-hidden">
        @if($pengaduan->isEmpty())
            <p class="p-4 text-center text-gray-500">Tidak ada pengaduan yang tersedia.</p>
        @else
            <div class="overflow-x-auto max-h-[70vh]">
                <table class="table-auto w-full border-collapse">
                    <thead class="bg-gray-200 sticky top-0 shadow-sm">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Nama Pengguna</th>
                            <th class="px-4 py-2 text-left">Kategori</th>
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 bg-white">
                        @foreach($pengaduan as $item)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">{{ $item->id_pengaduan }}</td>
                                <td class="px-4 py-3">{{ $item->pengguna->nama ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $item->judul_pengaduan }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded text-white 
                                        {{ $item->status == 'Pending' ? 'bg-yellow-500' : 
                                        ($item->status == 'Diverifikasi' ? 'bg-blue-500' : 
                                        ($item->status == 'Diproses' ? 'bg-orange-500' : 'bg-green-500')) }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <a href="{{ route('pengaduan.show', $item->id_pengaduan) }}" 
                                        class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
@endsection