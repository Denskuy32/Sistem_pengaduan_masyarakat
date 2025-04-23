@extends('layouts.admin')

@section('title', 'Detail Pengaduan')

@section('page-title', 'Detail Pengaduan')

@section('content')
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header Section with Status Badge -->
        <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-white">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold mb-2">{{ $pengaduan->judul_pengaduan }}</h1>
                    <div class="flex items-center gap-2 text-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <span>Dibuat pada {{ date('d F Y, H:i', strtotime($pengaduan->tanggal_pengaduan)) }}</span>
                    </div>
                </div>
                <div>
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium
                        {{ $pengaduan->status == 'Pending' ? 'bg-yellow-200 text-yellow-800' : 
                        ($pengaduan->status == 'Diverifikasi' ? 'bg-blue-200 text-blue-800' : 
                        ($pengaduan->status == 'Diproses' ? 'bg-orange-200 text-orange-800' : 'bg-green-200 text-green-800')) }}">
                        <span class="mr-1.5 h-2 w-2 rounded-full 
                            {{ $pengaduan->status == 'Pending' ? 'bg-yellow-500' : 
                            ($pengaduan->status == 'Diverifikasi' ? 'bg-blue-500' : 
                            ($pengaduan->status == 'Diproses' ? 'bg-orange-500' : 'bg-green-500')) }}"></span>
                        {{ $pengaduan->status }}
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Quick Action Buttons -->
        <div class="bg-gray-50 border-b border-gray-200 px-6 py-3">
            <div class="flex flex-wrap gap-2">
                @if($pengaduan->status == 'Pending')
                <form action="{{ route('pengaduan.update-status', $pengaduan->id_pengaduan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="Diverifikasi">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring focus:ring-blue-200 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Verifikasi Pengaduan
                    </button>
                </form>
                @endif

                @if($pengaduan->status == 'Diverifikasi')
                <button type="button" 
                    onclick="document.getElementById('forwardModal').classList.remove('hidden')"
                    class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-800 focus:outline-none focus:border-orange-800 focus:ring focus:ring-orange-200 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    Teruskan ke Instansi
                </button>
                @endif
                
                @if($pengaduan->status == 'Diproses')
                <form action="{{ route('pengaduan.update-status', $pengaduan->id_pengaduan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="Selesai">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-800 focus:outline-none focus:border-green-800 focus:ring focus:ring-green-200 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Selesaikan Pengaduan
                    </button>
                </form>
                @endif
                
                <form action="{{ route('pengaduan.destroy', $pengaduan->id_pengaduan) }}" method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-200 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Left Column - Complaint Details -->
            <div class="md:col-span-2 space-y-6">
                <!-- Complaint Information Card -->
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Pengaduan</h3>
                    </div>
                    <div class="p-4 space-y-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Deskripsi</h4>
                            <div class="mt-1 p-3 bg-gray-50 rounded-md text-gray-800">
                                {!! nl2br(e($pengaduan->deskripsi)) !!}
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Lokasi</h4>
                            <div class="mt-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="text-gray-800">{{ $pengaduan->lokasi }}</span>
                            </div>
                        </div>
                        
                        @if($pengaduan->lampiran)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Lampiran</h4>
                            <div class="mt-2">
                                <a href="{{ Storage::url($pengaduan->lampiran) }}" target="_blank" 
                                    class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    Lihat Lampiran
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Responses Section -->
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Riwayat Tanggapan</h3>
                    </div>
                    
                    <div class="divide-y divide-gray-200">
                    @if($tanggapan->isEmpty())
    <div class="p-4 text-center">
        <p class="text-gray-500 italic">Belum ada tanggapan untuk pengaduan ini.</p>
    </div>
