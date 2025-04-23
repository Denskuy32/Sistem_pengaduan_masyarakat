@extends('layouts.admin')

@section('title', 'Pengaduan_Instansi')

@section('page-title', 'Daftar Pengaduan_Instansi')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('pengaduan_instansi.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari pengaduan instansi..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Add Button -->
    <div class="mb-4">
        <a href="{{ route('pengaduan_instansi.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Pengaduan Instansi
        </a>
    </div>
    
    <!-- Table -->
    <div class="border border-gray-300 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto max-h-[70vh]">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-200 sticky top-0 shadow-sm">
                    <tr>
                        <th class="px-4 py-2 text-left">ID Pengaduan</th>
                        <th class="px-4 py-2 text-left">ID Instansi</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($pengaduan_instansi as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $order->pengaduan->judul_pengaduan }}</td>
                            <td class="px-4 py-3">{{ $order->instansi->nama_instansi }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <form action="{{ route('pengaduan_instansi.edit', ['id_pengaduan' => $order->id_pengaduan, 'id_instansi' => $order->id_instansi]) }}" method="GET">
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                            Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('pengaduan_instansi.destroy', ['id_pengaduan' => $order->id_pengaduan, 'id_instansi' => $order->id_instansi]) }}" 
                                        method="POST" onsubmit="return confirm('Yakin ingin menghapus pengaduan instansi ini?');">
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