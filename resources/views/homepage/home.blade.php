<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Repotly - Layanan dan Pengaduan Online Rakyat</title>
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
        
        /* Form Elements */
        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
            box-shadow: none;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        textarea.form-control {
            min-height: 120px;
        }
        
        /* Classification Styles */
        .classification-group {
            display: flex;
            margin-bottom: 20px;
            background-color: var(--light);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .classification-item {
            flex: 1;
            text-align: center;
            padding: 12px 0;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            position: relative;
        }
        
        .classification-item.active {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .classification-item:not(.active):hover {
            background-color: #e2e6ea;
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
        
        /* Profile Card Styles */

        
        .profile-card {
            background: linear-gradient(135deg, var(--primary) 0%, #2c82c9 100%);
            color: var(--white);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
        }
        
        .profile-img-container {
            position: relative;
            margin-right: 20px;
        }
        
        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid var(--white);
            object-fit: cover;
        }
        
        .profile-status {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 20px;
            height: 20px;
            background-color: var(--success);
            border-radius: 50%;
            border: 2px solid var(--white);
        }
        
        .profile-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .profile-username {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 10px;
        }
        
        .stats-box {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .stats-box:hover {
            background-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-5px);
        }
        
        .stats-title {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 5px;
        }
        
        .stats-value {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }
        
        /* Institution Card Styles */
        .institution-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .institution-title:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--secondary);
            bottom: 0;
            left: 0;
        }
        
        .institution-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 10px;
            background-color: var(--white);
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .institution-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }
        
        .institution-icon {
            background-color: #e6f2ff;
            color: var(--primary);
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-right: 15px;
            font-size: 20px;
        }
        
        .institution-name {
            font-size: 15px;
            font-weight: 500;
            flex-grow: 1;
            color: var(--dark);
        }
        
        .institution-count {
            background-color: var(--secondary);
            color: var(--dark);
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
        }
        
        /* Success Stories Styles */
        .story-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid var(--success);
            transition: all 0.3s ease;
        }
        
        .story-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .story-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 16px;
        }
        
        .story-desc {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .story-date {
            color: var(--secondary);
            font-size: 12px;
            font-weight: 500;
        }
        
        /* Badge Styles */
        .badge-primary {
            background-color: var(--primary);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .badge-secondary {
            background-color: var(--secondary);
            color: var(--dark);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
        }
        
        /* Help Icon Styles */
        .help-icon {
            display: inline-flex;
            width: 20px;
            height: 20px;
            background-color: var(--secondary);
            color: var(--dark);
            font-size: 12px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            margin-left: 8px;
            cursor: pointer;
        }
        
        /* File Upload Styles */
        .file-upload {
            position: relative;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            background-color: var(--light);
            border-radius: 10px;
            cursor: pointer;
        }
        
        .file-upload-icon {
            color: var(--primary);
            font-size: 20px;
            margin-right: 10px;
        }
        
        .file-upload-text {
            color: var(--gray);
            font-size: 14px;
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        /* Comment Section Styles */
        .comment-section {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .comment-item {
            padding: 10px;
            border-radius: 8px;
            background-color: #f8f9fa;
            margin-bottom: 10px;
        }
        
        .comment-content {
            flex: 1;
        }

        /* Tanggapan Section Styles */
.tanggapan-section {
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.tanggapan-item {
    padding: 15px;
    border-radius: 8px;
    background-color: #f8f9fa;
    border-left: 3px solid var(--accent);
}

.btn-tanggapan.btn-info {
    background-color: var(--accent);
    border-color: var(--accent);
    color: var(--white);
}

.btn-tanggapan.btn-outline-info {
    color: var(--accent);
    border-color: var(--accent);
}

.btn-tanggapan.btn-outline-info:hover {
    background-color: var(--accent);
    color: var(--white);
}

.card-header.bg-info {
    background-color: var(--accent) !important;
}

/* Admin badge style */
.badge.bg-primary {
    background-color: var(--primary) !important;
    font-size: 0.75rem;
    padding: 0.35em 0.65em;
    font-weight: 600;
}

/* Image attachment style */
.tanggapan-item .attachment-thumbnail img {
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    box-shadow: 0 2px 4px rgba(0,0,0,.05);
    transition: transform 0.2s ease;
}

.tanggapan-item .attachment-thumbnail img:hover {
    transform: scale(1.02);
}
        
        /* Social Share Styles */
        .social-share-btns a {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .main-content {
                padding: 20px 0;
            }
            
            .profile-container {
                position: static;
            }
            
            .classification-item {
                font-size: 14px;
                padding: 10px 5px;
            }
        }
    </style>
</head>
<body>
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
            <div class="d-flex align-items-center">
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
        <h2 class="page-title">Layanan dan Pengaduan Online Rakyat</h2>
        
        <div class="row">
            <!-- Form Area -->
            <div class="col-lg-7">
                <div class="custom-card">
                    <div class="card-header d-flex align-items-center">
                        <i class="bi bi-megaphone me-2"></i>
                        <span>Sampaikan Laporan Anda</span>
                    </div>
                    <div class="card-body">
                        <!-- Guidance -->
                        <div class="d-flex align-items-center mb-4 p-3 rounded-3" style="background-color: #e7f3ff; border-left: 4px solid var(--accent);">
                            <i class="bi bi-info-circle text-primary me-2"></i>
                            <small>Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar</small>
                            <span class="help-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk melihat panduan">?</span>
                        </div>

                        <!-- Alert for errors -->
                        @if(session('error'))
                            <div class="alert alert-danger mb-4">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Form -->
                        <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Laporan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="judul" name="judul_pengaduan" placeholder="Contoh: Jalan Rusak di Sekupang" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Isi Laporan <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Jelaskan detail permasalahan atau aspirasi Anda" required></textarea>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tanggal" class="form-label">Tanggal Kejadian <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal_kejadian" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lokasi" class="form-label">Lokasi Kejadian <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Contoh: Sekupang" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="kategori" class="form-label">Kategori Laporan <span class="text-danger">*</span></label>
                                    <select class="form-select" id="kategori" name="id_kategori" required>
                                        <option value="" selected disabled>Pilih kategori</option>
                                        @foreach($kategori as $kat)
                                            <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Lampiran (Opsional)</label>
                                <div class="file-upload">
                                    <i class="bi bi-paperclip file-upload-icon"></i>
                                    <span class="file-upload-text">Pilih file untuk dilampirkan</span>
                                    <input type="file" name="lampiran">
                                </div>
                                <small class="text-muted mt-1 d-block">Ukuran maksimal file 2MB (JPG, PNG, PDF)</small>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                </div>
                                
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="bi bi-send me-1"></i> LAPOR!
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Add complaint list immediately below the form with minimal gap -->
                <div class="custom-card mt-3">
                    <div class="card-body p-0">
                        <!-- Tabs for filtering complaints -->
                        <ul class="nav nav-tabs border-bottom-0 px-3 pt-3" id="pengaduanTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab" aria-controls="semua" aria-selected="true">Semua</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="laporan-saya-tab" data-bs-toggle="tab" data-bs-target="#laporan-saya" type="button" role="tab" aria-controls="laporan-saya" aria-selected="false">Laporan Saya</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="terhangat-tab" data-bs-toggle="tab" data-bs-target="#terhangat" type="button" role="tab" aria-controls="terhangat" aria-selected="false">Terhangat</button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content border-top" id="pengaduanTabsContent">
                            <!-- All complaints tab -->
                            <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
                                @php
                                    // Filter out pending complaints
                                    $filteredPengaduanList = $pengaduanList->filter(function($item) {
                                        return $item->status != 'Pending';
                                    });
                                @endphp
                                
                                @forelse($filteredPengaduanList as $pengaduan)
                                    <div class="pengaduan-item border-bottom p-3">
                                        <div class="d-flex mb-2">
                                            <!-- User info and date -->
                                            <div class="d-flex align-items-center me-auto">
                                                @if($pengaduan->pengguna && $pengaduan->pengguna->foto_profil)
                                                    <img src="{{ asset('storage/' . $pengaduan->pengguna->foto_profil) }}" alt="User" class="rounded-circle me-2" width="40" height="40">
                                                @else
                                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                                        <i class="bi bi-person-fill text-white"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <span class="fw-medium d-block">
                                                        {{ $pengaduan->pengguna ? $pengaduan->pengguna->nama : 'Anonim' }}
                                                    </span>
                                                    <div class="d-flex align-items-center text-muted small">
                                                        <i class="bi bi-calendar-event me-1"></i>
                                                        <span>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M, H:i') }}</span>
                                                        @if($pengaduan->lokasi)
                                                            <i class="bi bi-geo-alt ms-2 me-1"></i>
                                                            <span>{{ $pengaduan->lokasi }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Status badge -->
                                            <div>
                                                @php
                                                    $statusClass = [
                                                        'Pending' => 'bg-warning',
                                                        'Diverifikasi' => 'bg-info',
                                                        'Diproses' => 'bg-primary',
                                                        'Selesai' => 'bg-success',
                                                        'Ditolak' => 'bg-danger'
                                                    ][$pengaduan->status] ?? 'bg-secondary';
                                                @endphp
                                                <span class="badge {{ $statusClass }} rounded-pill">
                                                    {{ $pengaduan->status }}
                                                </span>
                                                <div class="text-muted small text-end mt-1">
                                                    {{ \Carbon\Carbon::parse($pengaduan->created_at)->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Rest of the complaint display code remains the same -->
                                        <!-- Assigned division/institution -->
                                        @php
                                            $pengaduanInstansi = \App\Models\Pengaduan_Instansi::with('instansi')
                                                ->where('id_pengaduan', $pengaduan->id_pengaduan)
                                                ->first();
                                        @endphp
                                        @if($pengaduanInstansi && $pengaduanInstansi->instansi)
                                            <div class="mb-2">
                                                <span class="badge bg-light text-dark border">
                                                    <i class="bi bi-building me-1"></i> {{ $pengaduanInstansi->instansi->nama_instansi }}
                                                </span>
                                                @if($pengaduan->kategori)
                                                    <span class="badge bg-light text-dark border ms-1">
                                                    <i class="bi bi-tag me-1"></i> {{ $pengaduan->kategori->nama_kategori }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endif
                                        
                                        <!-- Complaint title and text -->
                                        <h5 class="mt-2 mb-2">{{ $pengaduan->judul_pengaduan }}</h5>
                                        <p class="mb-2">{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 200) }}</p>
                                        
                                        <!-- Attachment thumbnail if exists -->
                                        @if($pengaduan->lampiran)
                                            <div class="attachment-thumbnail mb-3">
                                                @php
                                                    $extension = pathinfo($pengaduan->lampiran, PATHINFO_EXTENSION);
                                                    $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                                                @endphp
                                                
                                                @if($isImage)
                                                    <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="d-inline-block border rounded p-1">
                                                        <img src="{{ asset('storage/' . $pengaduan->lampiran) }}" alt="Lampiran" class="img-thumbnail" style="max-height: 100px;">
                                                    </a>
                                                @else
                                                    <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="btn btn-sm btn-light border">
                                                        <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran
                                                    </a>
                                                @endif
                                            </div>
                                        @endif
                                        
                                        <!-- Action buttons -->
                                        <div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        @if($pengaduan->status != 'Ditolak')
            <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-comment" data-id="{{ $pengaduan->id_pengaduan }}">
                <i class="bi bi-chat-dots me-1"></i> Komentar
                @php
                    $commentCount = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                @endphp
                <span class="ms-1 comment-count">{{ $commentCount }}</span>
            </a>
            
            <!-- Support/Like Button -->
            @php
                $isSupported = false;
                $supportCount = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                
                if (Auth::check()) {
                    $isSupported = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)
                        ->where('id_pengguna', Auth::id())
                        ->exists();
                }
            @endphp
            
            <a href="#" class="btn btn-sm {{ $isSupported ? 'btn-success' : 'btn-outline-success' }} me-2 btn-support" data-id="{{ $pengaduan->id_pengaduan }}">
                <i class="bi bi-hand-thumbs-up me-1"></i> Dukung
                <span class="ms-1 support-count">{{ $supportCount }}</span>
            </a>
        @endif
        
        <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-tanggapan" data-id="{{ $pengaduan->id_pengaduan }}">
            <i class="bi bi-file-earmark-text me-1"></i> Tanggapan
            @php
                    $tanggapanCount = \App\Models\tanggapan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                @endphp
                <span class="ms-1 tanggapan-count">{{ $tanggapanCount }}</span>
        </a>
        
        <!-- Share Button -->
        <a href="#" class="btn btn-sm btn-outline-secondary btn-share" 
           data-id="{{ $pengaduan->id_pengaduan }}"
           data-title="{{ $pengaduan->judul_pengaduan }}"
           data-text="{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 100) }}">
            <i class="bi bi-share me-1"></i> Bagikan
        </a>
    </div>
</div>
                                        
                                        <!-- Comment Section -->
                                        <div id="comment-section-{{ $pengaduan->id_pengaduan }}" class="comment-section mt-3" style="display: none;">
                                            <div class="card">
                                                <div class="card-header bg-light">
                                                    <strong><i class="bi bi-chat-dots me-2"></i>Komentar</strong>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Comment Form -->
                                                    @auth
                                                        <form class="comment-form mb-3" data-id="{{ $pengaduan->id_pengaduan }}">
                                                            @csrf
                                                            <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                                                            <div class="d-flex">
                                                                @if(Auth::user()->foto_profil)
                                                                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User" class="rounded-circle me-2" width="32" height="32">
                                                                @else
                                                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                                                        <i class="bi bi-person-fill text-white small"></i>
                                                                    </div>
                                                                @endif
                                                                <div class="flex-grow-1">
                                                                    <textarea name="isi_komentar" class="form-control mb-2" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                                        <i class="bi bi-send me-1"></i> Kirim Komentar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <div class="alert alert-info mb-3">
                                                            <i class="bi bi-info-circle me-2"></i> Silahkan <a href="{{ route('login') }}" class="alert-link">login</a> untuk memberikan komentar
                                                        </div>
                                                    @endauth
                                                
                                                    <!-- Comments List -->
                                                    <div id="comments-list-{{ $pengaduan->id_pengaduan }}" class="comments-list">
                                                        @php
                                                            $comments = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)
                                                                ->with('pengguna')
                                                                ->orderBy('created_at', 'desc')
                                                                ->take(5)
                                                                ->get();
                                                        @endphp
                                                        
                                                        @forelse($comments as $comment)
                                                            <div class="comment-item d-flex mb-3">
                                                                <div class="comment-avatar me-2">
                                                                    @if($comment->pengguna && $comment->pengguna->foto_profil)
                                                                        <img src="{{ asset('storage/' . $comment->pengguna->foto_profil) }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                                                                    @else
                                                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                                            <i class="bi bi-person-fill text-white small"></i>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="comment-content">
                                                                    <div class="d-flex justify-content-between">
                                                                        <strong class="me-2">{{ $comment->pengguna ? $comment->pengguna->nama : 'Anonim' }}</strong>
                                                                        <small class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                                                                    </div>
                                                                    <p class="mb-0">{{ $comment->isi_komentar }}</p>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div class="text-center text-muted py-3">
                                                                <i class="bi bi-chat-square me-1"></i> Belum ada komentar
                                                            </div>
                                                        @endforelse
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tanggapan Section -->
<div id="tanggapan-section-{{ $pengaduan->id_pengaduan }}" class="tanggapan-section mt-3" style="display: none;">
    <div class="card">
        <div class="card-body">
            @php
                $tanggapan = \App\Models\Tanggapan::where('id_pengaduan', $pengaduan->id_pengaduan)
                    ->orderBy('created_at', 'desc')
                    ->get();
            @endphp
            
            @forelse($tanggapan as $t)
                <div class="tanggapan-item mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary">Admin</span>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($t->created_at)->format('d M Y, H:i') }}</small>
                    </div>
                    <p class="mb-2">{{ $t->isi_tanggapan }}</p>
                    
                    @if($t->lampiran)
                        <div class="attachment-thumbnail mt-2">
                            @php
                                $extension = pathinfo($t->lampiran, PATHINFO_EXTENSION);
                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                            @endphp
                            
                            @if($isImage)
                                <a href="{{ asset('storage/' . $t->lampiran) }}" target="_blank" class="d-inline-block">
                                    <img src="{{ asset('storage/' . $t->lampiran) }}" alt="Lampiran Tanggapan" class="img-thumbnail" style="max-height: 150px;">
                                </a>
                            @else
                                <a href="{{ asset('storage/' . $t->lampiran) }}" target="_blank" class="btn btn-sm btn-light border">
                                    <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran Tanggapan
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
                @unless($loop->last)
                    <hr>
                @endunless
            @empty
                <div class="text-center text-muted py-3">
                    <i class="bi bi-file-earmark-x me-1"></i> Belum ada tanggapan dari Admin
                </div>
            @endforelse
        </div>
    </div>
</div>
                                        
                                        <!-- Share Modal -->
                                        <div class="modal fade" id="shareModal-{{ $pengaduan->id_pengaduan }}" tabindex="-1" aria-labelledby="shareModalLabel-{{ $pengaduan->id_pengaduan }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="shareModalLabel-{{ $pengaduan->id_pengaduan }}">Bagikan Laporan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bagikan laporan ini melalui:</p>
                                                        
                                                        <div class="d-flex justify-content-center mb-3">
                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-primary mx-1">
                                                                <i class="bi bi-facebook"></i>
                                                            </a>
                                                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengaduan->judul_pengaduan) }}&url={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-info mx-1">
                                                                <i class="bi bi-twitter-x"></i>
                                                            </a>
                                                            <a href="https://api.whatsapp.com/send?text={{ urlencode($pengaduan->judul_pengaduan . ' - ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-success mx-1">
                                                                <i class="bi bi-whatsapp"></i>
                                                            </a>
                                                            <a href="mailto:?subject={{ urlencode('Laporan: ' . $pengaduan->judul_pengaduan) }}&body={{ urlencode('Lihat laporan ini di ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" class="btn btn-outline-secondary mx-1">
                                                                <i class="bi bi-envelope"></i>
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="input-group">
                                                            <input type="text" class="form-control modal-share-link" readonly value="{{ url('/lapor' . $pengaduan->id_pengaduan) }}">
                                                            <button class="btn btn-outline-primary btn-copy-link" type="button">
                                                                <i class="bi bi-clipboard me-1"></i> Salin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <i class="bi bi-clipboard-x" style="font-size: 3rem; color: var(--light-gray);"></i>
                                        <p class="mt-3 text-muted">Belum ada pengaduan untuk ditampilkan</p>
                                    </div>
                                @endforelse
                                
                                <div class="text-center p-3">
                                    <a href="#" class="btn btn-outline-custom" id="load-more-button">
                                        <i class="bi bi-plus-circle me-1"></i> Lihat Lebih Banyak
                                    </a>
                                </div>
                            </div>
                            <!-- Modification for the "My complaints" tab - Filter out Pending status -->
<div class="tab-pane fade" id="laporan-saya" role="tabpanel" aria-labelledby="laporan-saya-tab">
    @if(Auth::check())
        @php
            // Filter out pending complaints
            $filteredUserPengaduan = $userPengaduan->filter(function($item) {
                return $item->status != 'Pending';
            });
        @endphp
        
        @forelse($filteredUserPengaduan as $pengaduan)
            <div class="pengaduan-item border-bottom p-3">
                <div class="d-flex mb-2">
                    <!-- User info and date - Ditambahkan profil pengguna -->
                    <div class="d-flex align-items-center me-auto">
                        @if(Auth::user()->foto_profil)
                            <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User" class="rounded-circle me-2" width="40" height="40">
                        @else
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                <i class="bi bi-person-fill text-white"></i>
                            </div>
                        @endif
                        <div>
                            <span class="fw-medium d-block">
                                {{ Auth::user()->nama }}
                            </span>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="bi bi-calendar-event me-1"></i>
                                <span>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M, H:i') }}</span>
                                @if($pengaduan->lokasi)
                                    <i class="bi bi-geo-alt ms-2 me-1"></i>
                                    <span>{{ $pengaduan->lokasi }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Status badge -->
                    <div>
                        @php
                            $statusClass = [
                                'Pending' => 'bg-warning',
                                'Diverifikasi' => 'bg-info',
                                'Diproses' => 'bg-primary',
                                'Selesai' => 'bg-success',
                                'Ditolak' => 'bg-danger'
                            ][$pengaduan->status] ?? 'bg-secondary';
                        @endphp
                        <span class="badge {{ $statusClass }} rounded-pill">
                            {{ $pengaduan->status }}
                        </span>
                        <div class="text-muted small text-end mt-1">
                            {{ \Carbon\Carbon::parse($pengaduan->created_at)->diffForHumans() }}
                        </div>
                    </div>
                </div>
                
                <!-- Rest of the complaint display code remains the same -->
                <!-- Assigned division/institution -->
                @php
                    $pengaduanInstansi = \App\Models\Pengaduan_Instansi::with('instansi')
                        ->where('id_pengaduan', $pengaduan->id_pengaduan)
                        ->first();
                @endphp
                @if($pengaduanInstansi && $pengaduanInstansi->instansi)
                    <div class="mb-2">
                        <span class="badge bg-light text-dark border">
                            <i class="bi bi-building me-1"></i> {{ $pengaduanInstansi->instansi->nama_instansi }}
                        </span>
                        @if($pengaduan->kategori)
                            <span class="badge bg-light text-dark border ms-1">
                                <i class="bi bi-tag me-1"></i> {{ $pengaduan->kategori->nama_kategori }}
                            </span>
                        @endif
                    </div>
                @endif
                
                <!-- Complaint title and text -->
                <h5 class="mt-2 mb-2">{{ $pengaduan->judul_pengaduan }}</h5>
                <p class="mb-2">{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 150) }}</p>
                
                <!-- Attachment thumbnail if exists -->
                @if($pengaduan->lampiran)
                    <div class="attachment-thumbnail mb-3">
                        @php
                            $extension = pathinfo($pengaduan->lampiran, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                        @endphp
                        
                        @if($isImage)
                            <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="d-inline-block border rounded p-1">
                                <img src="{{ asset('storage/' . $pengaduan->lampiran) }}" alt="Lampiran" class="img-thumbnail" style="max-height: 100px;">
                            </a>
                        @else
                            <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="btn btn-sm btn-light border">
                                <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran
                            </a>
                        @endif
                    </div>
                @endif
                
                <!-- Action buttons -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-comment" data-id="{{ $pengaduan->id_pengaduan }}">
                            <i class="bi bi-chat-dots me-1"></i> Komentar
                            @php
                                $commentCount = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                            @endphp
                            <span class="ms-1 comment-count">{{ $commentCount }}</span>
                        </a>
                        
                        <!-- Support/Like Button -->
                        @php
                            $isSupported = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)
                                ->where('id_pengguna', Auth::id())
                                ->exists();
                            $supportCount = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                        @endphp
                        
                        <a href="#" class="btn btn-sm {{ $isSupported ? 'btn-success' : 'btn-outline-success' }} me-2 btn-support" data-id="{{ $pengaduan->id_pengaduan }}">
                            <i class="bi bi-hand-thumbs-up me-1"></i> Dukung
                            <span class="ms-1 support-count">{{ $supportCount }}</span>
                        </a>
                        
                        <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-tanggapan" data-id="{{ $pengaduan->id_pengaduan }}">
                            <i class="bi bi-file-earmark-text me-1"></i> Tanggapan
                                 @php
                                $tanggapanCount = \App\Models\tanggapan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                                @endphp
                             <span class="ms-1 tanggapan-count">{{ $tanggapanCount }}</span>
                        </a>
        

                        <a href="#" class="btn btn-sm btn-outline-secondary btn-share" 
                           data-id="{{ $pengaduan->id_pengaduan }}"
                           data-title="{{ $pengaduan->judul_pengaduan }}"
                           data-text="{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 100) }}">
                            <i class="bi bi-share me-1"></i> Bagikan
                        </a>
                    </div>
                </div>
                
                <!-- Comment Section - Same as in "All" tab -->
                <div id="comment-section-{{ $pengaduan->id_pengaduan }}" class="comment-section mt-3" style="display: none;">
                    <div class="card">
                        <div class="card-header bg-light">
                            <strong><i class="bi bi-chat-dots me-2"></i>Komentar</strong>
                        </div>
                        <div class="card-body">
                            <!-- Comment Form -->
                            <form class="comment-form mb-3" data-id="{{ $pengaduan->id_pengaduan }}">
                                @csrf
                                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                                <div class="d-flex">
                                    @if(Auth::user()->foto_profil)
                                        <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User" class="rounded-circle me-2" width="32" height="32">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            <i class="bi bi-person-fill text-white small"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <textarea name="isi_komentar" class="form-control mb-2" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-send me-1"></i> Kirim Komentar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        
                            <!-- Comments List -->
                            <div id="comments-list-{{ $pengaduan->id_pengaduan }}" class="comments-list">
                                @php
                                    $comments = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)
                                        ->with('pengguna')
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();
                                @endphp
                                
                                @forelse($comments as $comment)
                                    <div class="comment-item d-flex mb-3">
                                        <div class="comment-avatar me-2">
                                            @if($comment->pengguna && $comment->pengguna->foto_profil)
                                                <img src="{{ asset('storage/' . $comment->pengguna->foto_profil) }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                                            @else
                                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                    <i class="bi bi-person-fill text-white small"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="comment-content">
                                            <div class="d-flex justify-content-between">
                                                <strong class="me-2">{{ $comment->pengguna ? $comment->pengguna->nama : 'Anonim' }}</strong>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                                            </div>
                                            <p class="mb-0">{{ $comment->isi_komentar }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center text-muted py-3">
                                        <i class="bi bi-chat-square me-1"></i> Belum ada komentar
                                    </div>
                                @endforelse
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Share Modal - Same as in "All" tab -->
                <div class="modal fade" id="shareModal-{{ $pengaduan->id_pengaduan }}" tabindex="-1" aria-labelledby="shareModalLabel-{{ $pengaduan->id_pengaduan }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="shareModalLabel-{{ $pengaduan->id_pengaduan }}">Bagikan Laporan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bagikan laporan ini melalui:</p>
                                
                                <div class="d-flex justify-content-center mb-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-primary mx-1">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengaduan->judul_pengaduan) }}&url={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-info mx-1">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($pengaduan->judul_pengaduan . ' - ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-success mx-1">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                    <a href="mailto:?subject={{ urlencode('Laporan: ' . $pengaduan->judul_pengaduan) }}&body={{ urlencode('Lihat laporan ini di ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" class="btn btn-outline-secondary mx-1">
                                        <i class="bi bi-envelope"></i>
                                    </a>
                                </div>
                                
                                <div class="input-group">
                                    <input type="text" class="form-control modal-share-link" readonly value="{{ url('/pengaduan/' . $pengaduan->id_pengaduan) }}">
                                    <button class="btn btn-outline-primary btn-copy-link" type="button">
                                        <i class="bi bi-clipboard me-1"></i> Salin
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                 <i class="bi bi-clipboard-x" style="font-size: 3rem; color: var(--light-gray);"></i>
                <p class="mt-3 text-muted">Anda belum memiliki pengaduan yang diproses</p>
                <a href="#form-pengaduan" class="btn btn-primary-custom mt-2">
                    <i class="bi bi-plus-circle me-1"></i> Buat Pengaduan
                </a>
            </div>
        @endforelse
    @else
        <div class="text-center py-5">
            <i class="bi bi-shield-lock" style="font-size: 3rem; color: var(--light-gray);"></i>
            <p class="mt-3 text-muted">Silahkan login untuk melihat laporan Anda</p>
            <a href="{{ route('login') }}" class="btn btn-primary-custom mt-2">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
        </div>
    @endif
</div>

<!-- Modification for the "Trending" tab - Filter out Pending status -->
<div class="tab-pane fade" id="terhangat" role="tabpanel" aria-labelledby="terhangat-tab">
    @php
        // Filter out pending complaints from trending ones
        $filteredTrendingPengaduan = collect($trendingPengaduan)->filter(function($item) {
            return $item->status != 'Pending';
        });
    @endphp
    
    @forelse($filteredTrendingPengaduan as $pengaduan)
        @php
            // Convert DB item to model instance for easier relationship handling
            $pengaduanModel = new \App\Models\Pengaduan((array)$pengaduan);
            $pengaduanModel->id_pengaduan = $pengaduan->id_pengaduan;
            
            // Get pengaduan info
            $pengguna = \App\Models\Pengguna::find($pengaduan->id_pengguna);
            $kategori = \App\Models\Kategori::find($pengaduan->id_kategori);
        @endphp
        
        <div class="pengaduan-item border-bottom p-3">
            <div class="d-flex mb-2">
                <!-- User info and date -->
                <div class="d-flex align-items-center me-auto">
                    @if($pengguna && $pengguna->foto_profil)
                        <img src="{{ asset('storage/' . $pengguna->foto_profil) }}" alt="User" class="rounded-circle me-2" width="40" height="40">
                    @else
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                            <i class="bi bi-person-fill text-white"></i>
                        </div>
                    @endif
                    <div>
                        <span class="fw-medium d-block">
                            {{ $pengguna ? $pengguna->nama : 'Anonim' }}
                        </span>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-calendar-event me-1"></i>
                            <span>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M, H:i') }}</span>
                            @if($pengaduan->lokasi)
                                <i class="bi bi-geo-alt ms-2 me-1"></i>
                                <span>{{ $pengaduan->lokasi }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Comment count -->
                <div>
                    <div class="text-muted small text-end mt-1">
                        {{ \Carbon\Carbon::parse($pengaduan->created_at)->diffForHumans() }}
                    </div>
                </div>
            </div>
            
            <!-- Complaint title and text -->
            <h5 class="mt-2 mb-2">{{ $pengaduan->judul_pengaduan }}</h5>
            <p class="mb-2">{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 200) }}</p>
            
            <!-- Action buttons -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-comment" data-id="{{ $pengaduan->id_pengaduan }}">
                                                        <i class="bi bi-chat-dots me-1"></i> Komentar
                                                        @php
                                                            $commentCount = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                                                        @endphp
                           <span class="ms-1 comment-count">{{ $commentCount }}</span>
                        </a>

                        
                    
                    <!-- Support/Like Button -->
                    @php
                        $isSupported = false;
                        $supportCount = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                        
                        if (Auth::check()) {
                            $isSupported = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)
                                ->where('id_pengguna', Auth::id())
                                ->exists();
                        }
                    @endphp
                    
                    <a href="#" class="btn btn-sm {{ $isSupported ? 'btn-success' : 'btn-outline-success' }} me-2 btn-support" data-id="{{ $pengaduan->id_pengaduan }}">
                        <i class="bi bi-hand-thumbs-up me-1"></i> Dukung
                        <span class="ms-1 support-count">{{ $supportCount }}</span>
                    </a>
                    
                    <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-tanggapan" data-id="{{ $pengaduan->id_pengaduan }}">
            <i class="bi bi-file-earmark-text me-1"></i> Tanggapan
            @php
                    $tanggapanCount = \App\Models\tanggapan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                @endphp
                <span class="ms-1 tanggapan-count">{{ $tanggapanCount }}</span>
        </a>
        

                    <!-- Share Button -->
                    <a href="#" class="btn btn-sm btn-outline-secondary btn-share" 
                       data-id="{{ $pengaduan->id_pengaduan }}"
                       data-title="{{ $pengaduan->judul_pengaduan }}"
                       data-text="{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 100) }}">
                        <i class="bi bi-share me-1"></i> Bagikan
                    </a>
                </div>
            </div>
            
            <!-- Comment Section - Same as in other tabs -->
            <div id="comment-section-{{ $pengaduan->id_pengaduan }}" class="comment-section mt-3" style="display: none;">
                <div class="card">
                    <div class="card-header bg-light">
                        <strong><i class="bi bi-chat-dots me-2"></i>Komentar</strong>
                    </div>
                    <div class="card-body">
                        <!-- Comment Form -->
                        @auth
                            <form class="comment-form mb-3" data-id="{{ $pengaduan->id_pengaduan }}">
                                @csrf
                                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                                <div class="d-flex">
                                    @if(Auth::user()->foto_profil)
                                        <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User" class="rounded-circle me-2" width="32" height="32">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            <i class="bi bi-person-fill text-white small"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <textarea name="isi_komentar" class="form-control mb-2" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-send me-1"></i> Kirim Komentar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-info mb-3">
                                <i class="bi bi-info-circle me-2"></i> Silahkan <a href="{{ route('login') }}" class="alert-link">login</a> untuk memberikan komentar
                            </div>
                        @endauth
                    
                        <!-- Comments List -->
                        <div id="comments-list-{{ $pengaduan->id_pengaduan }}" class="comments-list">
                            @php
                                $comments = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)
                                    ->with('pengguna')
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();
                            @endphp
                            
                            @forelse($comments as $comment)
                                <div class="comment-item d-flex mb-3">
                                    <div class="comment-avatar me-2">
                                        @if($comment->pengguna && $comment->pengguna->foto_profil)
                                            <img src="{{ asset('storage/' . $comment->pengguna->foto_profil) }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                                        @else
                                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                <i class="bi bi-person-fill text-white small"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="comment-content">
                                        <div class="d-flex justify-content-between">
                                            <strong class="me-2">{{ $comment->pengguna ? $comment->pengguna->nama : 'Anonim' }}</strong>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-0">{{ $comment->isi_komentar }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-muted py-3">
                                    <i class="bi bi-chat-square me-1"></i> Belum ada komentar
                                </div>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Share Modal - Same as in other tabs -->
            <div class="modal fade" id="shareModal-{{ $pengaduan->id_pengaduan }}" tabindex="-1" aria-labelledby="shareModalLabel-{{ $pengaduan->id_pengaduan }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="shareModalLabel-{{ $pengaduan->id_pengaduan }}">Bagikan Laporan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Bagikan laporan ini melalui:</p>
                            
                            <div class="d-flex justify-content-center mb-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-primary mx-1">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengaduan->judul_pengaduan) }}&url={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-info mx-1">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($pengaduan->judul_pengaduan . ' - ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-success mx-1">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                <a href="mailto:?subject={{ urlencode('Laporan: ' . $pengaduan->judul_pengaduan) }}&body={{ urlencode('Lihat laporan ini di ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" class="btn btn-outline-secondary mx-1">
                                    <i class="bi bi-envelope"></i>
                                </a>
                            </div>
                            
                            <div class="input-group">
                                <input type="text" class="form-control modal-share-link" readonly value="{{ url('/pengaduan/' . $pengaduan->id_pengaduan) }}">
                                <button class="btn btn-outline-primary btn-copy-link" type="button">
                                    <i class="bi bi-clipboard me-1"></i> Salin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <i class="bi bi-fire" style="font-size: 3rem; color: var(--light-gray);"></i>
            <p class="mt-3 text-muted">Belum ada pengaduan terhangat</p>
        </div>
    @endforelse
</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Profile & Stats Area -->
                <div class="col-lg-5">
                    <div class="profile-container">
                        <!-- Profile Card -->
                        <div class="profile-card">
                            <div class="d-flex mb-4">
                                <div class="profile-img-container">
                                    @auth
                                        @if(Auth::user()->foto_profil)
                                            <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Profile" class="profile-img">
                                        @else
                                            <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="profile-img">
                                        @endif
                                        <div class="profile-status"></div>
                                    @else
                                        <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="profile-img">
                                        <div class="profile-status"></div>
                                    @endauth
                                </div>
                                <div>
                                    @auth
                                        <h5 class="profile-name">{{ Auth::user()->nama }}</h5>
                                        <p class="profile-username mb-2"><i class="bi bi-person-check me-1"></i> {{ '@' . strtolower(explode('@', Auth::user()->email)[0]) }}</p>
                                        <a href="{{ route('profile.edit') }}" class="badge badge-secondary text-decoration-none">
                                            <i class="bi bi-pencil me-1"></i> Edit Profil
                                        </a>
                                    @else
                                        <h5 class="profile-name">Tamu</h5>
                                        <p class="profile-username mb-2">Silahkan login untuk mengakses fitur lengkap</p>
                                        <a href="{{ route('login') }}" class="badge badge-secondary text-decoration-none">
                                            <i class="bi bi-box-arrow-in-right me-1"></i> LOGIN
                                        </a>
                                    @endauth
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="stats-box">
                                        <p class="stats-title">Terverifikasi</p>
                                        <h3 class="stats-value">{{ $userStats['terverifikasi'] }}</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stats-box">
                                        <p class="stats-title">Diproses</p>
                                        <h3 class="stats-value">{{ $userStats['diproses'] }}</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stats-box">
                                        <p class="stats-title">Selesai</p>
                                        <h3 class="stats-value">{{ $userStats['selesai'] }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Institutions Card -->
                        <div class="custom-card">
                            <div class="card-body">
                                <h5 class="institution-title">Instansi Terhangat</h5>
                                
                                @forelse($instansiTerhangat as $inst)
                                    <div class="institution-item">
                                        <div class="institution-icon">
                                            <i class="bi bi-building"></i>
                                        </div>
                                        <div class="institution-name">
                                            {{ $inst->nama_instansi }}
                                        </div>
                                        <div class="institution-count">
                                            {{ $inst->total > 1000 ? round($inst->total/1000, 1) . 'k' : $inst->total }}
                                        </div>
                                    </div>
                                @empty
                                    <div class="institution-item">
                                        <div class="institution-icon">
                                            <i class="bi bi-building"></i>
                                        </div>
                                        <div class="institution-name">
                                            Kepolisian Negara Republik Indonesia
                                        </div>
                                        <div class="institution-count">
                                            0
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        
                        <!-- Success Stories Card -->
                        <div class="custom-card">
                            <div class="card-body">
                                <h5 class="institution-title">Kisah Sukses</h5>
                                
                                @php
                                    $successStories = \App\Models\Pengaduan::where('status', 'Selesai')
                                        ->orderBy('updated_at', 'desc')
                                        ->limit(3)
                                        ->get();
                                @endphp
                                
                                @forelse($successStories as $story)
                                    <div class="story-card">
                                        <h6 class="story-title">{{ $story->judul_pengaduan }}</h6>
                                        <p class="story-desc">{{ \Illuminate\Support\Str::limit($story->deskripsi, 100) }}</p>
                                        <span class="story-date"><i class="bi bi-calendar3 me-1"></i> {{ $story->updated_at->format('d M Y') }}</span>
                                    </div>
                                @empty
                                    <div class="alert alert-info">
                                        <i class="bi bi-info-circle me-2"></i> Belum ada kisah sukses untuk ditampilkan.
                                    </div>
                                @endforelse
                            </div>
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
                    <p class="mb-0 small">Email Repotly@gmail.com</p>
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
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript for Comments, Support and Share -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.getElementById('load-more-button');
    let page = 1;
    
    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Tambahkan indikator loading
            loadMoreButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memuat...';
            loadMoreButton.disabled = true;
            
            // Ambil data pengaduan berikutnya
            fetch(`/load-more-complaints?page=${++page}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                // Pastikan ada pengaduan yang dikembalikan
                if (data.complaints && data.complaints.length > 0) {
                    const container = document.getElementById('semua');
                    
                    // Loop semua pengaduan yang diterima
                    data.complaints.forEach(complaint => {
                        // Generate HTML untuk setiap pengaduan
                        const complaintHTML = createComplaintHTML(complaint);
                        
                        // Masukkan HTML sebelum elemen tombol "Lihat Lebih Banyak"
                        const buttonContainer = loadMoreButton.closest('.text-center');
                        container.insertBefore(complaintHTML, buttonContainer);
                        
                        // Aktifkan fungsionalitas pada elemen baru
                        activateComplaintFunctions(complaintHTML);
                    });
                    
                    // Sembunyikan tombol jika tidak ada lagi pengaduan
                    if (!data.has_more) {
                        loadMoreButton.closest('.text-center').style.display = 'none';
                    }
                } else {
                    // Tidak ada pengaduan lagi, sembunyikan tombol
                    loadMoreButton.closest('.text-center').style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error loading more complaints:', error);
            })
            .finally(() => {
                // Kembalikan tombol ke kondisi normal
                loadMoreButton.innerHTML = '<i class="bi bi-plus-circle me-1"></i> Lihat Lebih Banyak';
                loadMoreButton.disabled = false;
            });
        });
    }
    
    // Fungsi untuk membuat elemen DOM pengaduan baru
    function createComplaintHTML(complaint) {
        // Tentukan kelas status
        let statusClass = 'bg-secondary';
        if (complaint.status === 'Diverifikasi') statusClass = 'bg-info';
        else if (complaint.status === 'Diproses') statusClass = 'bg-primary';
        else if (complaint.status === 'Selesai') statusClass = 'bg-success';
        else if (complaint.status === 'Ditolak') statusClass = 'bg-danger';
        
        // Buat elemen div untuk pengaduan
        const pengaduanItem = document.createElement('div');
        pengaduanItem.className = 'pengaduan-item border-bottom p-3';
        
        // Tentukan gambar profil
        let profileImg = `
            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                <i class="bi bi-person-fill text-white"></i>
            </div>
        `;
        
        if (complaint.user_photo) {
            profileImg = `<img src="${complaint.user_photo}" alt="User" class="rounded-circle me-2" width="40" height="40">`;
        }
        
        // Isi HTML pengaduan
        pengaduanItem.innerHTML = `
            <div class="d-flex mb-2">
                <!-- User info and date -->
                <div class="d-flex align-items-center me-auto">
                    ${profileImg}
                    <div>
                        <span class="fw-medium d-block">
                            ${complaint.user_name}
                        </span>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-calendar-event me-1"></i>
                            <span>${complaint.created_at_formatted}</span>
                            ${complaint.lokasi ? `
                                <i class="bi bi-geo-alt ms-2 me-1"></i>
                                <span>${complaint.lokasi}</span>
                            ` : ''}
                        </div>
                    </div>
                </div>
                <!-- Status badge -->
                <div>
                    <span class="badge ${statusClass} rounded-pill">
                        ${complaint.status}
                    </span>
                    <div class="text-muted small text-end mt-1">
                        ${complaint.created_at_human}
                    </div>
                </div>
            </div>
            
            <!-- Complaint title and text -->
            <h5 class="mt-2 mb-2">${complaint.judul_pengaduan}</h5>
            <p class="mb-2">${complaint.deskripsi.length > 200 ? complaint.deskripsi.substring(0, 200) + '...' : complaint.deskripsi}</p>
            
            <!-- Action buttons -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-comment" data-id="${complaint.id_pengaduan}">
                        <i class="bi bi-chat-dots me-1"></i> Komentar
                        <span class="ms-1 comment-count">0</span>
                    </a>
                    
                    <a href="#" class="btn btn-sm btn-outline-success me-2 btn-support" data-id="${complaint.id_pengaduan}">
                        <i class="bi bi-hand-thumbs-up me-1"></i> Dukung
                        <span class="ms-1 support-count">0</span>
                    </a>
                    
                    <a href="#" class="btn btn-sm btn-outline-info me-2 btn-tanggapan" data-id="${complaint.id_pengaduan}">
                        <i class="bi bi-file-earmark-text me-1"></i> Tanggapan
                    </a>

                    <a href="#" class="btn btn-sm btn-outline-secondary btn-share" 
                       data-id="${complaint.id_pengaduan}"
                       data-title="${complaint.judul_pengaduan}"
                       data-text="${complaint.deskripsi.substring(0, 100)}...">
                        <i class="bi bi-share me-1"></i> Bagikan
                    </a>
                </div>
            </div>
            
            <!-- Comment Section -->
            <div id="comment-section-${complaint.id_pengaduan}" class="comment-section mt-3" style="display: none;">
                <div class="card">
                    <div class="card-header bg-light">
                        <strong><i class="bi bi-chat-dots me-2"></i>Komentar</strong>
                    </div>
                    <div class="card-body">
                        <!-- Comment Form -->
                        <form class="comment-form mb-3" data-id="${complaint.id_pengaduan}">
                            <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                            <input type="hidden" name="id_pengaduan" value="${complaint.id_pengaduan}">
                            <div class="d-flex">
                                <div id="user-profile-pic" class="me-2">
                                    <!-- Akan diisi gambar profil pengguna melalui JavaScript -->
                                </div>
                                <div class="flex-grow-1">
                                    <textarea name="isi_komentar" class="form-control mb-2" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="bi bi-send me-1"></i> Kirim Komentar
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Comments List -->
                        <div id="comments-list-${complaint.id_pengaduan}" class="comments-list">
                            <div class="text-center text-muted py-3">
                                <i class="bi bi-chat-square me-1"></i> Belum ada komentar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<!-- Tanggapan Section -->
<div id="tanggapan-section-${complaint.id_pengaduan}" class="tanggapan-section mt-3" style="display: none;">
    <div class="card">
        <div class="card-header bg-info text-white">
            <strong><i class="bi bi-file-earmark-text me-2"></i>Tanggapan Admin</strong>
        </div>
        <div class="card-body">
            <div class="text-center py-3 loading-tanggapan">
                <div class="spinner-border spinner-border-sm text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <span class="ms-2">Memuat tanggapan...</span>
            </div>
            <div class="tanggapan-content"></div>
        </div>
    </div>
</div>

            <!-- Share Modal -->
            <div class="modal fade" id="shareModal-${complaint.id_pengaduan}" tabindex="-1" aria-labelledby="shareModalLabel-${complaint.id_pengaduan}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="shareModalLabel-${complaint.id_pengaduan}">Bagikan Laporan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Bagikan laporan ini melalui:</p>
                            
                            <div class="d-flex justify-content-center mb-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.origin + '/pengaduan/' + complaint.id_pengaduan)}" target="_blank" class="btn btn-outline-primary mx-1">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text=${encodeURIComponent(complaint.judul_pengaduan)}&url=${encodeURIComponent(window.location.origin + '/pengaduan/' + complaint.id_pengaduan)}" target="_blank" class="btn btn-outline-info mx-1">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text=${encodeURIComponent(complaint.judul_pengaduan + ' - ' + window.location.origin + '/pengaduan/' + complaint.id_pengaduan)}" target="_blank" class="btn btn-outline-success mx-1">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                <a href="mailto:?subject=${encodeURIComponent('Laporan: ' + complaint.judul_pengaduan)}&body=${encodeURIComponent('Lihat laporan ini di ' + window.location.origin + '/pengaduan/' + complaint.id_pengaduan)}" class="btn btn-outline-secondary mx-1">
                                    <i class="bi bi-envelope"></i>
                                </a>
                            </div>
                            
                            <div class="input-group">
                                <input type="text" class="form-control modal-share-link" readonly value="${window.location.origin + '/pengaduan/' + complaint.id_pengaduan}">
                                <button class="btn btn-outline-primary btn-copy-link" type="button">
                                    <i class="bi bi-clipboard me-1"></i> Salin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        return pengaduanItem;
    }
    
    // Fungsi untuk mengaktifkan fungsi-fungsi untuk elemen pengaduan baru
    function activateComplaintFunctions(pengaduanElement) {
        // Tambahkan foto profil pengguna yang sedang login ke form komentar
        const userProfilePicContainer = pengaduanElement.querySelector('#user-profile-pic');
        if (userProfilePicContainer) {
            // Cek apakah ada elemen foto profil di header (untuk user yang login)
            const userProfileInHeader = document.querySelector('.dropdown-toggle img.rounded-circle');
            
            if (userProfileInHeader) {
                // Pengguna sudah login dan punya foto profil di header
                const userProfileSrc = userProfileInHeader.getAttribute('src');
                userProfilePicContainer.innerHTML = `<img src="${userProfileSrc}" alt="User" class="rounded-circle" width="32" height="32">`;
            } else {
                // Pengguna belum login atau tidak ada foto
                userProfilePicContainer.innerHTML = `
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="bi bi-person-fill text-white small"></i>
                    </div>
                `;
            }
        }
        // Aktifkan tombol komentar
        const commentBtn = pengaduanElement.querySelector('.btn-comment');
        if (commentBtn) {
            commentBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const pengaduanId = this.getAttribute('data-id');
                const commentSection = document.getElementById('comment-section-' + pengaduanId);
                
                if (commentSection.style.display === 'none' || commentSection.style.display === '') {
                    commentSection.style.display = 'block';
                } else {
                    commentSection.style.display = 'none';
                }
            });
        }
        
        // Aktifkan form komentar
        const commentForm = pengaduanElement.querySelector('.comment-form');
        if (commentForm) {
            commentForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const pengaduanId = this.getAttribute('data-id');
                const commentInput = this.querySelector('textarea[name="isi_komentar"]');
                const commentText = commentInput.value.trim();
                
                if (commentText) {
                    // Dapatkan form data
                    const formData = new FormData(this);
                    
                    // Kirim request AJAX untuk submit komentar
                    fetch('/komentar', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: formData,
                        credentials: 'same-origin'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Kosongkan input
                            commentInput.value = '';
                            
                            // Tambahkan komentar baru ke list
                            const commentsList = document.getElementById('comments-list-' + pengaduanId);
                            commentsList.innerHTML = ''; // Clear "no comments" message if exists
                            
                            // Buat elemen komentar
                            const commentDiv = document.createElement('div');
                            commentDiv.className = 'comment-item d-flex mb-3';
                            
                            // Avatar HTML
                            let avatarHtml = '';
                            if (data.comment.user.foto_profil) {
                                avatarHtml = `<img src="${data.comment.user.foto_profil}" alt="Avatar" class="rounded-circle" width="32" height="32">`;
                            } else {
                                avatarHtml = `<div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                <i class="bi bi-person-fill text-white small"></i>
                                              </div>`;
                            }
                            
                            commentDiv.innerHTML = `
                                <div class="comment-avatar me-2">
                                    ${avatarHtml}
                                </div>
                                <div class="comment-content">
                                    <div class="d-flex justify-content-between">
                                        <strong class="me-2">${data.comment.user.nama}</strong>
                                        <small class="text-muted">${data.comment.tanggal}</small>
                                    </div>
                                    <p class="mb-0">${data.comment.isi_komentar}</p>
                                </div>
                            `;
                            
                            // Tambahkan komentar ke list
                            commentsList.prepend(commentDiv);
                            
                            // Update counter komentar
                            const commentCountSpan = pengaduanElement.querySelector(`.btn-comment[data-id="${pengaduanId}"] .comment-count`);
                            const currentCount = parseInt(commentCountSpan.textContent);
                            commentCountSpan.textContent = currentCount + 1;
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        }
        
        // Aktifkan tombol dukungan
        const supportBtn = pengaduanElement.querySelector('.btn-support');
        if (supportBtn) {
            supportBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const pengaduanId = this.getAttribute('data-id');
                const counterSpan = this.querySelector('.support-count');
                
                // Kirim request AJAX untuk memberikan dukungan
                fetch('/dukungan/' + pengaduanId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update counter dan style
                        counterSpan.textContent = data.count;
                        if (data.supported) {
                            this.classList.remove('btn-outline-success');
                            this.classList.add('btn-success');
                        } else {
                            this.classList.remove('btn-success');
                            this.classList.add('btn-outline-success');
                        }
                    } else if (data.error === 'unauthenticated') {
                        // Redirect ke halaman login
                        window.location.href = '/login';
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        }
        
       const tanggapanBtn = pengaduanElement.querySelector('.btn-tanggapan');
if (tanggapanBtn) {
    tanggapanBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const pengaduanId = this.getAttribute('data-id');
        const tanggapanSection = document.getElementById('tanggapan-section-' + pengaduanId);
        
        if (tanggapanSection.style.display === 'none' || tanggapanSection.style.display === '') {
            tanggapanSection.style.display = 'block';
            
            // Hide comment section if it's open
            const commentSection = document.getElementById('comment-section-' + pengaduanId);
            if (commentSection && commentSection.style.display === 'block') {
                commentSection.style.display = 'none';
            }
            
            // Load tanggapan content via AJAX
            const tanggapanContent = tanggapanSection.querySelector('.tanggapan-content');
            const loadingIndicator = tanggapanSection.querySelector('.loading-tanggapan');
            
            if (tanggapanContent && tanggapanContent.children.length === 0) {
                // Show loading indicator
                loadingIndicator.style.display = 'block';
                
                // Fetch tanggapan data
                fetch('/get-tanggapan/' + pengaduanId, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Hide loading indicator
                    loadingIndicator.style.display = 'none';
                    
                    if (data.success && data.tanggapan.length > 0) {
                        // Render tanggapan data
                        data.tanggapan.forEach(item => {
                            const tanggapanItem = document.createElement('div');
                            tanggapanItem.className = 'tanggapan-item mb-3';
                            
                            // Check if attachment exists and is an image
                            let attachmentHTML = '';
                            if (item.lampiran) {
                                const extension = item.lampiran.split('.').pop().toLowerCase();
                                const isImage = ['jpg', 'jpeg', 'png', 'gif'].includes(extension);
                                
                                if (isImage) {
                                    attachmentHTML = `
                                        <div class="attachment-thumbnail mt-2">
                                            <a href="/storage/${item.lampiran}" target="_blank" class="d-inline-block">
                                                <img src="/storage/${item.lampiran}" alt="Lampiran Tanggapan" class="img-thumbnail" style="max-height: 150px;">
                                            </a>
                                        </div>
                                    `;
                                } else {
                                    attachmentHTML = `
                                        <div class="attachment-thumbnail mt-2">
                                            <a href="/storage/${item.lampiran}" target="_blank" class="btn btn-sm btn-light border">
                                                <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran Tanggapan
                                            </a>
                                        </div>
                                    `;
                                }
                            }
                            
                            tanggapanItem.innerHTML = `
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-primary">Admin</span>
                                    <small class="text-muted">${item.created_at_formatted}</small>
                                </div>
                                <p class="mb-2">${item.isi_tanggapan}</p>
                                ${attachmentHTML}
                            `;
                            
                            tanggapanContent.appendChild(tanggapanItem);
                            
                            // Add separator except for last item
                            if (data.tanggapan.indexOf(item) < data.tanggapan.length - 1) {
                                const hr = document.createElement('hr');
                                tanggapanContent.appendChild(hr);
                            }
                        });
                    } else {
                        // No tanggapan found
                        tanggapanContent.innerHTML = `
                            <div class="text-center text-muted py-3">
                                <i class="bi bi-file-earmark-x me-1"></i> Belum ada tanggapan dari Admin
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error loading tanggapan:', error);
                    loadingIndicator.style.display = 'none';
                    tanggapanContent.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle me-1"></i> Gagal memuat tanggapan. Silakan coba lagi.
                        </div>
                    `;
                });
            }
        } else {
            tanggapanSection.style.display = 'none';
        }
    });
}
        // Aktifkan tombol share
        const shareBtn = pengaduanElement.querySelector('.btn-share');
        if (shareBtn) {
            shareBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const pengaduanId = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const text = this.getAttribute('data-text');
                const url = window.location.origin + '/pengaduan/' + pengaduanId;
                
                // Cek apakah Web Share API tersedia
                if (navigator.share) {
                    navigator.share({
                        title: title,
                        text: text,
                        url: url
                    })
                    .then(() => console.log('Shared successfully'))
                    .catch(error => {
                        console.error('Error sharing:', error);
                        showShareModal(pengaduanId);
                    });
                } else {
                    // Fallback ke modal jika Web Share API tidak tersedia
                    const shareModal = new bootstrap.Modal(document.getElementById('shareModal-' + pengaduanId));
                    shareModal.show();
                }
            });
        }
        
        // Aktifkan tombol salin link
        const copyBtn = pengaduanElement.querySelector('.btn-copy-link');
        if (copyBtn) {
            copyBtn.addEventListener('click', function() {
                const linkInput = this.closest('.modal-content').querySelector('.modal-share-link');
                linkInput.select();
                document.execCommand('copy');
                
                // Tampilkan pesan berhasil disalin
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-check me-1"></i> Tersalin!';
                this.classList.add('btn-success');
                
                // Reset tombol setelah 2 detik
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-success');
                }, 2000);
            });
        }
    }

            // Toggle classification selection
            document.querySelectorAll('.classification-item').forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all items
                    document.querySelectorAll('.classification-item').forEach(i => {
                        i.classList.remove('active');
                    });
                    // Add active class to clicked item
                    this.classList.add('active');
                    // Check the radio button
                    this.querySelector('input[type="radio"]').checked = true;
                });
            });
            
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // Display file name when selected
            document.querySelector('input[type="file"]').addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    let fileName = e.target.files[0].name;
                    document.querySelector('.file-upload-text').textContent = fileName;
                }
            });
            
            // Handle Comment Toggle
            const commentButtons = document.querySelectorAll('.btn-comment');
            commentButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pengaduanId = this.getAttribute('data-id');
                    const commentSection = document.getElementById('comment-section-' + pengaduanId);
                    
                    // Toggle comment form visibility
                    if (commentSection.style.display === 'none' || commentSection.style.display === '') {
                        commentSection.style.display = 'block';
                        // Focus on the comment input if user is logged in
                        const textarea = commentSection.querySelector('textarea');
                        if (textarea) {
                            textarea.focus();
                        }
                    } else {
                        commentSection.style.display = 'none';
                    }
                });
            });

            // Handle Support/Like Button
            const supportButtons = document.querySelectorAll('.btn-support');
            supportButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pengaduanId = this.getAttribute('data-id');
                    const counterSpan = this.querySelector('.support-count');
                    
                    // Send AJAX request to add support
                    fetch('/dukungan/' + pengaduanId, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        credentials: 'same-origin'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update counter and style
                            counterSpan.textContent = data.count;
                            if (data.supported) {
                                this.classList.remove('btn-outline-success');
                                this.classList.add('btn-success');
                            } else {
                                this.classList.remove('btn-success');
                                this.classList.add('btn-outline-success');
                            }
                        } else if (data.error === 'unauthenticated') {
                            // Redirect to login page
                            window.location.href = '{{ route("login") }}';
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });

 // Handle Tanggapan Toggle
 const tanggapanButtons = document.querySelectorAll('.btn-tanggapan');
tanggapanButtons.forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const pengaduanId = this.getAttribute('data-id');
        const tanggapanSection = document.getElementById('tanggapan-section-' + pengaduanId);
        
        // Toggle tanggapan section visibility
        if (tanggapanSection.style.display === 'none' || tanggapanSection.style.display === '') {
            tanggapanSection.style.display = 'block';
            
            // Hide comment section if it's open
            const commentSection = document.getElementById('comment-section-' + pengaduanId);
            if (commentSection && commentSection.style.display === 'block') {
                commentSection.style.display = 'none';
            }
        } else {
            tanggapanSection.style.display = 'none';
        }
    });
});

            // Handle Share Button with Web Share API if available
            const shareButtons = document.querySelectorAll('.btn-share');
            shareButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pengaduanId = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const text = this.getAttribute('data-text');
                    const url = window.location.origin + '/pengaduan/' + pengaduanId;
                    
                    // Check if Web Share API is available
                    if (navigator.share) {
                        navigator.share({
                            title: title,
                            text: text,
                            url: url
                        })
                        .then(() => console.log('Shared successfully'))
                        .catch(error => {
                            console.error('Error sharing:', error);
                            showShareModal(pengaduanId);
                        });
                    } else {
                        // Fallback to modal if Web Share API is not available
                        showShareModal(pengaduanId);
                    }
                });
            });

            // Function to show share modal for older browsers
            function showShareModal(pengaduanId) {
                const modal = document.getElementById('shareModal-' + pengaduanId);
                if (modal) {
                    const shareUrl = window.location.origin + '/pengaduan/' + pengaduanId;
                    modal.querySelector('.modal-share-link').value = shareUrl;
                    const bsModal = new bootstrap.Modal(modal);
                    bsModal.show();
                }
            }

            // Copy to clipboard functionality for share links
            const copyButtons = document.querySelectorAll('.btn-copy-link');
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const linkInput = this.closest('.modal-content').querySelector('.modal-share-link');
                    linkInput.select();
                    document.execCommand('copy');
                    
                    // Show copied message
                    const originalText = this.textContent;
                    this.textContent = 'Tersalin!';
                    this.classList.add('btn-success');
                    
                    // Reset button after 2 seconds
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.classList.remove('btn-success');
                    }, 2000);
                });
            });
            
            // Comment submission handling
            const commentForms = document.querySelectorAll('.comment-form');
            commentForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const pengaduanId = this.getAttribute('data-id');
                    const commentInput = this.querySelector('textarea[name="isi_komentar"]');
                    const commentText = commentInput.value.trim();
                    
                    if (commentText) {
                        // Get form data
                        const formData = new FormData(this);
                        
                        // Send AJAX request to submit comment
                        fetch('/komentar', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: formData,
                            credentials: 'same-origin'
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Clear the input
                                commentInput.value = '';
                                
                                // Add the new comment to the list
                                const commentsList = document.getElementById('comments-list-' + pengaduanId);
                                const newComment = createCommentElement(data.comment);
                                commentsList.insertBefore(newComment, commentsList.firstChild);
                                
                                // Update the comment count
                                const commentCountSpan = document.querySelector(`.btn-comment[data-id="${pengaduanId}"] .comment-count`);
                                const currentCount = parseInt(commentCountSpan.textContent);
                                commentCountSpan.textContent = currentCount + 1;
                                
                                // Hide empty state message if it exists
                                const emptyMessage = commentsList.querySelector('.text-center.text-muted.py-3');
                                if (emptyMessage) {
                                    emptyMessage.remove();
                                }
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                });
            });

            function loadTanggapan(pengaduanId, tanggapanSection) {
    // Get content and loading elements
    const tanggapanContent = tanggapanSection.querySelector('.tanggapan-content');
    const loadingIndicator = tanggapanSection.querySelector('.loading-tanggapan');
    
    if (tanggapanContent && tanggapanContent.children.length === 0) {
        // Show loading indicator
        loadingIndicator.style.display = 'block';
        
        // Fetch tanggapan data
        fetch('/get-tanggapan/' + pengaduanId, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            // Hide loading indicator
            loadingIndicator.style.display = 'none';
            
            if (data.success && data.tanggapan && data.tanggapan.length > 0) {
                // Render tanggapan data
                data.tanggapan.forEach((item, index) => {
                    const tanggapanItem = document.createElement('div');
                    tanggapanItem.className = 'tanggapan-item mb-3';
                    
                    // Check if attachment exists and is an image
                    let attachmentHTML = '';
                    if (item.lampiran) {
                        const extension = item.lampiran.split('.').pop().toLowerCase();
                        const isImage = ['jpg', 'jpeg', 'png', 'gif'].includes(extension);
                        
                        if (isImage) {
                            attachmentHTML = `
                                <div class="attachment-thumbnail mt-2">
                                    <a href="/storage/${item.lampiran}" target="_blank" class="d-inline-block">
                                        <img src="/storage/${item.lampiran}" alt="Lampiran Tanggapan" class="img-thumbnail" style="max-height: 150px;">
                                    </a>
                                </div>
                            `;
                        } else {
                            attachmentHTML = `
                                <div class="attachment-thumbnail mt-2">
                                    <a href="/storage/${item.lampiran}" target="_blank" class="btn btn-sm btn-light border">
                                        <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran Tanggapan
                                    </a>
                                </div>
                            `;
                        }
                    }
                    
                    tanggapanItem.innerHTML = `
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-primary">Admin</span>
                            <small class="text-muted">${item.created_at_formatted}</small>
                        </div>
                        <p class="mb-2">${item.isi_tanggapan}</p>
                        ${attachmentHTML}
                    `;
                    
                    tanggapanContent.appendChild(tanggapanItem);
                    
                    // Add separator except for last item
                    if (index < data.tanggapan.length - 1) {
                        const hr = document.createElement('hr');
                        tanggapanContent.appendChild(hr);
                    }
                });
            } else {
                // No tanggapan found
                tanggapanContent.innerHTML = `
                    <div class="text-center text-muted py-3">
                        <i class="bi bi-file-earmark-x me-1"></i> Belum ada tanggapan dari Admin
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error loading tanggapan:', error);
            loadingIndicator.style.display = 'none';
            tanggapanContent.innerHTML = `
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle me-1"></i> Gagal memuat tanggapan. Silakan coba lagi.
                </div>
            `;
        });
    }
}

// The main issue is within the activateComplaintFunctions function - modify the tanggapan button event handler
// Update the tanggapanBtn event listener in activateComplaintFunctions:
const tanggapanBtn = pengaduanElement.querySelector('.btn-tanggapan');
if (tanggapanBtn) {
    tanggapanBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const pengaduanId = this.getAttribute('data-id');
        const tanggapanSection = document.getElementById('tanggapan-section-' + pengaduanId);
        
        if (tanggapanSection.style.display === 'none' || tanggapanSection.style.display === '') {
            tanggapanSection.style.display = 'block';
            
            // Hide comment section if it's open
            const commentSection = document.getElementById('comment-section-' + pengaduanId);
            if (commentSection && commentSection.style.display === 'block') {
                commentSection.style.display = 'none';
            }
            
            // Load tanggapan content using the common function
            loadTanggapan(pengaduanId, tanggapanSection);
        } else {
            tanggapanSection.style.display = 'none';
        }
    });
}

// Update the existing tanggapan buttons too
document.addEventListener('DOMContentLoaded', function() {
    // Rest of your existing code...
    
    // Update the original tanggapan buttons handler to use the common function
    const tanggapanButtons = document.querySelectorAll('.btn-tanggapan');
    tanggapanButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const pengaduanId = this.getAttribute('data-id');
            const tanggapanSection = document.getElementById('tanggapan-section-' + pengaduanId);
            
            // Toggle tanggapan section visibility
            if (tanggapanSection.style.display === 'none' || tanggapanSection.style.display === '') {
                tanggapanSection.style.display = 'block';
                
                // Hide comment section if it's open
                const commentSection = document.getElementById('comment-section-' + pengaduanId);
                if (commentSection && commentSection.style.display === 'block') {
                    commentSection.style.display = 'none';
                }
                
                // Load tanggapan content using the common function
                loadTanggapan(pengaduanId, tanggapanSection);
            } else {
                tanggapanSection.style.display = 'none';
            }
        });
    });
});


            // Function to create a comment element
            function createCommentElement(comment) {
                const commentDiv = document.createElement('div');
                commentDiv.className = 'comment-item d-flex mb-3';
                
                // Create the comment HTML content
                let avatarHtml = '';
                if (comment.user.foto_profil) {
                    avatarHtml = `<img src="${comment.user.foto_profil}" alt="Avatar" class="rounded-circle" width="32" height="32">`;
                } else {
                    avatarHtml = `<div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="bi bi-person-fill text-white small"></i>
                                  </div>`;
                }
                
                commentDiv.innerHTML = `
                    <div class="comment-avatar me-2">
                        ${avatarHtml}
                    </div>
                    <div class="comment-content">
                        <div class="d-flex justify-content-between">
                            <strong class="me-2">${comment.user.nama}</strong>
                            <small class="text-muted">${comment.tanggal}</small>
                        </div>
                        <p class="mb-0">${comment.isi_komentar}</p>
                    </div>
                `;
                
                return commentDiv;
            }
        });
    </script>
</body>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Repotly - Layanan dan Pengaduan Online Rakyat</title>
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
        
        /* Form Elements */
        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
            box-shadow: none;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 8px;
        }
        
        textarea.form-control {
            min-height: 120px;
        }
        
        /* Classification Styles */
        .classification-group {
            display: flex;
            margin-bottom: 20px;
            background-color: var(--light);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .classification-item {
            flex: 1;
            text-align: center;
            padding: 12px 0;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            position: relative;
        }
        
        .classification-item.active {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .classification-item:not(.active):hover {
            background-color: #e2e6ea;
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
        
        /* Profile Card Styles */

        
        .profile-card {
            background: linear-gradient(135deg, var(--primary) 0%, #2c82c9 100%);
            color: var(--white);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
        }
        
        .profile-img-container {
            position: relative;
            margin-right: 20px;
        }
        
        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid var(--white);
            object-fit: cover;
        }
        
        .profile-status {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 20px;
            height: 20px;
            background-color: var(--success);
            border-radius: 50%;
            border: 2px solid var(--white);
        }
        
        .profile-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .profile-username {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 10px;
        }
        
        .stats-box {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .stats-box:hover {
            background-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-5px);
        }
        
        .stats-title {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 5px;
        }
        
        .stats-value {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }
        
        /* Institution Card Styles */
        .institution-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .institution-title:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--secondary);
            bottom: 0;
            left: 0;
        }
        
        .institution-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 10px;
            background-color: var(--white);
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .institution-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }
        
        .institution-icon {
            background-color: #e6f2ff;
            color: var(--primary);
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-right: 15px;
            font-size: 20px;
        }
        
        .institution-name {
            font-size: 15px;
            font-weight: 500;
            flex-grow: 1;
            color: var(--dark);
        }
        
        .institution-count {
            background-color: var(--secondary);
            color: var(--dark);
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
        }
        
        /* Success Stories Styles */
        .story-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 4px solid var(--success);
            transition: all 0.3s ease;
        }
        
        .story-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .story-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 16px;
        }
        
        .story-desc {
            color: var(--gray);
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .story-date {
            color: var(--secondary);
            font-size: 12px;
            font-weight: 500;
        }
        
        /* Badge Styles */
        .badge-primary {
            background-color: var(--primary);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .badge-secondary {
            background-color: var(--secondary);
            color: var(--dark);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
        }
        
        /* Help Icon Styles */
        .help-icon {
            display: inline-flex;
            width: 20px;
            height: 20px;
            background-color: var(--secondary);
            color: var(--dark);
            font-size: 12px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            margin-left: 8px;
            cursor: pointer;
        }
        
        /* File Upload Styles */
        .file-upload {
            position: relative;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            background-color: var(--light);
            border-radius: 10px;
            cursor: pointer;
        }
        
        .file-upload-icon {
            color: var(--primary);
            font-size: 20px;
            margin-right: 10px;
        }
        
        .file-upload-text {
            color: var(--gray);
            font-size: 14px;
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        /* Comment Section Styles */
        .comment-section {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .comment-item {
            padding: 10px;
            border-radius: 8px;
            background-color: #f8f9fa;
            margin-bottom: 10px;
        }
        
        .comment-content {
            flex: 1;
        }

        /* Tanggapan Section Styles */
.tanggapan-section {
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.tanggapan-item {
    padding: 15px;
    border-radius: 8px;
    background-color: #f8f9fa;
    border-left: 3px solid var(--accent);
}

.btn-tanggapan.btn-info {
    background-color: var(--accent);
    border-color: var(--accent);
    color: var(--white);
}

.btn-tanggapan.btn-outline-info {
    color: var(--accent);
    border-color: var(--accent);
}

.btn-tanggapan.btn-outline-info:hover {
    background-color: var(--accent);
    color: var(--white);
}

.card-header.bg-info {
    background-color: var(--accent) !important;
}

/* Admin badge style */
.badge.bg-primary {
    background-color: var(--primary) !important;
    font-size: 0.75rem;
    padding: 0.35em 0.65em;
    font-weight: 600;
}

/* Image attachment style */
.tanggapan-item .attachment-thumbnail img {
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    box-shadow: 0 2px 4px rgba(0,0,0,.05);
    transition: transform 0.2s ease;
}

.tanggapan-item .attachment-thumbnail img:hover {
    transform: scale(1.02);
}
        
        /* Social Share Styles */
        .social-share-btns a {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .main-content {
                padding: 20px 0;
            }
            
            .profile-container {
                position: static;
            }
            
            .classification-item {
                font-size: 14px;
                padding: 10px 5px;
            }
        }
    </style>
</head>
<body>
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
            <div class="d-flex align-items-center">
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
        <h2 class="page-title">Layanan dan Pengaduan Online Rakyat</h2>
        
        <div class="row">
            <!-- Form Area -->
            <div class="col-lg-7">
                <div class="custom-card">
                    <div class="card-header d-flex align-items-center">
                        <i class="bi bi-megaphone me-2"></i>
                        <span>Sampaikan Laporan Anda</span>
                    </div>
                    <div class="card-body">
                        <!-- Guidance -->
                        <div class="d-flex align-items-center mb-4 p-3 rounded-3" style="background-color: #e7f3ff; border-left: 4px solid var(--accent);">
                            <i class="bi bi-info-circle text-primary me-2"></i>
                            <small>Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar</small>
                            <span class="help-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk melihat panduan">?</span>
                        </div>

                        <!-- Alert for errors -->
                        @if(session('error'))
                            <div class="alert alert-danger mb-4">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Form -->
                        <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Laporan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="judul" name="judul_pengaduan" placeholder="Contoh: Jalan Rusak di Sekupang" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Isi Laporan <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Jelaskan detail permasalahan atau aspirasi Anda" required></textarea>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tanggal" class="form-label">Tanggal Kejadian <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal_kejadian" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lokasi" class="form-label">Lokasi Kejadian <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Contoh: Sekupang" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="kategori" class="form-label">Kategori Laporan <span class="text-danger">*</span></label>
                                    <select class="form-select" id="kategori" name="id_kategori" required>
                                        <option value="" selected disabled>Pilih kategori</option>
                                        @foreach($kategori as $kat)
                                            <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label">Lampiran (Opsional)</label>
                                <div class="file-upload">
                                    <i class="bi bi-paperclip file-upload-icon"></i>
                                    <span class="file-upload-text">Pilih file untuk dilampirkan</span>
                                    <input type="file" name="lampiran">
                                </div>
                                <small class="text-muted mt-1 d-block">Ukuran maksimal file 2MB (JPG, PNG, PDF)</small>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                </div>
                                
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="bi bi-send me-1"></i> LAPOR!
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Add complaint list immediately below the form with minimal gap -->
                <div class="custom-card mt-3">
                    <div class="card-body p-0">
                        <!-- Tabs for filtering complaints -->
                        <ul class="nav nav-tabs border-bottom-0 px-3 pt-3" id="pengaduanTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab" aria-controls="semua" aria-selected="true">Semua</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="laporan-saya-tab" data-bs-toggle="tab" data-bs-target="#laporan-saya" type="button" role="tab" aria-controls="laporan-saya" aria-selected="false">Laporan Saya</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="terhangat-tab" data-bs-toggle="tab" data-bs-target="#terhangat" type="button" role="tab" aria-controls="terhangat" aria-selected="false">Terhangat</button>
                            </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content border-top" id="pengaduanTabsContent">
                            <!-- All complaints tab -->
                            <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
                                @php
                                    // Filter out pending complaints
                                    $filteredPengaduanList = $pengaduanList->filter(function($item) {
                                        return $item->status != 'Pending';
                                    });
                                @endphp
                                
                                @forelse($filteredPengaduanList as $pengaduan)
                                    <div class="pengaduan-item border-bottom p-3">
                                        <div class="d-flex mb-2">
                                            <!-- User info and date -->
                                            <div class="d-flex align-items-center me-auto">
                                                @if($pengaduan->pengguna && $pengaduan->pengguna->foto_profil)
                                                    <img src="{{ asset('storage/' . $pengaduan->pengguna->foto_profil) }}" alt="User" class="rounded-circle me-2" width="40" height="40">
                                                @else
                                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                                        <i class="bi bi-person-fill text-white"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <span class="fw-medium d-block">
                                                        {{ $pengaduan->pengguna ? $pengaduan->pengguna->nama : 'Anonim' }}
                                                    </span>
                                                    <div class="d-flex align-items-center text-muted small">
                                                        <i class="bi bi-calendar-event me-1"></i>
                                                        <span>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M, H:i') }}</span>
                                                        @if($pengaduan->lokasi)
                                                            <i class="bi bi-geo-alt ms-2 me-1"></i>
                                                            <span>{{ $pengaduan->lokasi }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Status badge -->
                                            <div>
                                                @php
                                                    $statusClass = [
                                                        'Pending' => 'bg-warning',
                                                        'Diverifikasi' => 'bg-info',
                                                        'Diproses' => 'bg-primary',
                                                        'Selesai' => 'bg-success',
                                                        'Ditolak' => 'bg-danger'
                                                    ][$pengaduan->status] ?? 'bg-secondary';
                                                @endphp
                                                <span class="badge {{ $statusClass }} rounded-pill">
                                                    {{ $pengaduan->status }}
                                                </span>
                                                <div class="text-muted small text-end mt-1">
                                                    {{ \Carbon\Carbon::parse($pengaduan->created_at)->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Rest of the complaint display code remains the same -->
                                        <!-- Assigned division/institution -->
                                        @php
                                            $pengaduanInstansi = \App\Models\Pengaduan_Instansi::with('instansi')
                                                ->where('id_pengaduan', $pengaduan->id_pengaduan)
                                                ->first();
                                        @endphp
                                        @if($pengaduanInstansi && $pengaduanInstansi->instansi)
                                            <div class="mb-2">
                                                <span class="badge bg-light text-dark border">
                                                    <i class="bi bi-building me-1"></i> {{ $pengaduanInstansi->instansi->nama_instansi }}
                                                </span>
                                                @if($pengaduan->kategori)
                                                    <span class="badge bg-light text-dark border ms-1">
                                                    <i class="bi bi-tag me-1"></i> {{ $pengaduan->kategori->nama_kategori }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endif
                                        
                                        <!-- Complaint title and text -->
                                        <h5 class="mt-2 mb-2">{{ $pengaduan->judul_pengaduan }}</h5>
                                        <p class="mb-2">{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 200) }}</p>
                                        
                                        <!-- Attachment thumbnail if exists -->
                                        @if($pengaduan->lampiran)
                                            <div class="attachment-thumbnail mb-3">
                                                @php
                                                    $extension = pathinfo($pengaduan->lampiran, PATHINFO_EXTENSION);
                                                    $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                                                @endphp
                                                
                                                @if($isImage)
                                                    <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="d-inline-block border rounded p-1">
                                                        <img src="{{ asset('storage/' . $pengaduan->lampiran) }}" alt="Lampiran" class="img-thumbnail" style="max-height: 100px;">
                                                    </a>
                                                @else
                                                    <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="btn btn-sm btn-light border">
                                                        <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran
                                                    </a>
                                                @endif
                                            </div>
                                        @endif
                                        
                                        <!-- Action buttons -->
                                        <div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        @if($pengaduan->status != 'Ditolak')
            <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-comment" data-id="{{ $pengaduan->id_pengaduan }}">
                <i class="bi bi-chat-dots me-1"></i> Komentar
                @php
                    $commentCount = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                @endphp
                <span class="ms-1 comment-count">{{ $commentCount }}</span>
            </a>
            
            <!-- Support/Like Button -->
            @php
                $isSupported = false;
                $supportCount = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                
                if (Auth::check()) {
                    $isSupported = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)
                        ->where('id_pengguna', Auth::id())
                        ->exists();
                }
            @endphp
            
            <a href="#" class="btn btn-sm {{ $isSupported ? 'btn-success' : 'btn-outline-success' }} me-2 btn-support" data-id="{{ $pengaduan->id_pengaduan }}">
                <i class="bi bi-hand-thumbs-up me-1"></i> Dukung
                <span class="ms-1 support-count">{{ $supportCount }}</span>
            </a>
        @endif
        
        <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-tanggapan" data-id="{{ $pengaduan->id_pengaduan }}">
            <i class="bi bi-file-earmark-text me-1"></i> Tanggapan
            @php
                    $tanggapanCount = \App\Models\tanggapan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                @endphp
                <span class="ms-1 tanggapan-count">{{ $tanggapanCount }}</span>
        </a>
        
        <!-- Share Button -->
        <a href="#" class="btn btn-sm btn-outline-secondary btn-share" 
           data-id="{{ $pengaduan->id_pengaduan }}"
           data-title="{{ $pengaduan->judul_pengaduan }}"
           data-text="{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 100) }}">
            <i class="bi bi-share me-1"></i> Bagikan
        </a>
    </div>
</div>
                                        
                                        <!-- Comment Section -->
                                        <div id="comment-section-{{ $pengaduan->id_pengaduan }}" class="comment-section mt-3" style="display: none;">
                                            <div class="card">
                                                <div class="card-header bg-light">
                                                    <strong><i class="bi bi-chat-dots me-2"></i>Komentar</strong>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Comment Form -->
                                                    @auth
                                                        <form class="comment-form mb-3" data-id="{{ $pengaduan->id_pengaduan }}">
                                                            @csrf
                                                            <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                                                            <div class="d-flex">
                                                                @if(Auth::user()->foto_profil)
                                                                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User" class="rounded-circle me-2" width="32" height="32">
                                                                @else
                                                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                                                        <i class="bi bi-person-fill text-white small"></i>
                                                                    </div>
                                                                @endif
                                                                <div class="flex-grow-1">
                                                                    <textarea name="isi_komentar" class="form-control mb-2" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                                        <i class="bi bi-send me-1"></i> Kirim Komentar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <div class="alert alert-info mb-3">
                                                            <i class="bi bi-info-circle me-2"></i> Silahkan <a href="{{ route('login') }}" class="alert-link">login</a> untuk memberikan komentar
                                                        </div>
                                                    @endauth
                                                
                                                    <!-- Comments List -->
                                                    <div id="comments-list-{{ $pengaduan->id_pengaduan }}" class="comments-list">
                                                        @php
                                                            $comments = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)
                                                                ->with('pengguna')
                                                                ->orderBy('created_at', 'desc')
                                                                ->take(5)
                                                                ->get();
                                                        @endphp
                                                        
                                                        @forelse($comments as $comment)
                                                            <div class="comment-item d-flex mb-3">
                                                                <div class="comment-avatar me-2">
                                                                    @if($comment->pengguna && $comment->pengguna->foto_profil)
                                                                        <img src="{{ asset('storage/' . $comment->pengguna->foto_profil) }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                                                                    @else
                                                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                                            <i class="bi bi-person-fill text-white small"></i>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="comment-content">
                                                                    <div class="d-flex justify-content-between">
                                                                        <strong class="me-2">{{ $comment->pengguna ? $comment->pengguna->nama : 'Anonim' }}</strong>
                                                                        <small class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                                                                    </div>
                                                                    <p class="mb-0">{{ $comment->isi_komentar }}</p>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div class="text-center text-muted py-3">
                                                                <i class="bi bi-chat-square me-1"></i> Belum ada komentar
                                                            </div>
                                                        @endforelse
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tanggapan Section -->
<div id="tanggapan-section-{{ $pengaduan->id_pengaduan }}" class="tanggapan-section mt-3" style="display: none;">
    <div class="card">
        <div class="card-body">
            @php
                $tanggapan = \App\Models\Tanggapan::where('id_pengaduan', $pengaduan->id_pengaduan)
                    ->orderBy('created_at', 'desc')
                    ->get();
            @endphp
            
            @forelse($tanggapan as $t)
                <div class="tanggapan-item mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary">Admin</span>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($t->created_at)->format('d M Y, H:i') }}</small>
                    </div>
                    <p class="mb-2">{{ $t->isi_tanggapan }}</p>
                    
                    @if($t->lampiran)
                        <div class="attachment-thumbnail mt-2">
                            @php
                                $extension = pathinfo($t->lampiran, PATHINFO_EXTENSION);
                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                            @endphp
                            
                            @if($isImage)
                                <a href="{{ asset('storage/' . $t->lampiran) }}" target="_blank" class="d-inline-block">
                                    <img src="{{ asset('storage/' . $t->lampiran) }}" alt="Lampiran Tanggapan" class="img-thumbnail" style="max-height: 150px;">
                                </a>
                            @else
                                <a href="{{ asset('storage/' . $t->lampiran) }}" target="_blank" class="btn btn-sm btn-light border">
                                    <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran Tanggapan
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
                @unless($loop->last)
                    <hr>
                @endunless
            @empty
                <div class="text-center text-muted py-3">
                    <i class="bi bi-file-earmark-x me-1"></i> Belum ada tanggapan dari Admin
                </div>
            @endforelse
        </div>
    </div>
</div>
                                        
                                        <!-- Share Modal -->
                                        <div class="modal fade" id="shareModal-{{ $pengaduan->id_pengaduan }}" tabindex="-1" aria-labelledby="shareModalLabel-{{ $pengaduan->id_pengaduan }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="shareModalLabel-{{ $pengaduan->id_pengaduan }}">Bagikan Laporan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Bagikan laporan ini melalui:</p>
                                                        
                                                        <div class="d-flex justify-content-center mb-3">
                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-primary mx-1">
                                                                <i class="bi bi-facebook"></i>
                                                            </a>
                                                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengaduan->judul_pengaduan) }}&url={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-info mx-1">
                                                                <i class="bi bi-twitter-x"></i>
                                                            </a>
                                                            <a href="https://api.whatsapp.com/send?text={{ urlencode($pengaduan->judul_pengaduan . ' - ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-success mx-1">
                                                                <i class="bi bi-whatsapp"></i>
                                                            </a>
                                                            <a href="mailto:?subject={{ urlencode('Laporan: ' . $pengaduan->judul_pengaduan) }}&body={{ urlencode('Lihat laporan ini di ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" class="btn btn-outline-secondary mx-1">
                                                                <i class="bi bi-envelope"></i>
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="input-group">
                                                            <input type="text" class="form-control modal-share-link" readonly value="{{ url('/lapor' . $pengaduan->id_pengaduan) }}">
                                                            <button class="btn btn-outline-primary btn-copy-link" type="button">
                                                                <i class="bi bi-clipboard me-1"></i> Salin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <i class="bi bi-clipboard-x" style="font-size: 3rem; color: var(--light-gray);"></i>
                                        <p class="mt-3 text-muted">Belum ada pengaduan untuk ditampilkan</p>
                                    </div>
                                @endforelse
                                
                                <div class="text-center p-3">
                                    <a href="#" class="btn btn-outline-custom" id="load-more-button">
                                        <i class="bi bi-plus-circle me-1"></i> Lihat Lebih Banyak
                                    </a>
                                </div>
                            </div>
                            <!-- Modification for the "My complaints" tab - Filter out Pending status -->
<div class="tab-pane fade" id="laporan-saya" role="tabpanel" aria-labelledby="laporan-saya-tab">
    @if(Auth::check())
        @php
            // Filter out pending complaints
            $filteredUserPengaduan = $userPengaduan->filter(function($item) {
                return $item->status != 'Pending';
            });
        @endphp
        
        @forelse($filteredUserPengaduan as $pengaduan)
            <div class="pengaduan-item border-bottom p-3">
                <div class="d-flex mb-2">
                    <!-- User info and date - Ditambahkan profil pengguna -->
                    <div class="d-flex align-items-center me-auto">
                        @if(Auth::user()->foto_profil)
                            <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User" class="rounded-circle me-2" width="40" height="40">
                        @else
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                <i class="bi bi-person-fill text-white"></i>
                            </div>
                        @endif
                        <div>
                            <span class="fw-medium d-block">
                                {{ Auth::user()->nama }}
                            </span>
                            <div class="d-flex align-items-center text-muted small">
                                <i class="bi bi-calendar-event me-1"></i>
                                <span>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M, H:i') }}</span>
                                @if($pengaduan->lokasi)
                                    <i class="bi bi-geo-alt ms-2 me-1"></i>
                                    <span>{{ $pengaduan->lokasi }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Status badge -->
                    <div>
                        @php
                            $statusClass = [
                                'Pending' => 'bg-warning',
                                'Diverifikasi' => 'bg-info',
                                'Diproses' => 'bg-primary',
                                'Selesai' => 'bg-success',
                                'Ditolak' => 'bg-danger'
                            ][$pengaduan->status] ?? 'bg-secondary';
                        @endphp
                        <span class="badge {{ $statusClass }} rounded-pill">
                            {{ $pengaduan->status }}
                        </span>
                        <div class="text-muted small text-end mt-1">
                            {{ \Carbon\Carbon::parse($pengaduan->created_at)->diffForHumans() }}
                        </div>
                    </div>
                </div>
                
                <!-- Rest of the complaint display code remains the same -->
                <!-- Assigned division/institution -->
                @php
                    $pengaduanInstansi = \App\Models\Pengaduan_Instansi::with('instansi')
                        ->where('id_pengaduan', $pengaduan->id_pengaduan)
                        ->first();
                @endphp
                @if($pengaduanInstansi && $pengaduanInstansi->instansi)
                    <div class="mb-2">
                        <span class="badge bg-light text-dark border">
                            <i class="bi bi-building me-1"></i> {{ $pengaduanInstansi->instansi->nama_instansi }}
                        </span>
                        @if($pengaduan->kategori)
                            <span class="badge bg-light text-dark border ms-1">
                                <i class="bi bi-tag me-1"></i> {{ $pengaduan->kategori->nama_kategori }}
                            </span>
                        @endif
                    </div>
                @endif
                
                <!-- Complaint title and text -->
                <h5 class="mt-2 mb-2">{{ $pengaduan->judul_pengaduan }}</h5>
                <p class="mb-2">{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 150) }}</p>
                
                <!-- Attachment thumbnail if exists -->
                @if($pengaduan->lampiran)
                    <div class="attachment-thumbnail mb-3">
                        @php
                            $extension = pathinfo($pengaduan->lampiran, PATHINFO_EXTENSION);
                            $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']);
                        @endphp
                        
                        @if($isImage)
                            <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="d-inline-block border rounded p-1">
                                <img src="{{ asset('storage/' . $pengaduan->lampiran) }}" alt="Lampiran" class="img-thumbnail" style="max-height: 100px;">
                            </a>
                        @else
                            <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="btn btn-sm btn-light border">
                                <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran
                            </a>
                        @endif
                    </div>
                @endif
                
                <!-- Action buttons -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-comment" data-id="{{ $pengaduan->id_pengaduan }}">
                            <i class="bi bi-chat-dots me-1"></i> Komentar
                            @php
                                $commentCount = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                            @endphp
                            <span class="ms-1 comment-count">{{ $commentCount }}</span>
                        </a>
                        
                        <!-- Support/Like Button -->
                        @php
                            $isSupported = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)
                                ->where('id_pengguna', Auth::id())
                                ->exists();
                            $supportCount = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                        @endphp
                        
                        <a href="#" class="btn btn-sm {{ $isSupported ? 'btn-success' : 'btn-outline-success' }} me-2 btn-support" data-id="{{ $pengaduan->id_pengaduan }}">
                            <i class="bi bi-hand-thumbs-up me-1"></i> Dukung
                            <span class="ms-1 support-count">{{ $supportCount }}</span>
                        </a>
                        
                        <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-tanggapan" data-id="{{ $pengaduan->id_pengaduan }}">
                            <i class="bi bi-file-earmark-text me-1"></i> Tanggapan
                                 @php
                                $tanggapanCount = \App\Models\tanggapan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                                @endphp
                             <span class="ms-1 tanggapan-count">{{ $tanggapanCount }}</span>
                        </a>
        

                        <a href="#" class="btn btn-sm btn-outline-secondary btn-share" 
                           data-id="{{ $pengaduan->id_pengaduan }}"
                           data-title="{{ $pengaduan->judul_pengaduan }}"
                           data-text="{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 100) }}">
                            <i class="bi bi-share me-1"></i> Bagikan
                        </a>
                    </div>
                </div>
                
                <!-- Comment Section - Same as in "All" tab -->
                <div id="comment-section-{{ $pengaduan->id_pengaduan }}" class="comment-section mt-3" style="display: none;">
                    <div class="card">
                        <div class="card-header bg-light">
                            <strong><i class="bi bi-chat-dots me-2"></i>Komentar</strong>
                        </div>
                        <div class="card-body">
                            <!-- Comment Form -->
                            <form class="comment-form mb-3" data-id="{{ $pengaduan->id_pengaduan }}">
                                @csrf
                                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                                <div class="d-flex">
                                    @if(Auth::user()->foto_profil)
                                        <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User" class="rounded-circle me-2" width="32" height="32">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            <i class="bi bi-person-fill text-white small"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <textarea name="isi_komentar" class="form-control mb-2" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-send me-1"></i> Kirim Komentar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        
                            <!-- Comments List -->
                            <div id="comments-list-{{ $pengaduan->id_pengaduan }}" class="comments-list">
                                @php
                                    $comments = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)
                                        ->with('pengguna')
                                        ->orderBy('created_at', 'desc')
                                        ->take(5)
                                        ->get();
                                @endphp
                                
                                @forelse($comments as $comment)
                                    <div class="comment-item d-flex mb-3">
                                        <div class="comment-avatar me-2">
                                            @if($comment->pengguna && $comment->pengguna->foto_profil)
                                                <img src="{{ asset('storage/' . $comment->pengguna->foto_profil) }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                                            @else
                                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                    <i class="bi bi-person-fill text-white small"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="comment-content">
                                            <div class="d-flex justify-content-between">
                                                <strong class="me-2">{{ $comment->pengguna ? $comment->pengguna->nama : 'Anonim' }}</strong>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                                            </div>
                                            <p class="mb-0">{{ $comment->isi_komentar }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center text-muted py-3">
                                        <i class="bi bi-chat-square me-1"></i> Belum ada komentar
                                    </div>
                                @endforelse
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Share Modal - Same as in "All" tab -->
                <div class="modal fade" id="shareModal-{{ $pengaduan->id_pengaduan }}" tabindex="-1" aria-labelledby="shareModalLabel-{{ $pengaduan->id_pengaduan }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="shareModalLabel-{{ $pengaduan->id_pengaduan }}">Bagikan Laporan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Bagikan laporan ini melalui:</p>
                                
                                <div class="d-flex justify-content-center mb-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-primary mx-1">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengaduan->judul_pengaduan) }}&url={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-info mx-1">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($pengaduan->judul_pengaduan . ' - ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-success mx-1">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                    <a href="mailto:?subject={{ urlencode('Laporan: ' . $pengaduan->judul_pengaduan) }}&body={{ urlencode('Lihat laporan ini di ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" class="btn btn-outline-secondary mx-1">
                                        <i class="bi bi-envelope"></i>
                                    </a>
                                </div>
                                
                                <div class="input-group">
                                    <input type="text" class="form-control modal-share-link" readonly value="{{ url('/pengaduan/' . $pengaduan->id_pengaduan) }}">
                                    <button class="btn btn-outline-primary btn-copy-link" type="button">
                                        <i class="bi bi-clipboard me-1"></i> Salin
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                 <i class="bi bi-clipboard-x" style="font-size: 3rem; color: var(--light-gray);"></i>
                <p class="mt-3 text-muted">Anda belum memiliki pengaduan yang diproses</p>
                <a href="#form-pengaduan" class="btn btn-primary-custom mt-2">
                    <i class="bi bi-plus-circle me-1"></i> Buat Pengaduan
                </a>
            </div>
        @endforelse
    @else
        <div class="text-center py-5">
            <i class="bi bi-shield-lock" style="font-size: 3rem; color: var(--light-gray);"></i>
            <p class="mt-3 text-muted">Silahkan login untuk melihat laporan Anda</p>
            <a href="{{ route('login') }}" class="btn btn-primary-custom mt-2">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
        </div>
    @endif
</div>

<!-- Modification for the "Trending" tab - Filter out Pending status -->
<div class="tab-pane fade" id="terhangat" role="tabpanel" aria-labelledby="terhangat-tab">
    @php
        // Filter out pending complaints from trending ones
        $filteredTrendingPengaduan = collect($trendingPengaduan)->filter(function($item) {
            return $item->status != 'Pending';
        });
    @endphp
    
    @forelse($filteredTrendingPengaduan as $pengaduan)
        @php
            // Convert DB item to model instance for easier relationship handling
            $pengaduanModel = new \App\Models\Pengaduan((array)$pengaduan);
            $pengaduanModel->id_pengaduan = $pengaduan->id_pengaduan;
            
            // Get pengaduan info
            $pengguna = \App\Models\Pengguna::find($pengaduan->id_pengguna);
            $kategori = \App\Models\Kategori::find($pengaduan->id_kategori);
        @endphp
        
        <div class="pengaduan-item border-bottom p-3">
            <div class="d-flex mb-2">
                <!-- User info and date -->
                <div class="d-flex align-items-center me-auto">
                    @if($pengguna && $pengguna->foto_profil)
                        <img src="{{ asset('storage/' . $pengguna->foto_profil) }}" alt="User" class="rounded-circle me-2" width="40" height="40">
                    @else
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                            <i class="bi bi-person-fill text-white"></i>
                        </div>
                    @endif
                    <div>
                        <span class="fw-medium d-block">
                            {{ $pengguna ? $pengguna->nama : 'Anonim' }}
                        </span>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-calendar-event me-1"></i>
                            <span>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M, H:i') }}</span>
                            @if($pengaduan->lokasi)
                                <i class="bi bi-geo-alt ms-2 me-1"></i>
                                <span>{{ $pengaduan->lokasi }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Comment count -->
                <div>
                    <div class="text-muted small text-end mt-1">
                        {{ \Carbon\Carbon::parse($pengaduan->created_at)->diffForHumans() }}
                    </div>
                </div>
            </div>
            
            <!-- Complaint title and text -->
            <h5 class="mt-2 mb-2">{{ $pengaduan->judul_pengaduan }}</h5>
            <p class="mb-2">{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 200) }}</p>
            
            <!-- Action buttons -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-comment" data-id="{{ $pengaduan->id_pengaduan }}">
                                                        <i class="bi bi-chat-dots me-1"></i> Komentar
                                                        @php
                                                            $commentCount = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                                                        @endphp
                           <span class="ms-1 comment-count">{{ $commentCount }}</span>
                        </a>

                        
                    
                    <!-- Support/Like Button -->
                    @php
                        $isSupported = false;
                        $supportCount = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                        
                        if (Auth::check()) {
                            $isSupported = \App\Models\Dukungan::where('id_pengaduan', $pengaduan->id_pengaduan)
                                ->where('id_pengguna', Auth::id())
                                ->exists();
                        }
                    @endphp
                    
                    <a href="#" class="btn btn-sm {{ $isSupported ? 'btn-success' : 'btn-outline-success' }} me-2 btn-support" data-id="{{ $pengaduan->id_pengaduan }}">
                        <i class="bi bi-hand-thumbs-up me-1"></i> Dukung
                        <span class="ms-1 support-count">{{ $supportCount }}</span>
                    </a>
                    
                    <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-tanggapan" data-id="{{ $pengaduan->id_pengaduan }}">
            <i class="bi bi-file-earmark-text me-1"></i> Tanggapan
            @php
                    $tanggapanCount = \App\Models\tanggapan::where('id_pengaduan', $pengaduan->id_pengaduan)->count();
                @endphp
                <span class="ms-1 tanggapan-count">{{ $tanggapanCount }}</span>
        </a>
        

                    <!-- Share Button -->
                    <a href="#" class="btn btn-sm btn-outline-secondary btn-share" 
                       data-id="{{ $pengaduan->id_pengaduan }}"
                       data-title="{{ $pengaduan->judul_pengaduan }}"
                       data-text="{{ \Illuminate\Support\Str::limit($pengaduan->deskripsi, 100) }}">
                        <i class="bi bi-share me-1"></i> Bagikan
                    </a>
                </div>
            </div>
            
            <!-- Comment Section - Same as in other tabs -->
            <div id="comment-section-{{ $pengaduan->id_pengaduan }}" class="comment-section mt-3" style="display: none;">
                <div class="card">
                    <div class="card-header bg-light">
                        <strong><i class="bi bi-chat-dots me-2"></i>Komentar</strong>
                    </div>
                    <div class="card-body">
                        <!-- Comment Form -->
                        @auth
                            <form class="comment-form mb-3" data-id="{{ $pengaduan->id_pengaduan }}">
                                @csrf
                                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                                <div class="d-flex">
                                    @if(Auth::user()->foto_profil)
                                        <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="User" class="rounded-circle me-2" width="32" height="32">
                                    @else
                                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            <i class="bi bi-person-fill text-white small"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <textarea name="isi_komentar" class="form-control mb-2" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-send me-1"></i> Kirim Komentar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-info mb-3">
                                <i class="bi bi-info-circle me-2"></i> Silahkan <a href="{{ route('login') }}" class="alert-link">login</a> untuk memberikan komentar
                            </div>
                        @endauth
                    
                        <!-- Comments List -->
                        <div id="comments-list-{{ $pengaduan->id_pengaduan }}" class="comments-list">
                            @php
                                $comments = \App\Models\Komentar::where('id_pengaduan', $pengaduan->id_pengaduan)
                                    ->with('pengguna')
                                    ->orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();
                            @endphp
                            
                            @forelse($comments as $comment)
                                <div class="comment-item d-flex mb-3">
                                    <div class="comment-avatar me-2">
                                        @if($comment->pengguna && $comment->pengguna->foto_profil)
                                            <img src="{{ asset('storage/' . $comment->pengguna->foto_profil) }}" alt="Avatar" class="rounded-circle" width="32" height="32">
                                        @else
                                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                <i class="bi bi-person-fill text-white small"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="comment-content">
                                        <div class="d-flex justify-content-between">
                                            <strong class="me-2">{{ $comment->pengguna ? $comment->pengguna->nama : 'Anonim' }}</strong>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-0">{{ $comment->isi_komentar }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-muted py-3">
                                    <i class="bi bi-chat-square me-1"></i> Belum ada komentar
                                </div>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Share Modal - Same as in other tabs -->
            <div class="modal fade" id="shareModal-{{ $pengaduan->id_pengaduan }}" tabindex="-1" aria-labelledby="shareModalLabel-{{ $pengaduan->id_pengaduan }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="shareModalLabel-{{ $pengaduan->id_pengaduan }}">Bagikan Laporan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Bagikan laporan ini melalui:</p>
                            
                            <div class="d-flex justify-content-center mb-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-primary mx-1">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($pengaduan->judul_pengaduan) }}&url={{ urlencode(url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-info mx-1">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($pengaduan->judul_pengaduan . ' - ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" target="_blank" class="btn btn-outline-success mx-1">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                <a href="mailto:?subject={{ urlencode('Laporan: ' . $pengaduan->judul_pengaduan) }}&body={{ urlencode('Lihat laporan ini di ' . url('/pengaduan/' . $pengaduan->id_pengaduan)) }}" class="btn btn-outline-secondary mx-1">
                                    <i class="bi bi-envelope"></i>
                                </a>
                            </div>
                            
                            <div class="input-group">
                                <input type="text" class="form-control modal-share-link" readonly value="{{ url('/pengaduan/' . $pengaduan->id_pengaduan) }}">
                                <button class="btn btn-outline-primary btn-copy-link" type="button">
                                    <i class="bi bi-clipboard me-1"></i> Salin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <i class="bi bi-fire" style="font-size: 3rem; color: var(--light-gray);"></i>
            <p class="mt-3 text-muted">Belum ada pengaduan terhangat</p>
        </div>
    @endforelse
</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Profile & Stats Area -->
                <div class="col-lg-5">
                    <div class="profile-container">
                        <!-- Profile Card -->
                        <div class="profile-card">
                            <div class="d-flex mb-4">
                                <div class="profile-img-container">
                                    @auth
                                        @if(Auth::user()->foto_profil)
                                            <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" alt="Profile" class="profile-img">
                                        @else
                                            <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="profile-img">
                                        @endif
                                        <div class="profile-status"></div>
                                    @else
                                        <img src="{{ asset('images/profile.jpg') }}" alt="Profile" class="profile-img">
                                        <div class="profile-status"></div>
                                    @endauth
                                </div>
                                <div>
                                    @auth
                                        <h5 class="profile-name">{{ Auth::user()->nama }}</h5>
                                        <p class="profile-username mb-2"><i class="bi bi-person-check me-1"></i> {{ '@' . strtolower(explode('@', Auth::user()->email)[0]) }}</p>
                                        <a href="{{ route('profile.edit') }}" class="badge badge-secondary text-decoration-none">
                                            <i class="bi bi-pencil me-1"></i> Edit Profil
                                        </a>
                                    @else
                                        <h5 class="profile-name">Tamu</h5>
                                        <p class="profile-username mb-2">Silahkan login untuk mengakses fitur lengkap</p>
                                        <a href="{{ route('login') }}" class="badge badge-secondary text-decoration-none">
                                            <i class="bi bi-box-arrow-in-right me-1"></i> LOGIN
                                        </a>
                                    @endauth
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="stats-box">
                                        <p class="stats-title">Terverifikasi</p>
                                        <h3 class="stats-value">{{ $userStats['terverifikasi'] }}</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stats-box">
                                        <p class="stats-title">Diproses</p>
                                        <h3 class="stats-value">{{ $userStats['diproses'] }}</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="stats-box">
                                        <p class="stats-title">Selesai</p>
                                        <h3 class="stats-value">{{ $userStats['selesai'] }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Institutions Card -->
                        <div class="custom-card">
                            <div class="card-body">
                                <h5 class="institution-title">Instansi Terhangat</h5>
                                
                                @forelse($instansiTerhangat as $inst)
                                    <div class="institution-item">
                                        <div class="institution-icon">
                                            <i class="bi bi-building"></i>
                                        </div>
                                        <div class="institution-name">
                                            {{ $inst->nama_instansi }}
                                        </div>
                                        <div class="institution-count">
                                            {{ $inst->total > 1000 ? round($inst->total/1000, 1) . 'k' : $inst->total }}
                                        </div>
                                    </div>
                                @empty
                                    <div class="institution-item">
                                        <div class="institution-icon">
                                            <i class="bi bi-building"></i>
                                        </div>
                                        <div class="institution-name">
                                            Kepolisian Negara Republik Indonesia
                                        </div>
                                        <div class="institution-count">
                                            0
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        
                        <!-- Success Stories Card -->
                        <div class="custom-card">
                            <div class="card-body">
                                <h5 class="institution-title">Kisah Sukses</h5>
                                
                                @php
                                    $successStories = \App\Models\Pengaduan::where('status', 'Selesai')
                                        ->orderBy('updated_at', 'desc')
                                        ->limit(3)
                                        ->get();
                                @endphp
                                
                                @forelse($successStories as $story)
                                    <div class="story-card">
                                        <h6 class="story-title">{{ $story->judul_pengaduan }}</h6>
                                        <p class="story-desc">{{ \Illuminate\Support\Str::limit($story->deskripsi, 100) }}</p>
                                        <span class="story-date"><i class="bi bi-calendar3 me-1"></i> {{ $story->updated_at->format('d M Y') }}</span>
                                    </div>
                                @empty
                                    <div class="alert alert-info">
                                        <i class="bi bi-info-circle me-2"></i> Belum ada kisah sukses untuk ditampilkan.
                                    </div>
                                @endforelse
                            </div>
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
                    <p class="mb-0 small">Email Repotly@gmail.com</p>
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
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript for Comments, Support and Share -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.getElementById('load-more-button');
    let page = 1;
    
    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Tambahkan indikator loading
            loadMoreButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memuat...';
            loadMoreButton.disabled = true;
            
            // Ambil data pengaduan berikutnya
            fetch(`/load-more-complaints?page=${++page}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                // Pastikan ada pengaduan yang dikembalikan
                if (data.complaints && data.complaints.length > 0) {
                    const container = document.getElementById('semua');
                    
                    // Loop semua pengaduan yang diterima
                    data.complaints.forEach(complaint => {
                        // Generate HTML untuk setiap pengaduan
                        const complaintHTML = createComplaintHTML(complaint);
                        
                        // Masukkan HTML sebelum elemen tombol "Lihat Lebih Banyak"
                        const buttonContainer = loadMoreButton.closest('.text-center');
                        container.insertBefore(complaintHTML, buttonContainer);
                        
                        // Aktifkan fungsionalitas pada elemen baru
                        activateComplaintFunctions(complaintHTML);
                    });
                    
                    // Sembunyikan tombol jika tidak ada lagi pengaduan
                    if (!data.has_more) {
                        loadMoreButton.closest('.text-center').style.display = 'none';
                    }
                } else {
                    // Tidak ada pengaduan lagi, sembunyikan tombol
                    loadMoreButton.closest('.text-center').style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error loading more complaints:', error);
            })
            .finally(() => {
                // Kembalikan tombol ke kondisi normal
                loadMoreButton.innerHTML = '<i class="bi bi-plus-circle me-1"></i> Lihat Lebih Banyak';
                loadMoreButton.disabled = false;
            });
        });
    }
    
    // Fungsi untuk membuat elemen DOM pengaduan baru
    function createComplaintHTML(complaint) {
        // Tentukan kelas status
        let statusClass = 'bg-secondary';
        if (complaint.status === 'Diverifikasi') statusClass = 'bg-info';
        else if (complaint.status === 'Diproses') statusClass = 'bg-primary';
        else if (complaint.status === 'Selesai') statusClass = 'bg-success';
        else if (complaint.status === 'Ditolak') statusClass = 'bg-danger';
        
        // Buat elemen div untuk pengaduan
        const pengaduanItem = document.createElement('div');
        pengaduanItem.className = 'pengaduan-item border-bottom p-3';
        
        // Tentukan gambar profil
        let profileImg = `
            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                <i class="bi bi-person-fill text-white"></i>
            </div>
        `;
        
        if (complaint.user_photo) {
            profileImg = `<img src="${complaint.user_photo}" alt="User" class="rounded-circle me-2" width="40" height="40">`;
        }
        
        // Isi HTML pengaduan
        pengaduanItem.innerHTML = `
            <div class="d-flex mb-2">
                <!-- User info and date -->
                <div class="d-flex align-items-center me-auto">
                    ${profileImg}
                    <div>
                        <span class="fw-medium d-block">
                            ${complaint.user_name}
                        </span>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-calendar-event me-1"></i>
                            <span>${complaint.created_at_formatted}</span>
                            ${complaint.lokasi ? `
                                <i class="bi bi-geo-alt ms-2 me-1"></i>
                                <span>${complaint.lokasi}</span>
                            ` : ''}
                        </div>
                    </div>
                </div>
                <!-- Status badge -->
                <div>
                    <span class="badge ${statusClass} rounded-pill">
                        ${complaint.status}
                    </span>
                    <div class="text-muted small text-end mt-1">
                        ${complaint.created_at_human}
                    </div>
                </div>
            </div>
            
            <!-- Complaint title and text -->
            <h5 class="mt-2 mb-2">${complaint.judul_pengaduan}</h5>
            <p class="mb-2">${complaint.deskripsi.length > 200 ? complaint.deskripsi.substring(0, 200) + '...' : complaint.deskripsi}</p>
            
            <!-- Action buttons -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    <a href="#" class="btn btn-sm btn-outline-primary me-2 btn-comment" data-id="${complaint.id_pengaduan}">
                        <i class="bi bi-chat-dots me-1"></i> Komentar
                        <span class="ms-1 comment-count">0</span>
                    </a>
                    
                    <a href="#" class="btn btn-sm btn-outline-success me-2 btn-support" data-id="${complaint.id_pengaduan}">
                        <i class="bi bi-hand-thumbs-up me-1"></i> Dukung
                        <span class="ms-1 support-count">0</span>
                    </a>
                    
                    <a href="#" class="btn btn-sm btn-outline-info me-2 btn-tanggapan" data-id="${complaint.id_pengaduan}">
                        <i class="bi bi-file-earmark-text me-1"></i> Tanggapan
                    </a>

                    <a href="#" class="btn btn-sm btn-outline-secondary btn-share" 
                       data-id="${complaint.id_pengaduan}"
                       data-title="${complaint.judul_pengaduan}"
                       data-text="${complaint.deskripsi.substring(0, 100)}...">
                        <i class="bi bi-share me-1"></i> Bagikan
                    </a>
                </div>
            </div>
            
            <!-- Comment Section -->
            <div id="comment-section-${complaint.id_pengaduan}" class="comment-section mt-3" style="display: none;">
                <div class="card">
                    <div class="card-header bg-light">
                        <strong><i class="bi bi-chat-dots me-2"></i>Komentar</strong>
                    </div>
                    <div class="card-body">
                        <!-- Comment Form -->
                        <form class="comment-form mb-3" data-id="${complaint.id_pengaduan}">
                            <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                            <input type="hidden" name="id_pengaduan" value="${complaint.id_pengaduan}">
                            <div class="d-flex">
                                <div id="user-profile-pic" class="me-2">
                                    <!-- Akan diisi gambar profil pengguna melalui JavaScript -->
                                </div>
                                <div class="flex-grow-1">
                                    <textarea name="isi_komentar" class="form-control mb-2" rows="2" placeholder="Tulis komentar Anda..."></textarea>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="bi bi-send me-1"></i> Kirim Komentar
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Comments List -->
                        <div id="comments-list-${complaint.id_pengaduan}" class="comments-list">
                            <div class="text-center text-muted py-3">
                                <i class="bi bi-chat-square me-1"></i> Belum ada komentar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<!-- Tanggapan Section -->
<div id="tanggapan-section-${complaint.id_pengaduan}" class="tanggapan-section mt-3" style="display: none;">
    <div class="card">
        <div class="card-header bg-info text-white">
            <strong><i class="bi bi-file-earmark-text me-2"></i>Tanggapan Admin</strong>
        </div>
        <div class="card-body">
            <div class="text-center py-3 loading-tanggapan">
                <div class="spinner-border spinner-border-sm text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <span class="ms-2">Memuat tanggapan...</span>
            </div>
            <div class="tanggapan-content"></div>
        </div>
    </div>
</div>

            <!-- Share Modal -->
            <div class="modal fade" id="shareModal-${complaint.id_pengaduan}" tabindex="-1" aria-labelledby="shareModalLabel-${complaint.id_pengaduan}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="shareModalLabel-${complaint.id_pengaduan}">Bagikan Laporan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Bagikan laporan ini melalui:</p>
                            
                            <div class="d-flex justify-content-center mb-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.origin + '/pengaduan/' + complaint.id_pengaduan)}" target="_blank" class="btn btn-outline-primary mx-1">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text=${encodeURIComponent(complaint.judul_pengaduan)}&url=${encodeURIComponent(window.location.origin + '/pengaduan/' + complaint.id_pengaduan)}" target="_blank" class="btn btn-outline-info mx-1">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text=${encodeURIComponent(complaint.judul_pengaduan + ' - ' + window.location.origin + '/pengaduan/' + complaint.id_pengaduan)}" target="_blank" class="btn btn-outline-success mx-1">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                <a href="mailto:?subject=${encodeURIComponent('Laporan: ' + complaint.judul_pengaduan)}&body=${encodeURIComponent('Lihat laporan ini di ' + window.location.origin + '/pengaduan/' + complaint.id_pengaduan)}" class="btn btn-outline-secondary mx-1">
                                    <i class="bi bi-envelope"></i>
                                </a>
                            </div>
                            
                            <div class="input-group">
                                <input type="text" class="form-control modal-share-link" readonly value="${window.location.origin + '/pengaduan/' + complaint.id_pengaduan}">
                                <button class="btn btn-outline-primary btn-copy-link" type="button">
                                    <i class="bi bi-clipboard me-1"></i> Salin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        return pengaduanItem;
    }
    
    // Fungsi untuk mengaktifkan fungsi-fungsi untuk elemen pengaduan baru
    function activateComplaintFunctions(pengaduanElement) {
        // Tambahkan foto profil pengguna yang sedang login ke form komentar
        const userProfilePicContainer = pengaduanElement.querySelector('#user-profile-pic');
        if (userProfilePicContainer) {
            // Cek apakah ada elemen foto profil di header (untuk user yang login)
            const userProfileInHeader = document.querySelector('.dropdown-toggle img.rounded-circle');
            
            if (userProfileInHeader) {
                // Pengguna sudah login dan punya foto profil di header
                const userProfileSrc = userProfileInHeader.getAttribute('src');
                userProfilePicContainer.innerHTML = `<img src="${userProfileSrc}" alt="User" class="rounded-circle" width="32" height="32">`;
            } else {
                // Pengguna belum login atau tidak ada foto
                userProfilePicContainer.innerHTML = `
                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="bi bi-person-fill text-white small"></i>
                    </div>
                `;
            }
        }
        // Aktifkan tombol komentar
        const commentBtn = pengaduanElement.querySelector('.btn-comment');
        if (commentBtn) {
            commentBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const pengaduanId = this.getAttribute('data-id');
                const commentSection = document.getElementById('comment-section-' + pengaduanId);
                
                if (commentSection.style.display === 'none' || commentSection.style.display === '') {
                    commentSection.style.display = 'block';
                } else {
                    commentSection.style.display = 'none';
                }
            });
        }
        
        // Aktifkan form komentar
        const commentForm = pengaduanElement.querySelector('.comment-form');
        if (commentForm) {
            commentForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const pengaduanId = this.getAttribute('data-id');
                const commentInput = this.querySelector('textarea[name="isi_komentar"]');
                const commentText = commentInput.value.trim();
                
                if (commentText) {
                    // Dapatkan form data
                    const formData = new FormData(this);
                    
                    // Kirim request AJAX untuk submit komentar
                    fetch('/komentar', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: formData,
                        credentials: 'same-origin'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Kosongkan input
                            commentInput.value = '';
                            
                            // Tambahkan komentar baru ke list
                            const commentsList = document.getElementById('comments-list-' + pengaduanId);
                            commentsList.innerHTML = ''; // Clear "no comments" message if exists
                            
                            // Buat elemen komentar
                            const commentDiv = document.createElement('div');
                            commentDiv.className = 'comment-item d-flex mb-3';
                            
                            // Avatar HTML
                            let avatarHtml = '';
                            if (data.comment.user.foto_profil) {
                                avatarHtml = `<img src="${data.comment.user.foto_profil}" alt="Avatar" class="rounded-circle" width="32" height="32">`;
                            } else {
                                avatarHtml = `<div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                                <i class="bi bi-person-fill text-white small"></i>
                                              </div>`;
                            }
                            
                            commentDiv.innerHTML = `
                                <div class="comment-avatar me-2">
                                    ${avatarHtml}
                                </div>
                                <div class="comment-content">
                                    <div class="d-flex justify-content-between">
                                        <strong class="me-2">${data.comment.user.nama}</strong>
                                        <small class="text-muted">${data.comment.tanggal}</small>
                                    </div>
                                    <p class="mb-0">${data.comment.isi_komentar}</p>
                                </div>
                            `;
                            
                            // Tambahkan komentar ke list
                            commentsList.prepend(commentDiv);
                            
                            // Update counter komentar
                            const commentCountSpan = pengaduanElement.querySelector(`.btn-comment[data-id="${pengaduanId}"] .comment-count`);
                            const currentCount = parseInt(commentCountSpan.textContent);
                            commentCountSpan.textContent = currentCount + 1;
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        }
        
        // Aktifkan tombol dukungan
        const supportBtn = pengaduanElement.querySelector('.btn-support');
        if (supportBtn) {
            supportBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const pengaduanId = this.getAttribute('data-id');
                const counterSpan = this.querySelector('.support-count');
                
                // Kirim request AJAX untuk memberikan dukungan
                fetch('/dukungan/' + pengaduanId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update counter dan style
                        counterSpan.textContent = data.count;
                        if (data.supported) {
                            this.classList.remove('btn-outline-success');
                            this.classList.add('btn-success');
                        } else {
                            this.classList.remove('btn-success');
                            this.classList.add('btn-outline-success');
                        }
                    } else if (data.error === 'unauthenticated') {
                        // Redirect ke halaman login
                        window.location.href = '/login';
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        }
        
       const tanggapanBtn = pengaduanElement.querySelector('.btn-tanggapan');
if (tanggapanBtn) {
    tanggapanBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const pengaduanId = this.getAttribute('data-id');
        const tanggapanSection = document.getElementById('tanggapan-section-' + pengaduanId);
        
        if (tanggapanSection.style.display === 'none' || tanggapanSection.style.display === '') {
            tanggapanSection.style.display = 'block';
            
            // Hide comment section if it's open
            const commentSection = document.getElementById('comment-section-' + pengaduanId);
            if (commentSection && commentSection.style.display === 'block') {
                commentSection.style.display = 'none';
            }
            
            // Load tanggapan content via AJAX
            const tanggapanContent = tanggapanSection.querySelector('.tanggapan-content');
            const loadingIndicator = tanggapanSection.querySelector('.loading-tanggapan');
            
            if (tanggapanContent && tanggapanContent.children.length === 0) {
                // Show loading indicator
                loadingIndicator.style.display = 'block';
                
                // Fetch tanggapan data
                fetch('/get-tanggapan/' + pengaduanId, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Hide loading indicator
                    loadingIndicator.style.display = 'none';
                    
                    if (data.success && data.tanggapan.length > 0) {
                        // Render tanggapan data
                        data.tanggapan.forEach(item => {
                            const tanggapanItem = document.createElement('div');
                            tanggapanItem.className = 'tanggapan-item mb-3';
                            
                            // Check if attachment exists and is an image
                            let attachmentHTML = '';
                            if (item.lampiran) {
                                const extension = item.lampiran.split('.').pop().toLowerCase();
                                const isImage = ['jpg', 'jpeg', 'png', 'gif'].includes(extension);
                                
                                if (isImage) {
                                    attachmentHTML = `
                                        <div class="attachment-thumbnail mt-2">
                                            <a href="/storage/${item.lampiran}" target="_blank" class="d-inline-block">
                                                <img src="/storage/${item.lampiran}" alt="Lampiran Tanggapan" class="img-thumbnail" style="max-height: 150px;">
                                            </a>
                                        </div>
                                    `;
                                } else {
                                    attachmentHTML = `
                                        <div class="attachment-thumbnail mt-2">
                                            <a href="/storage/${item.lampiran}" target="_blank" class="btn btn-sm btn-light border">
                                                <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran Tanggapan
                                            </a>
                                        </div>
                                    `;
                                }
                            }
                            
                            tanggapanItem.innerHTML = `
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-primary">Admin</span>
                                    <small class="text-muted">${item.created_at_formatted}</small>
                                </div>
                                <p class="mb-2">${item.isi_tanggapan}</p>
                                ${attachmentHTML}
                            `;
                            
                            tanggapanContent.appendChild(tanggapanItem);
                            
                            // Add separator except for last item
                            if (data.tanggapan.indexOf(item) < data.tanggapan.length - 1) {
                                const hr = document.createElement('hr');
                                tanggapanContent.appendChild(hr);
                            }
                        });
                    } else {
                        // No tanggapan found
                        tanggapanContent.innerHTML = `
                            <div class="text-center text-muted py-3">
                                <i class="bi bi-file-earmark-x me-1"></i> Belum ada tanggapan dari Admin
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error loading tanggapan:', error);
                    loadingIndicator.style.display = 'none';
                    tanggapanContent.innerHTML = `
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle me-1"></i> Gagal memuat tanggapan. Silakan coba lagi.
                        </div>
                    `;
                });
            }
        } else {
            tanggapanSection.style.display = 'none';
        }
    });
}
        // Aktifkan tombol share
        const shareBtn = pengaduanElement.querySelector('.btn-share');
        if (shareBtn) {
            shareBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const pengaduanId = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const text = this.getAttribute('data-text');
                const url = window.location.origin + '/pengaduan/' + pengaduanId;
                
                // Cek apakah Web Share API tersedia
                if (navigator.share) {
                    navigator.share({
                        title: title,
                        text: text,
                        url: url
                    })
                    .then(() => console.log('Shared successfully'))
                    .catch(error => {
                        console.error('Error sharing:', error);
                        showShareModal(pengaduanId);
                    });
                } else {
                    // Fallback ke modal jika Web Share API tidak tersedia
                    const shareModal = new bootstrap.Modal(document.getElementById('shareModal-' + pengaduanId));
                    shareModal.show();
                }
            });
        }
        
        // Aktifkan tombol salin link
        const copyBtn = pengaduanElement.querySelector('.btn-copy-link');
        if (copyBtn) {
            copyBtn.addEventListener('click', function() {
                const linkInput = this.closest('.modal-content').querySelector('.modal-share-link');
                linkInput.select();
                document.execCommand('copy');
                
                // Tampilkan pesan berhasil disalin
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-check me-1"></i> Tersalin!';
                this.classList.add('btn-success');
                
                // Reset tombol setelah 2 detik
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-success');
                }, 2000);
            });
        }
    }

            // Toggle classification selection
            document.querySelectorAll('.classification-item').forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all items
                    document.querySelectorAll('.classification-item').forEach(i => {
                        i.classList.remove('active');
                    });
                    // Add active class to clicked item
                    this.classList.add('active');
                    // Check the radio button
                    this.querySelector('input[type="radio"]').checked = true;
                });
            });
            
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // Display file name when selected
            document.querySelector('input[type="file"]').addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    let fileName = e.target.files[0].name;
                    document.querySelector('.file-upload-text').textContent = fileName;
                }
            });
            
            // Handle Comment Toggle
            const commentButtons = document.querySelectorAll('.btn-comment');
            commentButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pengaduanId = this.getAttribute('data-id');
                    const commentSection = document.getElementById('comment-section-' + pengaduanId);
                    
                    // Toggle comment form visibility
                    if (commentSection.style.display === 'none' || commentSection.style.display === '') {
                        commentSection.style.display = 'block';
                        // Focus on the comment input if user is logged in
                        const textarea = commentSection.querySelector('textarea');
                        if (textarea) {
                            textarea.focus();
                        }
                    } else {
                        commentSection.style.display = 'none';
                    }
                });
            });

            // Handle Support/Like Button
            const supportButtons = document.querySelectorAll('.btn-support');
            supportButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pengaduanId = this.getAttribute('data-id');
                    const counterSpan = this.querySelector('.support-count');
                    
                    // Send AJAX request to add support
                    fetch('/dukungan/' + pengaduanId, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        credentials: 'same-origin'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update counter and style
                            counterSpan.textContent = data.count;
                            if (data.supported) {
                                this.classList.remove('btn-outline-success');
                                this.classList.add('btn-success');
                            } else {
                                this.classList.remove('btn-success');
                                this.classList.add('btn-outline-success');
                            }
                        } else if (data.error === 'unauthenticated') {
                            // Redirect to login page
                            window.location.href = '{{ route("login") }}';
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });

 // Handle Tanggapan Toggle
 const tanggapanButtons = document.querySelectorAll('.btn-tanggapan');
tanggapanButtons.forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const pengaduanId = this.getAttribute('data-id');
        const tanggapanSection = document.getElementById('tanggapan-section-' + pengaduanId);
        
        // Toggle tanggapan section visibility
        if (tanggapanSection.style.display === 'none' || tanggapanSection.style.display === '') {
            tanggapanSection.style.display = 'block';
            
            // Hide comment section if it's open
            const commentSection = document.getElementById('comment-section-' + pengaduanId);
            if (commentSection && commentSection.style.display === 'block') {
                commentSection.style.display = 'none';
            }
        } else {
            tanggapanSection.style.display = 'none';
        }
    });
});

            // Handle Share Button with Web Share API if available
            const shareButtons = document.querySelectorAll('.btn-share');
            shareButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pengaduanId = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const text = this.getAttribute('data-text');
                    const url = window.location.origin + '/pengaduan/' + pengaduanId;
                    
                    // Check if Web Share API is available
                    if (navigator.share) {
                        navigator.share({
                            title: title,
                            text: text,
                            url: url
                        })
                        .then(() => console.log('Shared successfully'))
                        .catch(error => {
                            console.error('Error sharing:', error);
                            showShareModal(pengaduanId);
                        });
                    } else {
                        // Fallback to modal if Web Share API is not available
                        showShareModal(pengaduanId);
                    }
                });
            });

            // Function to show share modal for older browsers
            function showShareModal(pengaduanId) {
                const modal = document.getElementById('shareModal-' + pengaduanId);
                if (modal) {
                    const shareUrl = window.location.origin + '/pengaduan/' + pengaduanId;
                    modal.querySelector('.modal-share-link').value = shareUrl;
                    const bsModal = new bootstrap.Modal(modal);
                    bsModal.show();
                }
            }

            // Copy to clipboard functionality for share links
            const copyButtons = document.querySelectorAll('.btn-copy-link');
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const linkInput = this.closest('.modal-content').querySelector('.modal-share-link');
                    linkInput.select();
                    document.execCommand('copy');
                    
                    // Show copied message
                    const originalText = this.textContent;
                    this.textContent = 'Tersalin!';
                    this.classList.add('btn-success');
                    
                    // Reset button after 2 seconds
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.classList.remove('btn-success');
                    }, 2000);
                });
            });
            
            // Comment submission handling
            const commentForms = document.querySelectorAll('.comment-form');
            commentForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const pengaduanId = this.getAttribute('data-id');
                    const commentInput = this.querySelector('textarea[name="isi_komentar"]');
                    const commentText = commentInput.value.trim();
                    
                    if (commentText) {
                        // Get form data
                        const formData = new FormData(this);
                        
                        // Send AJAX request to submit comment
                        fetch('/komentar', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: formData,
                            credentials: 'same-origin'
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Clear the input
                                commentInput.value = '';
                                
                                // Add the new comment to the list
                                const commentsList = document.getElementById('comments-list-' + pengaduanId);
                                const newComment = createCommentElement(data.comment);
                                commentsList.insertBefore(newComment, commentsList.firstChild);
                                
                                // Update the comment count
                                const commentCountSpan = document.querySelector(`.btn-comment[data-id="${pengaduanId}"] .comment-count`);
                                const currentCount = parseInt(commentCountSpan.textContent);
                                commentCountSpan.textContent = currentCount + 1;
                                
                                // Hide empty state message if it exists
                                const emptyMessage = commentsList.querySelector('.text-center.text-muted.py-3');
                                if (emptyMessage) {
                                    emptyMessage.remove();
                                }
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                });
            });

            function loadTanggapan(pengaduanId, tanggapanSection) {
    // Get content and loading elements
    const tanggapanContent = tanggapanSection.querySelector('.tanggapan-content');
    const loadingIndicator = tanggapanSection.querySelector('.loading-tanggapan');
    
    if (tanggapanContent && tanggapanContent.children.length === 0) {
        // Show loading indicator
        loadingIndicator.style.display = 'block';
        
        // Fetch tanggapan data
        fetch('/get-tanggapan/' + pengaduanId, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            // Hide loading indicator
            loadingIndicator.style.display = 'none';
            
            if (data.success && data.tanggapan && data.tanggapan.length > 0) {
                // Render tanggapan data
                data.tanggapan.forEach((item, index) => {
                    const tanggapanItem = document.createElement('div');
                    tanggapanItem.className = 'tanggapan-item mb-3';
                    
                    // Check if attachment exists and is an image
                    let attachmentHTML = '';
                    if (item.lampiran) {
                        const extension = item.lampiran.split('.').pop().toLowerCase();
                        const isImage = ['jpg', 'jpeg', 'png', 'gif'].includes(extension);
                        
                        if (isImage) {
                            attachmentHTML = `
                                <div class="attachment-thumbnail mt-2">
                                    <a href="/storage/${item.lampiran}" target="_blank" class="d-inline-block">
                                        <img src="/storage/${item.lampiran}" alt="Lampiran Tanggapan" class="img-thumbnail" style="max-height: 150px;">
                                    </a>
                                </div>
                            `;
                        } else {
                            attachmentHTML = `
                                <div class="attachment-thumbnail mt-2">
                                    <a href="/storage/${item.lampiran}" target="_blank" class="btn btn-sm btn-light border">
                                        <i class="bi bi-file-earmark me-1"></i> Lihat Lampiran Tanggapan
                                    </a>
                                </div>
                            `;
                        }
                    }
                    
                    tanggapanItem.innerHTML = `
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-primary">Admin</span>
                            <small class="text-muted">${item.created_at_formatted}</small>
                        </div>
                        <p class="mb-2">${item.isi_tanggapan}</p>
                        ${attachmentHTML}
                    `;
                    
                    tanggapanContent.appendChild(tanggapanItem);
                    
                    // Add separator except for last item
                    if (index < data.tanggapan.length - 1) {
                        const hr = document.createElement('hr');
                        tanggapanContent.appendChild(hr);
                    }
                });
            } else {
                // No tanggapan found
                tanggapanContent.innerHTML = `
                    <div class="text-center text-muted py-3">
                        <i class="bi bi-file-earmark-x me-1"></i> Belum ada tanggapan dari Admin
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error loading tanggapan:', error);
            loadingIndicator.style.display = 'none';
            tanggapanContent.innerHTML = `
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle me-1"></i> Gagal memuat tanggapan. Silakan coba lagi.
                </div>
            `;
        });
    }
}

// The main issue is within the activateComplaintFunctions function - modify the tanggapan button event handler
// Update the tanggapanBtn event listener in activateComplaintFunctions:
const tanggapanBtn = pengaduanElement.querySelector('.btn-tanggapan');
if (tanggapanBtn) {
    tanggapanBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const pengaduanId = this.getAttribute('data-id');
        const tanggapanSection = document.getElementById('tanggapan-section-' + pengaduanId);
        
        if (tanggapanSection.style.display === 'none' || tanggapanSection.style.display === '') {
            tanggapanSection.style.display = 'block';
            
            // Hide comment section if it's open
            const commentSection = document.getElementById('comment-section-' + pengaduanId);
            if (commentSection && commentSection.style.display === 'block') {
                commentSection.style.display = 'none';
            }
            
            // Load tanggapan content using the common function
            loadTanggapan(pengaduanId, tanggapanSection);
        } else {
            tanggapanSection.style.display = 'none';
        }
    });
}

// Update the existing tanggapan buttons too
document.addEventListener('DOMContentLoaded', function() {
    // Rest of your existing code...
    
    // Update the original tanggapan buttons handler to use the common function
    const tanggapanButtons = document.querySelectorAll('.btn-tanggapan');
    tanggapanButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const pengaduanId = this.getAttribute('data-id');
            const tanggapanSection = document.getElementById('tanggapan-section-' + pengaduanId);
            
            // Toggle tanggapan section visibility
            if (tanggapanSection.style.display === 'none' || tanggapanSection.style.display === '') {
                tanggapanSection.style.display = 'block';
                
                // Hide comment section if it's open
                const commentSection = document.getElementById('comment-section-' + pengaduanId);
                if (commentSection && commentSection.style.display === 'block') {
                    commentSection.style.display = 'none';
                }
                
                // Load tanggapan content using the common function
                loadTanggapan(pengaduanId, tanggapanSection);
            } else {
                tanggapanSection.style.display = 'none';
            }
        });
    });
});


            // Function to create a comment element
            function createCommentElement(comment) {
                const commentDiv = document.createElement('div');
                commentDiv.className = 'comment-item d-flex mb-3';
                
                // Create the comment HTML content
                let avatarHtml = '';
                if (comment.user.foto_profil) {
                    avatarHtml = `<img src="${comment.user.foto_profil}" alt="Avatar" class="rounded-circle" width="32" height="32">`;
                } else {
                    avatarHtml = `<div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="bi bi-person-fill text-white small"></i>
                                  </div>`;
                }
                
                commentDiv.innerHTML = `
                    <div class="comment-avatar me-2">
                        ${avatarHtml}
                    </div>
                    <div class="comment-content">
                        <div class="d-flex justify-content-between">
                            <strong class="me-2">${comment.user.nama}</strong>
                            <small class="text-muted">${comment.tanggal}</small>
                        </div>
                        <p class="mb-0">${comment.isi_komentar}</p>
                    </div>
                `;
                
                return commentDiv;
            }
        });
    </script>
</body>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
</html>