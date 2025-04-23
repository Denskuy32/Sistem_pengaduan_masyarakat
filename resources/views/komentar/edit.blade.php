<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Komentar')

@section('page-title', 'Edit Komentar')

@section('content')

        <form action="{{ route('komentar.update', $komentar->id_komentar) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="isi_komentar" class="block text-gray-700 font-medium mb-5">isi komentar:</label>
                <input type="text" id="isi_komentar" name="isi_komentar" value="{{ old('isi_komentar', $komentar->isi_komentar) }}" required
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

@section('title', 'Komentar')

@section('page-title', 'Edit Komentar')

@section('content')

        <form action="{{ route('komentar.update', $komentar->id_komentar) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="isi_komentar" class="block text-gray-700 font-medium mb-5">isi komentar:</label>
                <input type="text" id="isi_komentar" name="isi_komentar" value="{{ old('isi_komentar', $komentar->isi_komentar) }}" required
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