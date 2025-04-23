@extends('layouts.admin')

@section('title', 'Kategori')

@section('page-title', 'Daftar Kategori')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('kategori.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari kategori..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Add Button -->
    <div class="mb-4">
        <a href="{{ route('kategori.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Kategori
        </a>
    </div>
    
    <!-- Table -->
    <div class="border border-gray-300 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto max-h-[70vh]">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-200 sticky top-0 shadow-sm">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nama Kategori</th>
                        <th class="px-4 py-2 text-left">Deskripsi</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($kategori as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $order->id_kategori }}</td>
                            <td class="px-4 py-3">{{ $order->nama_kategori }}</td>
                            <td class="px-4 py-3">{{ $order->deskripsi }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('kategori.edit', $order->id_kategori) }}" 
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('kategori.destroy', $order->id_kategori) }}" method="POST" 
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
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
@endsection