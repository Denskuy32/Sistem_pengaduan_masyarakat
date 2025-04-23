@extends('layouts.admin')

@section('title', 'Pengguna')

@section('page-title', 'Daftar Pengguna')

@section('content')
    <!-- Search Form -->
    <form action="{{ route('pengguna.index') }}" method="GET" class="mb-6 flex gap-2">
        <input type="text" name="search" placeholder="Cari pengguna..." value="{{ request('search') }}" 
            class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Cari
        </button>
    </form>
    
    <!-- Add Button -->
    <div class="mb-4">
        <a href="{{ route('pengguna.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Pengguna
        </a>
    </div>
    
    <!-- Table -->
    <div class="border border-gray-300 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto max-h-[70vh]">
            <table class="table-auto w-full border-collapse">
                <thead class="bg-gray-200 sticky top-0 shadow-sm">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Nik</th>
                        <th class="px-4 py-2 text-left">Nama Lengkap</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Nomor Telepon</th>
                        <th class="px-4 py-2 text-left">Alamat</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300 bg-white">
                    @foreach($pengguna as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $user->id_pengguna }}</td>
                            <td class="px-4 py-3">{{ $user->nik }}</td>
                            <td class="px-4 py-3">{{ $user->nama }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">{{ $user->nomor_hp }}</td>
                            <td class="px-4 py-3">{{ $user->alamat }}</td>
                            <td class="px-4 py-3">{{ $user->role }}</td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('pengguna.edit', $user->id_pengguna) }}" 
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('pengguna.destroy', $user->id_pengguna) }}" method="POST" 
                                        onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
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