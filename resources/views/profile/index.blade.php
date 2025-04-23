<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - Repotly</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1a4d7c;
            --secondary: #f3a712;
            --accent: #3498db;
            --danger: #e74c3c;
            --success: #27ae60;
            --light: #f8f9fa;
            --dark: #343a40;
            --white: #ffffff;
            --gray: #6c757d;
            --light-gray: #e9ecef;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        
        /* Header Styles */
        .header {
            background-color: var(--white);
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .logo {
            height: 40px;
        }
        
        .nav-link {
            color: var(--dark);
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--secondary);
            bottom: -5px;
            left: 0;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        /* Main Content Area */
        .main-content {
            padding: 40px 0;
            background: linear-gradient(180deg, #f5f7fa 0%, #ffffff 100%);
            min-height: calc(100vh - 80px);
        }
        
        .page-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        
        /* Card Styles */
        .custom-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            margin-bottom: 25px;
        }
        
        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background-color: var(--primary);
            color: var(--white);
            font-weight: 600;
            padding: 15px 20px;
            border-bottom: none;
            border-radius: 15px 15px 0 0 !important;
        }
        
        .card-body {
            padding: 25px;
        }
        
        /* Button Styles */
        .btn-custom {
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
            color: var(--white);
        }
        
        .btn-primary-custom:hover {
            background-color: #133c61;
            border-color: #133c61;
            color: var(--white);
        }
        
        .btn-secondary-custom {
            background-color: var(--secondary);
            border-color: var(--secondary);
            color: var(--dark);
        }
        
        .btn-secondary-custom:hover {
            background-color: #e09500;
            border-color: #e09500;
            color: var(--dark);
        }
        
        .btn-outline-custom {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline-custom:hover {
            background-color: var(--primary);
            color: var(--white);
        }
        
        /* Profile Specific Styles */
        .profile-header {
            background: linear-gradient(135deg, var(--primary) 0%, #2c82c9 100%);
            color: var(--white);
            border-radius: 15px;
            padding: 40px 30px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .profile-header::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -50px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .profile-img-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid var(--white);
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .profile-name-large {
            font-size: 28px;
            font-weight: 700;
            margin: 15px 0 5px;
        }
        
        .profile-role {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--white);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .profile-username-large {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 20px;
        }
        
        .profile-stats-container {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .profile-stat {
            text-align: center;
            padding: 0 10px;
        }
        
        .profile-stat-divider {
            width: 1px;
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        .profile-stat-value {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .profile-stat-label {
            font-size: 12px;
            opacity: 0.9;
        }
        
        .profile-action-btn {
            margin-right: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--white);
            border: none;
            padding: 8px 20px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .profile-action-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }
        
        /* Info Section Styles */
        .info-section-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .info-section-title:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--secondary);
            bottom: 0;
            left: 0;
        }
        
        .info-item {
            margin-bottom: 20px;
        }
        
        .info-label {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }
        
        .info-value {
            color: var(--dark);
            font-size: 16px;
            font-weight: 500;
        }
        
        /* Complaint History Table */
        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .custom-table th {
            background-color: #f8f9fa;
            padding: 12px 15px;
            color: var(--primary);
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #e9ecef;
            text-align: left;
        }
        
        .custom-table td {
            padding: 12px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
            font-size: 14px;
        }
        
        .custom-table tr:last-child td {
            border-bottom: none;
        }
        
        .custom-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 500;
            text-align: center;
            min-width: 90px;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-verified {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .status-processed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-completed {
            background-color: #d1e7dd;
            color: #0f5132;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .profile-img-large {
                width: 100px;
                height: 100px;
            }
            
            .profile-name-large {
                font-size: 24px;
            }
            
            .profile-header {
                padding: 25px 20px;
            }
            
            .profile-stats-container {
                flex-wrap: wrap;
            }
            
            .profile-stat {
                flex-basis: 50%;
                margin-bottom: 15px;
            }
            
            .profile-stat-divider {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                <div class="logo-text me-4" style="font-weight: 700; font-size: 1.5rem; color: var(--primary);">
                    Repotly<span style="color: var(--secondary);">!</span>
                </div>
                <nav class="d-none d-md-flex">
                        <a href="{{ route('home.lapor_baru') }}" class="nav-link">BERANDA</a>
                        <a href="{{ route('home.lapor') }}" class="nav-link">LAPORAN</a>
                        <a href="{{ route('tentang') }}" class="nav-link">TENTANG LAPOR!</a>
                    </nav>
                </div>
    </footer>                <div class="d-flex align-items-center">
                    @auth
                        <a href="#" class="me-3 position-relative">
                            <i class="bi bi-bell fs-5" style="color: var(--gray);"></i>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->foto_profil)
                                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" width="32" height="32" class="rounded-circle me-2">
                                @else
                                    <img src="{{ asset('images/profile.jpg') }}" width="32" height="32" class="rounded-circle me-2">
                                @endif
                                <span class="d-none d-md-inline text-dark">{{ Auth::user()->nama }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bi bi-person me-2"></i> Profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2"></i> Edit Profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.password') }}"><i class="bi bi-shield-lock me-2"></i> Ubah Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i> Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-custom me-2">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary-custom">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex flex-column flex-md-row align-items-md-center">
                            <div class="text-center text-md-start me-md-4">
                                @if(Auth::user()->foto_profil)
                                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Profile" class="profile-img-large">
                                @else
                                    <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="profile-img-large">
                                @endif
                            </div>
                            <div class="text-center text-md-start mt-3 mt-md-0">
                                <h1 class="profile-name-large">{{ Auth::user()->nama }}</h1>
                                <span class="profile-role">{{ Auth::user()->role }}</span>
                                <p class="profile-username-large"><i class="bi bi-person-badge me-2"></i>{{ Auth::user()->nik }}</p>
                                <div>
                                    <a href="{{ route('profile.edit') }}" class="btn profile-action-btn">
                                        <i class="bi bi-pencil me-2"></i>Edit Profil
                                    </a>
                                    <a href="{{ route('profile.password') }}" class="btn profile-action-btn">
                                        <i class="bi bi-shield-lock me-2"></i>Ubah Password
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <!-- Profile Stats -->
                        <div class="profile-stats-container">
                            <div class="d-flex justify-content-around">
                                @php
                                    $totalPengaduan = App\Models\Pengaduan::where('id_pengguna', Auth::id())->count();
                                    $terverifikasi = App\Models\Pengaduan::where('id_pengguna', Auth::id())->where('status', 'Diverifikasi')->count();
                                    $diproses = App\Models\Pengaduan::where('id_pengguna', Auth::id())->where('status', 'Diproses')->count();
                                    $selesai = App\Models\Pengaduan::where('id_pengguna', Auth::id())->where('status', 'Selesai')->count();
                                @endphp
                                <div class="profile-stat">
                                    <div class="profile-stat-value">{{ $totalPengaduan }}</div>
                                    <div class="profile-stat-label">Total Laporan</div>
                                </div>
                                <div class="profile-stat-divider"></div>
                                <div class="profile-stat">
                                    <div class="profile-stat-value">{{ $diproses }}</div>
                                    <div class="profile-stat-label">Diproses</div>
                                </div>
                                <div class="profile-stat-divider"></div>
                                <div class="profile-stat">
                                    <div class="profile-stat-value">{{ $selesai }}</div>
                                    <div class="profile-stat-label">Selesai</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Create Report Button -->
                        <div class="text-center mt-3">
                            <a href="{{ route('home.lapor') }}" class="btn btn-secondary-custom w-100">
                                <i class="bi bi-plus-circle me-2"></i>Buat Laporan Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Personal Information -->
                <div class="col-lg-4 mb-4">
                    <div class="custom-card">
                        <div class="card-header d-flex align-items-center">
                            <i class="bi bi-person-vcard me-2"></i>
                            <span>Informasi Pribadi</span>
                        </div>
                        <div class="card-body">
                            <div class="info-item">
                                <span class="info-label">Nama Lengkap</span>
                                <span class="info-value">{{ Auth::user()->nama }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">NIK</span>
                                <span class="info-value">{{ Auth::user()->nik }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email</span>
                                <span class="info-value">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Nomor Handphone</span>
                                <span class="info-value">{{ Auth::user()->nomor_hp }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Alamat</span>
                                <span class="info-value">{{ Auth::user()->alamat }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tanggal Bergabung</span>
                                <span class="info-value">{{ Auth::user()->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notification Card -->
                    <div class="custom-card">
                        <div class="card-header d-flex align-items-center">
                            <i class="bi bi-bell me-2"></i>
                            <span>Notifikasi Terbaru</span>
                        </div>
                        <div class="card-body">
                            @php
                                $notifikasi = App\Models\Notifikasi::where('id_pengguna', Auth::id())
                                    ->orderBy('created_at', 'desc')
                                    ->limit(5)
                                    ->get();
                            @endphp
                            
                            @if($notifikasi->count() > 0)
                                @foreach($notifikasi as $notif)
                                    <div class="d-flex align-items-start mb-3 pb-3" style="border-bottom: 1px solid #eee;">
                                        <div class="me-3 mt-1">
                                            <span class="d-inline-block p-2 rounded-circle {{ $notif->status == 'Belum Dibaca' ? 'bg-primary' : 'bg-light' }}"></span>
                                        </div>
                                        <div>
                                            <p class="mb-1" style="font-size: 14px;">{{ $notif->pesan_notifikasi }}</p>
                                            <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-bell-slash fs-1 text-muted"></i>
                                    <p class="mt-3 text-muted">Belum ada notifikasi</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Complaint History -->
                <div class="col-lg-8">
                    <div class="custom-card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div>
                                <i class="bi bi-list-ul me-2"></i>
                                <span>Riwayat Laporan</span>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm text-white dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-funnel me-1"></i>Filter
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                                    <li><a class="dropdown-item" href="#">Semua</a></li>
                                    <li><a class="dropdown-item" href="#">Pending</a></li>
                                    <li><a class="dropdown-item" href="#">Diverifikasi</a></li>
                                    <li><a class="dropdown-item" href="#">Diproses</a></li>
                                    <li><a class="dropdown-item" href="#">Selesai</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                $pengaduan = App\Models\Pengaduan::where('id_pengguna', Auth::id())
                                    ->orderBy('created_at', 'desc')
                                    ->take(10)
                                    ->get();
                            @endphp
                            
                            @if($pengaduan->count() > 0)
                                <div class="table-responsive">
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Judul</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pengaduan as $item)
                                                <tr>
                                                    <td>#PGD-{{ $item->id_pengaduan }}</td>
                                                    <td>{{ $item->judul_pengaduan }}</td>
                                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        @php
                                                            $statusClass = '';
                                                            switch($item->status) {
                                                                case 'Pending':
                                                                    $statusClass = 'status-pending';
                                                                    break;
                                                                case 'Diverifikasi':
                                                                    $statusClass = 'status-verified';
                                                                    break;
                                                                case 'Diproses':
                                                                    $statusClass = 'status-processed';
                                                                    break;
                                                                case 'Selesai':
                                                                    $statusClass = 'status-completed';
                                                                    break;
                                                            }
                                                        @endphp
                                                        <span class="status-badge {{ $statusClass }}">{{ $item->status }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="bi bi-clipboard-x fs-1 text-muted"></i>
                                    <p class="mt-3 text-muted">Anda belum memiliki laporan</p>
                                    <a href="{{ route('home.lapor') }}" class="btn btn-primary-custom mt-2">
                                        <i class="bi bi-plus-circle me-2"></i>Buat Laporan Baru
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                   <!-- Recent Responses -->
<div class="custom-card">
    <div class="card-header d-flex align-items-center">
        <i class="bi bi-chat-quote me-2"></i>
        <span>Tanggapan Terbaru</span>
    </div>
    <div class="card-body">
        @php
            $tanggapan = App\Models\Tanggapan::whereHas('pengaduan', function($query) {
                $query->where('id_pengguna', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        @endphp
        
        @if($tanggapan->count() > 0)
            @foreach($tanggapan as $tgp)
                <div class="mb-4 pb-4" style="border-bottom: 1px solid #eee;">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h6 class="mb-0 fw-bold">{{ $tgp->pengaduan->judul_pengaduan }}</h6>
                            @php
                                $admin = App\Models\User::where('id', $tgp->id_admin)->first();
                            @endphp
                            <small class="text-muted">Ditanggapi oleh: {{ $admin ? $admin->nama : 'Admin' }}</small>
                        </div>
                        <small class="text-muted">{{ $tgp->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="p-3 bg-light rounded">
                        <p class="mb-0" style="font-size: 15px; line-height: 1.5;">{{ $tgp->isi_tanggapan }}</p>
                    </div>
                    
                    @if($tgp->lampiran)
                    <div class="mt-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-paperclip me-2 text-primary"></i>
                            <a href="{{ asset('storage/' . $tgp->lampiran) }}" class="text-decoration-none" target="_blank">
                                Lampiran <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            @endforeach
        @else
            <div class="text-center py-4">
                <i class="bi bi-chat-square-text fs-1 text-muted"></i>
                <p class="mt-3 text-muted">Belum ada tanggapan</p>
            </div>
        @endif
    </div>
</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4" style="background-color: var(--primary); color: var(--white);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <h5 class="mb-3">Repotly</h5>
                    <p class="mb-2">Layanan Aspirasi dan Pengaduan Online Rakyat</p>
                    <p class="mb-0 small">Jl. Medan Merdeka Barat No. 10, Jakarta Pusat</p>
                    <p class="mb-0 small">Email: Repotly@gmail.com</p>
                    <p class="mb-0 small">Telepon: (021) 1234567</p>
                </div>
                <div class="col-lg-2 mb-3">
                    <h6 class="mb-3">Tentang Kami</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Tentang Repotly</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Kebijakan Privasi</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Syarat dan Ketentuan</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-3">
                    <h6 class="mb-3">Laporan</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Buat Laporan</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Cek Status</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Statistik</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Arsip</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3">Ikuti Kami</h6>
                    <div class="d-flex mb-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter-x fs-5"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube fs-5"></i></a>
                    </div>
                    <h6 class="mb-2">Unduh Aplikasi</h6>
                    <div class="d-flex">
                        <a href="#" class="me-2">
                            <img src="{{ asset('images/google-play.png') }}" alt="Google Play" class="img-fluid" style="max-width: 120px;">
                        </a>
                        <a href="#">
                            <img src="{{ asset('images/app-store.png') }}" alt="App Store" class="img-fluid" style="max-width: 120px;">
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="background-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p class="small mb-0">© 2023 Repotly - Layanan Aspirasi dan Pengaduan Online Rakyat. Hak Cipta Dilindungi.</p>
            </div>
        </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Active navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to current page in navigation
            const currentUrl = window.location.href;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.href === currentUrl) {
                    link.classList.add('active');
                    link.style.color = 'var(--primary)';
                }
            });
        });
    </script>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - Repotly</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1a4d7c;
            --secondary: #f3a712;
            --accent: #3498db;
            --danger: #e74c3c;
            --success: #27ae60;
            --light: #f8f9fa;
            --dark: #343a40;
            --white: #ffffff;
            --gray: #6c757d;
            --light-gray: #e9ecef;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }
        
        /* Header Styles */
        .header {
            background-color: var(--white);
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .logo {
            height: 40px;
        }
        
        .nav-link {
            color: var(--dark);
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--secondary);
            bottom: -5px;
            left: 0;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        /* Main Content Area */
        .main-content {
            padding: 40px 0;
            background: linear-gradient(180deg, #f5f7fa 0%, #ffffff 100%);
            min-height: calc(100vh - 80px);
        }
        
        .page-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        
        /* Card Styles */
        .custom-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            margin-bottom: 25px;
        }
        
        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background-color: var(--primary);
            color: var(--white);
            font-weight: 600;
            padding: 15px 20px;
            border-bottom: none;
            border-radius: 15px 15px 0 0 !important;
        }
        
        .card-body {
            padding: 25px;
        }
        
        /* Button Styles */
        .btn-custom {
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
            color: var(--white);
        }
        
        .btn-primary-custom:hover {
            background-color: #133c61;
            border-color: #133c61;
            color: var(--white);
        }
        
        .btn-secondary-custom {
            background-color: var(--secondary);
            border-color: var(--secondary);
            color: var(--dark);
        }
        
        .btn-secondary-custom:hover {
            background-color: #e09500;
            border-color: #e09500;
            color: var(--dark);
        }
        
        .btn-outline-custom {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline-custom:hover {
            background-color: var(--primary);
            color: var(--white);
        }
        
        /* Profile Specific Styles */
        .profile-header {
            background: linear-gradient(135deg, var(--primary) 0%, #2c82c9 100%);
            color: var(--white);
            border-radius: 15px;
            padding: 40px 30px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .profile-header::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -50px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .profile-img-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid var(--white);
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .profile-name-large {
            font-size: 28px;
            font-weight: 700;
            margin: 15px 0 5px;
        }
        
        .profile-role {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--white);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .profile-username-large {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 20px;
        }
        
        .profile-stats-container {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .profile-stat {
            text-align: center;
            padding: 0 10px;
        }
        
        .profile-stat-divider {
            width: 1px;
            background-color: rgba(255, 255, 255, 0.3);
        }
        
        .profile-stat-value {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .profile-stat-label {
            font-size: 12px;
            opacity: 0.9;
        }
        
        .profile-action-btn {
            margin-right: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--white);
            border: none;
            padding: 8px 20px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .profile-action-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }
        
        /* Info Section Styles */
        .info-section-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .info-section-title:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--secondary);
            bottom: 0;
            left: 0;
        }
        
        .info-item {
            margin-bottom: 20px;
        }
        
        .info-label {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }
        
        .info-value {
            color: var(--dark);
            font-size: 16px;
            font-weight: 500;
        }
        
        /* Complaint History Table */
        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .custom-table th {
            background-color: #f8f9fa;
            padding: 12px 15px;
            color: var(--primary);
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #e9ecef;
            text-align: left;
        }
        
        .custom-table td {
            padding: 12px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
            font-size: 14px;
        }
        
        .custom-table tr:last-child td {
            border-bottom: none;
        }
        
        .custom-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 500;
            text-align: center;
            min-width: 90px;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-verified {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .status-processed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-completed {
            background-color: #d1e7dd;
            color: #0f5132;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .profile-img-large {
                width: 100px;
                height: 100px;
            }
            
            .profile-name-large {
                font-size: 24px;
            }
            
            .profile-header {
                padding: 25px 20px;
            }
            
            .profile-stats-container {
                flex-wrap: wrap;
            }
            
            .profile-stat {
                flex-basis: 50%;
                margin-bottom: 15px;
            }
            
            .profile-stat-divider {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                <div class="logo-text me-4" style="font-weight: 700; font-size: 1.5rem; color: var(--primary);">
                    Repotly<span style="color: var(--secondary);">!</span>
                </div>
                <nav class="d-none d-md-flex">
                        <a href="{{ route('home.lapor_baru') }}" class="nav-link">BERANDA</a>
                        <a href="{{ route('home.lapor') }}" class="nav-link">LAPORAN</a>
                        <a href="{{ route('tentang') }}" class="nav-link">TENTANG LAPOR!</a>
                    </nav>
                </div>
    </footer>                <div class="d-flex align-items-center">
                    @auth
                        <a href="#" class="me-3 position-relative">
                            <i class="bi bi-bell fs-5" style="color: var(--gray);"></i>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->foto_profil)
                                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" width="32" height="32" class="rounded-circle me-2">
                                @else
                                    <img src="{{ asset('images/profile.jpg') }}" width="32" height="32" class="rounded-circle me-2">
                                @endif
                                <span class="d-none d-md-inline text-dark">{{ Auth::user()->nama }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bi bi-person me-2"></i> Profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-gear me-2"></i> Edit Profil</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.password') }}"><i class="bi bi-shield-lock me-2"></i> Ubah Password</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i> Keluar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-custom me-2">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-primary-custom">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex flex-column flex-md-row align-items-md-center">
                            <div class="text-center text-md-start me-md-4">
                                @if(Auth::user()->foto_profil)
                                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Profile" class="profile-img-large">
                                @else
                                    <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="profile-img-large">
                                @endif
                            </div>
                            <div class="text-center text-md-start mt-3 mt-md-0">
                                <h1 class="profile-name-large">{{ Auth::user()->nama }}</h1>
                                <span class="profile-role">{{ Auth::user()->role }}</span>
                                <p class="profile-username-large"><i class="bi bi-person-badge me-2"></i>{{ Auth::user()->nik }}</p>
                                <div>
                                    <a href="{{ route('profile.edit') }}" class="btn profile-action-btn">
                                        <i class="bi bi-pencil me-2"></i>Edit Profil
                                    </a>
                                    <a href="{{ route('profile.password') }}" class="btn profile-action-btn">
                                        <i class="bi bi-shield-lock me-2"></i>Ubah Password
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-md-0">
                        <!-- Profile Stats -->
                        <div class="profile-stats-container">
                            <div class="d-flex justify-content-around">
                                @php
                                    $totalPengaduan = App\Models\Pengaduan::where('id_pengguna', Auth::id())->count();
                                    $terverifikasi = App\Models\Pengaduan::where('id_pengguna', Auth::id())->where('status', 'Diverifikasi')->count();
                                    $diproses = App\Models\Pengaduan::where('id_pengguna', Auth::id())->where('status', 'Diproses')->count();
                                    $selesai = App\Models\Pengaduan::where('id_pengguna', Auth::id())->where('status', 'Selesai')->count();
                                @endphp
                                <div class="profile-stat">
                                    <div class="profile-stat-value">{{ $totalPengaduan }}</div>
                                    <div class="profile-stat-label">Total Laporan</div>
                                </div>
                                <div class="profile-stat-divider"></div>
                                <div class="profile-stat">
                                    <div class="profile-stat-value">{{ $diproses }}</div>
                                    <div class="profile-stat-label">Diproses</div>
                                </div>
                                <div class="profile-stat-divider"></div>
                                <div class="profile-stat">
                                    <div class="profile-stat-value">{{ $selesai }}</div>
                                    <div class="profile-stat-label">Selesai</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Create Report Button -->
                        <div class="text-center mt-3">
                            <a href="{{ route('home.lapor') }}" class="btn btn-secondary-custom w-100">
                                <i class="bi bi-plus-circle me-2"></i>Buat Laporan Baru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Personal Information -->
                <div class="col-lg-4 mb-4">
                    <div class="custom-card">
                        <div class="card-header d-flex align-items-center">
                            <i class="bi bi-person-vcard me-2"></i>
                            <span>Informasi Pribadi</span>
                        </div>
                        <div class="card-body">
                            <div class="info-item">
                                <span class="info-label">Nama Lengkap</span>
                                <span class="info-value">{{ Auth::user()->nama }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">NIK</span>
                                <span class="info-value">{{ Auth::user()->nik }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email</span>
                                <span class="info-value">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Nomor Handphone</span>
                                <span class="info-value">{{ Auth::user()->nomor_hp }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Alamat</span>
                                <span class="info-value">{{ Auth::user()->alamat }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Tanggal Bergabung</span>
                                <span class="info-value">{{ Auth::user()->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notification Card -->
                    <div class="custom-card">
                        <div class="card-header d-flex align-items-center">
                            <i class="bi bi-bell me-2"></i>
                            <span>Notifikasi Terbaru</span>
                        </div>
                        <div class="card-body">
                            @php
                                $notifikasi = App\Models\Notifikasi::where('id_pengguna', Auth::id())
                                    ->orderBy('created_at', 'desc')
                                    ->limit(5)
                                    ->get();
                            @endphp
                            
                            @if($notifikasi->count() > 0)
                                @foreach($notifikasi as $notif)
                                    <div class="d-flex align-items-start mb-3 pb-3" style="border-bottom: 1px solid #eee;">
                                        <div class="me-3 mt-1">
                                            <span class="d-inline-block p-2 rounded-circle {{ $notif->status == 'Belum Dibaca' ? 'bg-primary' : 'bg-light' }}"></span>
                                        </div>
                                        <div>
                                            <p class="mb-1" style="font-size: 14px;">{{ $notif->pesan_notifikasi }}</p>
                                            <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-bell-slash fs-1 text-muted"></i>
                                    <p class="mt-3 text-muted">Belum ada notifikasi</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Complaint History -->
                <div class="col-lg-8">
                    <div class="custom-card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div>
                                <i class="bi bi-list-ul me-2"></i>
                                <span>Riwayat Laporan</span>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-sm text-white dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-funnel me-1"></i>Filter
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                                    <li><a class="dropdown-item" href="#">Semua</a></li>
                                    <li><a class="dropdown-item" href="#">Pending</a></li>
                                    <li><a class="dropdown-item" href="#">Diverifikasi</a></li>
                                    <li><a class="dropdown-item" href="#">Diproses</a></li>
                                    <li><a class="dropdown-item" href="#">Selesai</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                $pengaduan = App\Models\Pengaduan::where('id_pengguna', Auth::id())
                                    ->orderBy('created_at', 'desc')
                                    ->take(10)
                                    ->get();
                            @endphp
                            
                            @if($pengaduan->count() > 0)
                                <div class="table-responsive">
                                    <table class="custom-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Judul</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pengaduan as $item)
                                                <tr>
                                                    <td>#PGD-{{ $item->id_pengaduan }}</td>
                                                    <td>{{ $item->judul_pengaduan }}</td>
                                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        @php
                                                            $statusClass = '';
                                                            switch($item->status) {
                                                                case 'Pending':
                                                                    $statusClass = 'status-pending';
                                                                    break;
                                                                case 'Diverifikasi':
                                                                    $statusClass = 'status-verified';
                                                                    break;
                                                                case 'Diproses':
                                                                    $statusClass = 'status-processed';
                                                                    break;
                                                                case 'Selesai':
                                                                    $statusClass = 'status-completed';
                                                                    break;
                                                            }
                                                        @endphp
                                                        <span class="status-badge {{ $statusClass }}">{{ $item->status }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="bi bi-clipboard-x fs-1 text-muted"></i>
                                    <p class="mt-3 text-muted">Anda belum memiliki laporan</p>
                                    <a href="{{ route('home.lapor') }}" class="btn btn-primary-custom mt-2">
                                        <i class="bi bi-plus-circle me-2"></i>Buat Laporan Baru
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                   <!-- Recent Responses -->
<div class="custom-card">
    <div class="card-header d-flex align-items-center">
        <i class="bi bi-chat-quote me-2"></i>
        <span>Tanggapan Terbaru</span>
    </div>
    <div class="card-body">
        @php
            $tanggapan = App\Models\Tanggapan::whereHas('pengaduan', function($query) {
                $query->where('id_pengguna', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        @endphp
        
        @if($tanggapan->count() > 0)
            @foreach($tanggapan as $tgp)
                <div class="mb-4 pb-4" style="border-bottom: 1px solid #eee;">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h6 class="mb-0 fw-bold">{{ $tgp->pengaduan->judul_pengaduan }}</h6>
                            @php
                                $admin = App\Models\User::where('id', $tgp->id_admin)->first();
                            @endphp
                            <small class="text-muted">Ditanggapi oleh: {{ $admin ? $admin->nama : 'Admin' }}</small>
                        </div>
                        <small class="text-muted">{{ $tgp->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="p-3 bg-light rounded">
                        <p class="mb-0" style="font-size: 15px; line-height: 1.5;">{{ $tgp->isi_tanggapan }}</p>
                    </div>
                    
                    @if($tgp->lampiran)
                    <div class="mt-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-paperclip me-2 text-primary"></i>
                            <a href="{{ asset('storage/' . $tgp->lampiran) }}" class="text-decoration-none" target="_blank">
                                Lampiran <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            @endforeach
        @else
            <div class="text-center py-4">
                <i class="bi bi-chat-square-text fs-1 text-muted"></i>
                <p class="mt-3 text-muted">Belum ada tanggapan</p>
            </div>
        @endif
    </div>
</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4" style="background-color: var(--primary); color: var(--white);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <h5 class="mb-3">Repotly</h5>
                    <p class="mb-2">Layanan Aspirasi dan Pengaduan Online Rakyat</p>
                    <p class="mb-0 small">Jl. Medan Merdeka Barat No. 10, Jakarta Pusat</p>
                    <p class="mb-0 small">Email: Repotly@gmail.com</p>
                    <p class="mb-0 small">Telepon: (021) 1234567</p>
                </div>
                <div class="col-lg-2 mb-3">
                    <h6 class="mb-3">Tentang Kami</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Tentang Repotly</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Kebijakan Privasi</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Syarat dan Ketentuan</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-3">
                    <h6 class="mb-3">Laporan</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Buat Laporan</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Cek Status</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Statistik</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Arsip</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="mb-3">Ikuti Kami</h6>
                    <div class="d-flex mb-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter-x fs-5"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube fs-5"></i></a>
                    </div>
                    <h6 class="mb-2">Unduh Aplikasi</h6>
                    <div class="d-flex">
                        <a href="#" class="me-2">
                            <img src="{{ asset('images/google-play.png') }}" alt="Google Play" class="img-fluid" style="max-width: 120px;">
                        </a>
                        <a href="#">
                            <img src="{{ asset('images/app-store.png') }}" alt="App Store" class="img-fluid" style="max-width: 120px;">
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="background-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p class="small mb-0">© 2023 Repotly - Layanan Aspirasi dan Pengaduan Online Rakyat. Hak Cipta Dilindungi.</p>
            </div>
        </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Active navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Add active class to current page in navigation
            const currentUrl = window.location.href;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.href === currentUrl) {
                    link.classList.add('active');
                    link.style.color = 'var(--primary)';
                }
            });
        });
    </script>
</body>
</html>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
