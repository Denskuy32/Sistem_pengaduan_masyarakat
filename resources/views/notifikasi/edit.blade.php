<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('page-title', 'Daftar Notifikasi')

@section('content')

        <form action="{{ route('notifikasi.update', $notifikasi->id_notifikasi) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="pesan_notifikasi" class="block text-gray-700 font-medium mb-5">pesan notifikasi:</label>
                <input type="text" id="pesan_notifikasi" name="pesan_notifikasi" value="{{ old('pesan_notifikasi', $notifikasi->pesan_notifikasi) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                    Perbarui
                </button>
            </div>
        </form>
=======
@extends('layouts.admin')

@section('title', 'Notifikasi')

@section('page-title', 'Daftar Notifikasi')

@section('content')

        <form action="{{ route('notifikasi.update', $notifikasi->id_notifikasi) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="pesan_notifikasi" class="block text-gray-700 font-medium mb-5">pesan notifikasi:</label>
                <input type="text" id="pesan_notifikasi" name="pesan_notifikasi" value="{{ old('pesan_notifikasi', $notifikasi->pesan_notifikasi) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                    Perbarui
                </button>
            </div>
        </form>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
@endsection