@else
    @foreach($tanggapan as $item)
    <div class="p-4">
        <div class="flex items-start mb-2">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="ml-3 flex-1">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-sm font-medium text-gray-900">
                            Admin
                        </span>
                        <span class="ml-2 text-xs text-gray-500">
                            {{ date('d M Y, H:i', strtotime($item->created_at)) }}
                        </span>
                    </div>
                </div>
                <div class="mt-1 text-sm text-gray-700 whitespace-pre-line">
                    {!! nl2br(e($item->isi_tanggapan)) !!}
                </div>
                @if($item->lampiran)
                <div class="mt-2">
                    <a href="{{ Storage::url($item->lampiran) }}" target="_blank" 
                        class="inline-flex items-center px-2 py-1 border border-gray-300 shadow-sm text-xs leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        Lampiran Tanggapan
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
@endif

                        <!-- Add Response Form -->
                        <div class="p-4 bg-gray-50">
                        <form action="{{ route('pengaduan.storeTanggapan') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                                
                                <div class="mb-4">
                                    <label for="isi_tanggapan" class="block text-sm font-medium text-gray-700 mb-1">Tambahkan Tanggapan</label>
                                    <textarea id="isi_tanggapan" name="isi_tanggapan" rows="3" required 
                                        class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md"
                                        placeholder="Masukkan tanggapan Anda disini..."></textarea>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="lampiran" class="block text-sm font-medium text-gray-700 mb-1">
                                        Lampiran (Opsional)
                                    </label>
                                    <div class="mt-1 flex items-center">
                                        <input type="file" id="lampiran" name="lampiran" 
                                            class="block w-full text-sm text-gray-500
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-md file:border-0
                                            file:text-sm file:font-medium
                                            file:bg-blue-50 file:text-blue-700
                                            hover:file:bg-blue-100"
                                            accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx">
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">
                                        JPG, PNG, PDF, DOC, DOCX, XLS, XLSX hingga 5MB
                                    </p>
                                </div>
                                
                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                        Kirim Tanggapan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Metadata -->
            <div class="space-y-6">
                <!-- Complaint Metadata -->
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-gray-50 px-4 py-3 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Detail Pengaduan</h3>
                    </div>
                    <div class="p-4">
                        <dl class="divide-y divide-gray-200">
                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">ID Pengaduan</dt>
                                <dd class="text-sm text-gray-900 col-span-2 font-mono">{{ $pengaduan->id_pengaduan }}</dd>
                            </div>
                            
                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ $pengaduan->kategori->nama_kategori ?? 'Tidak dikategorikan' }}</dd>
                            </div>
                            
                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Pelapor</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ $pengaduan->pengguna->nama ?? 'Tidak diketahui' }}</dd>
                            </div>

                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Kontak</dt>
                                <dd class="text-sm text-gray-900 col-span-2">
                                    {{ $pengaduan->pengguna->nomor_hp ?? 'Tidak tersedia' }} <br>
                                    <span class="text-blue-600">{{ $pengaduan->pengguna->email ?? '' }}</span>
                                </dd>
                            </div>
                            
                            <div class="py-2 grid grid-cols-3 gap-4">
                                <dt class="text-sm font-medium text-gray-500">Tanggal</dt>
                                <dd class="text-sm text-gray-900 col-span-2">{{ date('d F Y, H:i', strtotime($pengaduan->tanggal_pengaduan)) }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Forwarded Institutions Card (if applicable) -->
                @if($pengaduan->status != 'Pending' && $pengaduan->status != 'Diverifikasi')
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                    <div class="bg-orange-50 px-4 py-3 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-orange-800">Instansi Terkait</h3>
                    </div>
                    <div class="p-4">
                        @php
                            $pengaduanInstansi = DB::table('pengaduan_instansi')
                                ->where('id_pengaduan', $pengaduan->id_pengaduan)
                                ->join('instansi', 'pengaduan_instansi.id_instansi', '=', 'instansi.id_instansi')
                                ->select('instansi.*')
                                ->get();
                        @endphp

                        @if($pengaduanInstansi->isEmpty())
                            <p class="text-gray-500 italic text-sm">Pengaduan belum diteruskan ke instansi manapun.</p>
                        @else
                            <ul class="divide-y divide-gray-200">
                                @foreach($pengaduanInstansi as $inst)
                                <li class="py-3">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ $inst->nama_instansi }}</p>
                                            <div class="mt-1 flex flex-col text-xs text-gray-500">
                                                <span class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                    </svg>
                                                    {{ $inst->kontak }}
                                                </span>
                                                <span class="flex items-center mt-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    {{ $inst->alamat }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Teruskan ke Instansi Modal -->
    <div id="forwardModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="bg-gray-50 px-4 py-3 border-b border-gray-200 rounded-t-lg">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Teruskan Pengaduan ke Instansi</h3>
                    <button type="button" onclick="document.getElementById('forwardModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <form action="{{ route('pengaduan.forward', $pengaduan->id_pengaduan) }}" method="POST">
                @csrf
                <div class="p-4">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Instansi:</label>
                        <div class="max-h-48 overflow-y-auto border rounded-lg p-2 bg-white">
                            @foreach($instansi as $ins)
                            <div class="flex items-center py-2 px-1 hover:bg-gray-50 rounded-md">
                                <input type="checkbox" name="instansi[]" value="{{ $ins->id_instansi }}" 
                                    id="instansi-{{ $ins->id_instansi }}" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="instansi-{{ $ins->id_instansi }}" class="ml-3 text-sm text-gray-700 cursor-pointer w-full">
                                    <div class="font-medium">{{ $ins->nama_instansi }}</div>
                                    <div class="text-xs text-gray-500">{{ $ins->alamat }}</div>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 rounded-b-lg flex justify-end gap-2">
                    <button type="button" 
                        onclick="document.getElementById('forwardModal').classList.add('hidden')" 
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Batal
                    </button>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        Teruskan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection