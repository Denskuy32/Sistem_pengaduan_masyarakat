<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Tanggapan')

@section('page-title', 'Daftar tanggapan')

@section('content')
            <form action="{{ route('tanggapan.index') }}" method="GET" class="mb-4">
                <div class="flex items-center gap-2">
                <input type="text" name="search" placeholder="cari tanggapan...." value="{{ request('search') }}" class="boorder border-gray-300 rounded px-4 py-2 w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">cari</button>
                </div>
            </form>
        <div class="mb-4">
            <a href="{{ route('tanggapan.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Tambah tanggapan
            </a>
        </div>
        <div class="relative border border-gray-300 rounded-lg shadow max-h-80 overflow-y-auto">
                <table class="table-auto w-full border-collapse">
                    <thead class="bg-gray-200 sticky top-0 shadow-md">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">ID pengaduan</th>
                    <th class="px-4 py-2 text-left">isi tanggapan</th>
                    <th class="px-4 py-2 text-left">Lampiran</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach($tanggapan as $order)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $order->id_tanggapan }}</td>
                        <td class="px-4 py-2">{{ $order->pengaduan->judul_pengaduan }}</td>
                        <td class="px-4 py-2">{{ $order->isi_tanggapan }}</td>
                        <td class="px-4 py-2">
                            @if($order->lampiran)
                                <a href="{{ Storage::url($order->lampiran) }}" target="_blank" 
                                   class="inline-flex items-center px-2 py-1 border border-gray-300 shadow-sm text-xs leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    Lihat Lampiran
                                </a>
                            @else
                                <span class="text-gray-400 text-sm italic">Tidak ada lampiran</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2">
                            <form action="{{ route('tanggapan.edit', $order->id_tanggapan) }}" method="GET" style="display: inline;">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</button>
                            </form>
                            <form action="{{ route('tanggapan.destroy', $order->id_tanggapan) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus tanggapan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
           </table>
=======
@extends('layouts.admin')

@section('title', 'Tanggapan')

@section('page-title', 'Daftar tanggapan')

@section('content')
            <form action="{{ route('tanggapan.index') }}" method="GET" class="mb-4">
                <div class="flex items-center gap-2">
                <input type="text" name="search" placeholder="cari tanggapan...." value="{{ request('search') }}" class="boorder border-gray-300 rounded px-4 py-2 w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">cari</button>
                </div>
            </form>
        <div class="mb-4">
            <a href="{{ route('tanggapan.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Tambah tanggapan
            </a>
        </div>
        <div class="relative border border-gray-300 rounded-lg shadow max-h-80 overflow-y-auto">
                <table class="table-auto w-full border-collapse">
                    <thead class="bg-gray-200 sticky top-0 shadow-md">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">ID pengaduan</th>
                    <th class="px-4 py-2 text-left">isi tanggapan</th>
                    <th class="px-4 py-2 text-left">Lampiran</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach($tanggapan as $order)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-2">{{ $order->id_tanggapan }}</td>
                        <td class="px-4 py-2">{{ $order->pengaduan->judul_pengaduan }}</td>
                        <td class="px-4 py-2">{{ $order->isi_tanggapan }}</td>
                        <td class="px-4 py-2">
                            @if($order->lampiran)
                                <a href="{{ Storage::url($order->lampiran) }}" target="_blank" 
                                   class="inline-flex items-center px-2 py-1 border border-gray-300 shadow-sm text-xs leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    Lihat Lampiran
                                </a>
                            @else
                                <span class="text-gray-400 text-sm italic">Tidak ada lampiran</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex space-x-2">
                            <form action="{{ route('tanggapan.edit', $order->id_tanggapan) }}" method="GET" style="display: inline;">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</button>
                            </form>
                            <form action="{{ route('tanggapan.destroy', $order->id_tanggapan) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus tanggapan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
           </table>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
@endsection