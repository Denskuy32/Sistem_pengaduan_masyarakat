<<<<<<< HEAD
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4">
    {{-- Statistik Utama --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm">Total Pengguna</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ $totalPengguna }}</p>
                </div>
                <i class="fas fa-users text-blue-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm">Total Pengaduan</h3>
                    <p class="text-2xl font-bold text-green-600">{{ $totalPengaduan }}</p>
                </div>
                <i class="fas fa-file-alt text-green-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm">Total Tanggapan</h3>
                    <p class="text-2xl font-bold text-purple-600">{{ $totalTanggapan }}</p>
                </div>
                <i class="fas fa-reply text-purple-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm">Total Kategori</h3>
                    <p class="text-2xl font-bold text-red-600">{{ $totalKategori }}</p>
                </div>
                <i class="fas fa-tags text-red-500 text-3xl"></i>
            </div>
        </div>
    </div>

    {{-- Bagian Utama Dashboard --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- Tabel Pengaduan Terbaru --}}
        <div class="md:col-span-2 bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Pengaduan Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-3 text-left">Judul</th>
                            <th class="p-3 text-left">Kategori</th>
                            <th class="p-3 text-left">Pelapor</th>
                            <th class="p-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentPengaduan as $pengaduan)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ Str::limit($pengaduan->judul_pengaduan, 30) }}</td>
                            <td class="p-3">{{ $pengaduan->kategori->nama_kategori }}</td>
                            <td class="p-3">{{ $pengaduan->pengguna->nama }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded-full text-xs 
                                    {{ $pengaduan->status == 'Selesai' ? 'bg-green-200 text-green-800' : 
                                       ($pengaduan->status == 'Proses' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                                    {{ $pengaduan->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Grafik Status Pengaduan --}}
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Status Pengaduan</h2>
            <div class="h-64">
                <canvas id="statusPengaduanChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Grafik dan Kategori --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        {{-- Grafik Bulanan --}}
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Tren Pengaduan Bulanan</h2>
            <div class="h-64">
                <canvas id="monthlyPengaduanChart"></canvas>
            </div>
        </div>

        {{-- Top Kategori --}}
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Kategori Teratas</h2>
            <ul>
                @foreach($topKategori as $kategori)
                <li class="flex justify-between p-3 border-b">
                    <span>{{ $kategori->nama_kategori }}</span>
                    <span class="font-bold">{{ $kategori->pengaduan_count }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart Status Pengaduan
        const statusPengaduanChart = new Chart(document.getElementById('statusPengaduanChart'), {
            type: 'pie',
            data: {
                labels: [
                    @foreach($statusPengaduan as $status)
                        '{{ $status->status }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($statusPengaduan as $status)
                            {{ $status->count }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',   // Biru
                        'rgba(255, 206, 86, 0.6)',   // Kuning
                        'rgba(75, 192, 192, 0.6)',   // Hijau
                        'rgba(255, 99, 132, 0.6)'    // Merah
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

     // Chart Bulanan
     const monthlyPengaduanChart = new Chart(document.getElementById('monthlyPengaduanChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: [
                        @for($i = 1; $i <= 12; $i++)
                            {{ $monthlyPengaduan->firstWhere('month', $i)['count'] ?? 0 }},
                        @endfor
                    ],
                    backgroundColor: 'rgba(165, 180, 252, 0.2)',
                    borderColor: 'rgba(6, 182, 212, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(6, 182, 212, 1)',
                    pointBorderColor: 'rgba(6, 182, 212, 1)',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(6, 182, 212, 1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(148, 163, 184, 0.1)',
                        },
                        ticks: {
                            precision: 0
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
=======
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4">
    {{-- Statistik Utama --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm">Total Pengguna</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ $totalPengguna }}</p>
                </div>
                <i class="fas fa-users text-blue-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm">Total Pengaduan</h3>
                    <p class="text-2xl font-bold text-green-600">{{ $totalPengaduan }}</p>
                </div>
                <i class="fas fa-file-alt text-green-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm">Total Tanggapan</h3>
                    <p class="text-2xl font-bold text-purple-600">{{ $totalTanggapan }}</p>
                </div>
                <i class="fas fa-reply text-purple-500 text-3xl"></i>
            </div>
        </div>
        <div class="bg-white p-5 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="text-gray-500 text-sm">Total Kategori</h3>
                    <p class="text-2xl font-bold text-red-600">{{ $totalKategori }}</p>
                </div>
                <i class="fas fa-tags text-red-500 text-3xl"></i>
            </div>
        </div>
    </div>

    {{-- Bagian Utama Dashboard --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- Tabel Pengaduan Terbaru --}}
        <div class="md:col-span-2 bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Pengaduan Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-3 text-left">Judul</th>
                            <th class="p-3 text-left">Kategori</th>
                            <th class="p-3 text-left">Pelapor</th>
                            <th class="p-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentPengaduan as $pengaduan)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ Str::limit($pengaduan->judul_pengaduan, 30) }}</td>
                            <td class="p-3">{{ $pengaduan->kategori->nama_kategori }}</td>
                            <td class="p-3">{{ $pengaduan->pengguna->nama }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded-full text-xs 
                                    {{ $pengaduan->status == 'Selesai' ? 'bg-green-200 text-green-800' : 
                                       ($pengaduan->status == 'Proses' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                                    {{ $pengaduan->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Grafik Status Pengaduan --}}
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Status Pengaduan</h2>
            <div class="h-64">
                <canvas id="statusPengaduanChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Grafik dan Kategori --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        {{-- Grafik Bulanan --}}
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Tren Pengaduan Bulanan</h2>
            <div class="h-64">
                <canvas id="monthlyPengaduanChart"></canvas>
            </div>
        </div>

        {{-- Top Kategori --}}
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Kategori Teratas</h2>
            <ul>
                @foreach($topKategori as $kategori)
                <li class="flex justify-between p-3 border-b">
                    <span>{{ $kategori->nama_kategori }}</span>
                    <span class="font-bold">{{ $kategori->pengaduan_count }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart Status Pengaduan
        const statusPengaduanChart = new Chart(document.getElementById('statusPengaduanChart'), {
            type: 'pie',
            data: {
                labels: [
                    @foreach($statusPengaduan as $status)
                        '{{ $status->status }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($statusPengaduan as $status)
                            {{ $status->count }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',   // Biru
                        'rgba(255, 206, 86, 0.6)',   // Kuning
                        'rgba(75, 192, 192, 0.6)',   // Hijau
                        'rgba(255, 99, 132, 0.6)'    // Merah
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

     // Chart Bulanan
     const monthlyPengaduanChart = new Chart(document.getElementById('monthlyPengaduanChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: [
                        @for($i = 1; $i <= 12; $i++)
                            {{ $monthlyPengaduan->firstWhere('month', $i)['count'] ?? 0 }},
                        @endfor
                    ],
                    backgroundColor: 'rgba(165, 180, 252, 0.2)',
                    borderColor: 'rgba(6, 182, 212, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(6, 182, 212, 1)',
                    pointBorderColor: 'rgba(6, 182, 212, 1)',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(6, 182, 212, 1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(148, 163, 184, 0.1)',
                        },
                        ticks: {
                            precision: 0
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
@endsection