@extends('layouts.admin')

@section('title', 'Tanggapan')

@section('page-title', 'Edit tanggapan')

@section('content')

        <form action="{{ route('tanggapan.update', $tanggapan->id_tanggapan) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="isi_tanggapan" class="block text-gray-700 font-medium mb-2">isi tanggapan:</label>
                <input type="text" id="isi_tanggapan" name="isi_tanggapan" value="{{ old('isi_tanggapan', $tanggapan->isi_tanggapan) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="lampiran" class="block text-gray-700 font-medium mb-2">Lampiran (Opsional):</label>
                <input type="file" id="lampiran" name="lampiran" 
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    accept=".jpg,.jpeg,.png,.pdf">
                
                @if($tanggapan->lampiran)
                <div class="mt-2">
                    <p class="text-sm text-gray-600">Lampiran saat ini:</p>
                    <a href="{{ Storage::url($tanggapan->lampiran) }}" target="_blank" 
                        class="inline-flex items-center mt-1 px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        Lihat Lampiran
                    </a>
                </div>
                <p class="text-xs text-gray-500 mt-1">Unggah file baru untuk mengganti lampiran saat ini, atau biarkan kosong untuk tetap menggunakan lampiran yang ada.</p>
                @else
                <p class="text-xs text-gray-500 mt-1">Format yang didukung: JPG, PNG, PDF (Maks. 2MB)</p>
                @endif
            </div>
            <div>
                <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                    Perbarui
                </button>
            </div>
        </form>
@endsection