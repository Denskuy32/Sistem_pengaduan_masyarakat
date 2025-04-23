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
            overflow-x: hidden;
        }
        
        /* Header Styles */
        .header {
            background-color: var(--primary);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            color: white;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        
        .logo {
            height: 40px;
        }
        
        .nav-link {
            color: var(--white);
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
        
        .nav-link:hover {
            color: var(--secondary);
        }
        
        .nav-link:hover:after {
            width: 100%;
        }
        
        /* Main Banner */
        .main-banner {
            background: linear-gradient(135deg, var(--primary) 0%, #2c82c9 100%);
            color: white;
            padding: 100px 0 120px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        /* Shape decorations */
        .shape-divider {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        
        .shape-divider svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 60px;
        }
        
        .shape-divider .shape-fill {
            fill: #f5f7fa;
        }
        
        /* Banner shapes */
        .banner-shape {
            position: absolute;
            z-index: 1;
        }
        
        .banner-shape-1 {
            top: 20%;
            right: 5%;
            width: 300px;
            height: 300px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 43% 57% 70% 30% / 30% 43% 57% 70%;
            animation: morph 15s linear infinite alternate;
        }
        
        .banner-shape-2 {
            bottom: 15%;
            left: 5%;
            width: 200px;
            height: 200px;
            background-color: rgba(243, 167, 18, 0.1);
            border-radius: 59% 41% 31% 69% / 59% 41% 59% 41%;
            animation: morph 12s linear infinite alternate;
        }
        
        @keyframes morph {
            0% {
                border-radius: 40% 60% 60% 40% / 60% 30% 70% 40%;
            }
            100% {
                border-radius: 40% 60% 30% 70% / 50% 60% 40% 60%;
            }
        }
        
        .main-banner h1 {
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 2.8rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 2;
        }
        
        .main-banner p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }
        
        .banner-btn {
            background-color: var(--secondary);
            color: var(--dark);
            padding: 14px 28px;
            border: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin: 0 10px;
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 12px rgba(243, 167, 18, 0.3);
        }
        
        .banner-btn:hover {
            background-color: #e0990f;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            color: var(--dark);
        }
        
        .banner-btn.outline {
            background-color: transparent;
            border: 2px solid var(--white);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }
        
        .banner-btn.outline:hover {
            background-color: var(--white);
            color: var(--primary);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
        }
        
        /* Features Section */
        .features-section {
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
            font-weight: 700;
            color: var(--primary);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: var(--secondary);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .feature-card {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.05);
            padding: 40px 30px;
            text-align: center;
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }
        
        .feature-card:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background-color: rgba(243, 167, 18, 0.05);
            border-radius: 0 20px 0 100%;
            z-index: -1;
        }
        
        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            width: 90px;
            height: 90px;
            background-color: rgba(26, 77, 124, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            background-color: var(--primary);
        }
        
        .feature-icon i {
            font-size: 40px;
            color: var(--primary);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon i {
            color: var(--white);
        }
        
        .feature-card h3 {
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-weight: 600;
            color: var(--primary);
        }
        
        /* Floating shapes */
        .floating-shape {
            position: absolute;
            background-color: rgba(26, 77, 124, 0.05);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            z-index: 0;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            top: 50px;
            left: -150px;
            animation: float 8s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            bottom: 100px;
            right: -100px;
            background-color: rgba(243, 167, 18, 0.05);
            animation: float 12s ease-in-out infinite;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }
        
        /* Stats Section */
        .stats-section {
            background-color: var(--light);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .stats-section:before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background-color: #f5f7fa;
            border-radius: 0 0 50% 50% / 0 0 100% 100%;
        }
        
        .stats-section:after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background-color: #f5f7fa;
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
            display: inline-block;
            position: relative;
        }
        
        .stat-number:after {
            content: '';
            position: absolute;
            width: 40px;
            height: 3px;
            background-color: var(--secondary);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: var(--gray);
            font-weight: 500;
        }
        
        /* Process Section */
        .process-section {
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .process-connector {
            position: absolute;
            left: 50%;
            top: 200px;
            bottom: 200px;
            width: 2px;
            background-color: rgba(26, 77, 124, 0.1);
            z-index: 0;
            display: none;
        }
        
        @media (min-width: 992px) {
            .process-connector {
                display: block;
            }
        }
        
        .process-step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .process-step:hover {
            transform: translateY(-5px);
        }
        
        .step-number {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--secondary);
            min-width: 60px;
            position: relative;
        }
        
        .step-number:before {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            background-color: rgba(243, 167, 18, 0.1);
            border-radius: 50%;
            left: -10px;
            top: -5px;
            z-index: -1;
        }
        
        .step-content {
            background-color: white;
            border-radius: 15px;
            padding: 20px 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            flex: 1;
            transition: all 0.3s ease;
        }
        
        .process-step:hover .step-content {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .step-content h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--primary);
        }
        
        /* Testimonials */
        .testimonial-section {
            background-color: var(--light);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .testimonial-shape {
            position: absolute;
            z-index: 0;
        }
        
        .testimonial-shape-1 {
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: rgba(26, 77, 124, 0.05);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }
        
        .testimonial-shape-2 {
            bottom: -50px;
            left: -50px;
            width: 250px;
            height: 250px;
            background-color: rgba(243, 167, 18, 0.05);
            border-radius: 58% 42% 33% 67% / 37% 45% 55% 63%;
        }
        
        .testimonial-card {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 35px 30px;
            margin: 15px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            transform-style: preserve-3d;
            z-index: 1;
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px) rotateY(5deg);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        
        .testimonial-card:before {
            content: '\201C';
            font-size: 8rem;
            position: absolute;
            top: -15px;
            left: 20px;
            color: rgba(26, 77, 124, 0.05);
            font-family: serif;
            z-index: -1;
        }
        
        .testimonial-card:after {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: rgba(243, 167, 18, 0.05);
            border-radius: 50%;
            bottom: -50px;
            right: -50px;
            z-index: -1;
        }
        
        .testimonial-content {
            font-style: italic;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        
        .author-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
            border: 3px solid rgba(26, 77, 124, 0.1);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .author-info h5 {
            margin-bottom: 0;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary);
        }
        
        .author-info p {
            margin-bottom: 0;
            font-size: 0.9rem;
            color: var(--gray);
        }
        
        /* Call to Action */
        .cta-section {
            background: linear-gradient(135deg, var(--primary) 0%, #2c82c9 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-shape {
            position: absolute;
            z-index: 0;
        }
        
        .cta-shape-1 {
            top: -50px;
            left: 10%;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 30% 70% 50% 50% / 50% 50% 50% 50%;
            animation: float 8s ease-in-out infinite;
        }
        
        .cta-shape-2 {
            bottom: -50px;
            right: 10%;
            width: 150px;
            height: 150px;
            background-color: rgba(243, 167, 18, 0.1);
            border-radius: 60% 40% 50% 50% / 60% 50% 50% 40%;
            animation: float 10s ease-in-out infinite alternate;
        }
        
        .cta-section h2 {
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .cta-section p {
            position: relative;
            z-index: 1;
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--primary) 0%, #2c82c9 100%);
            color: white;
            padding: 70px 0 20px;
            position: relative;
            overflow: hidden;
        }
        
        .footer-shape {
            position: absolute;
            z-index: 0;
        }
        
        .footer-shape-1 {
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.03);
            border-radius: 0 0 0 100%;
        }
        
        .footer-shape-2 {
            bottom: 0;
            left: 0;
            width: 250px;
            height: 250px;
            background-color: rgba(243, 167, 18, 0.05);
            border-radius: 0 100% 0 0;
        }
        
        .footer h5, .footer h6 {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
            font-weight: 600;
            z-index: 1;
        }
        
        .footer h5:after, .footer h6:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--secondary);
            bottom: 0;
            left: 0;
        }
        
        .footer ul {
            position: relative;
            z-index: 1;
        }
        
        .footer ul li {
            margin-bottom: 12px;
        }
        
        .footer ul li a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
        }
        
        .footer ul li a:hover {
            color: var(--secondary);
            transform: translateX(5px);
        }
        
        .social-links {
            position: relative;
            z-index: 1;
        }
        
        .social-links a {
            color: white;
            margin-right: 15px;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .social-links a:hover {
            color: var(--primary);
            background-color: var(--secondary);
            transform: translateY(-5px);
        }
        
        /* App download images */
        .app-download {
            position: relative;
            z-index: 1;
        }
        
        .app-download img {
            max-width: 130px;
            filter: drop-shadow(0px 5px 10px rgba(0,0,0,0.1));
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        
        .app-download img:hover {
            transform: translateY(-5px) scale(1.05);
            filter: drop-shadow(0px 10px 20px rgba(0,0,0,0.2));
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-banner {
                padding: 60px 0 80px;
            }
            
            .main-banner h1 {
                font-size: 2rem;
            }
            
            .feature-card,
            .testimonial-card {
                margin-bottom: 30px;
            }
            
            .process-step {
                flex-direction: column;
            }
            
            .step-number {
                margin-bottom: 15px;
            }
            
            .shape-divider svg {
                height: 40px;
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
                    <div class="logo-text me-4" style="font-weight: 700; font-size: 1.5rem; color: var(--white);">
                        Repotly<span style="color: var(--secondary);">!</span>
                    </div>
                    <nav class="d-none d-md-flex">
                        <a href="{{ route('home.index') }}" class="nav-link">BERANDA</a>
                        <a href="{{ route('home.lapor') }}" class="nav-link">LAPORAN</a>
                        <a href="{{ route('tentang') }}" class="nav-link">TENTANG LAPOR!</a>
                    </nav>
                </div>
                <div class="d-flex align-items-center">
                    @auth
                        <a href="#" class="me-3 position-relative">
                            <i class="bi bi-bell fs-5" style="color: var(--white);"></i>
                        </a>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-white" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->foto_profil)
                                    <img src="{{ asset('storage/' . Auth::user()->foto_profil) }}" width="32" height="32" class="rounded-circle me-2">
                                @else
                                    <img src="{{ asset('images/profile.jpg') }}" width="32" height="32" class="rounded-circle me-2">
                                @endif
                                <span class="d-none d-md-inline">{{ Auth::user()->nama }}</span>
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
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-light btn-sm">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Banner with shapes -->
    <section class="main-banner">
        <!-- Blob shapes -->
        <div class="banner-shape banner-shape-1"></div>
        <div class="banner-shape banner-shape-2"></div>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1>Layanan Aspirasi dan Pengaduan Online Rakyat</h1>
                    <p>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang <br>untuk penanganan yang cepat dan terpadu</p>
                    <div class="mt-4">
                        <a href="{{ route('home.lapor') }}" class="banner-btn">
                            <i class="bi bi-megaphone me-2"></i> Laporkan Sekarang!
                        </a>
                    </div>
                </div>
            </div>
        </div>
        

    </section>

    <!-- Features Section with floating shapes -->
    <section class="features-section">
        <!-- Floating shapes -->
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="container">
            <h2 class="section-title">Keunggulan Repotly</h2>
            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3>Terpercaya</h3>
                        <p>Laporan Anda akan diproses dan ditindaklanjuti langsung oleh instansi yang berwenang.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <h3>Cepat & Responsif</h3>
                        <p>Setiap laporan akan diproses dengan cepat dan mendapatkan respon secara transparan.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3>Terukur</h3>
                        <p>Anda dapat memantau status dan perkembangan laporan yang telah disampaikan.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h3>Mobile Friendly</h3>
                        <p>Akses Repotly kapan saja dan di mana saja melalui website atau aplikasi mobile.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-chat-square-dots"></i>
                        </div>
                        <h3>Interaktif</h3>
                        <p>Dapatkan tanggapan dan diskusi langsung terkait laporan yang Anda sampaikan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section with curved shapes -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">10.453+</div>
                        <div class="stat-label">Laporan Diterima</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">9.217+</div>
                        <div class="stat-label">Laporan Ditindaklanjuti</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">155+</div>
                        <div class="stat-label">Instansi Terhubung</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number">8.729+</div>
                        <div class="stat-label">Pengguna Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section with connector -->
    <section class="process-section">
        <div class="process-connector"></div>
        <div class="container">
            <h2 class="section-title">Bagaimana Cara Kerjanya?</h2>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="process-step">
                        <div class="step-number">01</div>
                        <div class="step-content">
                            <h3>Buat Akun atau Login</h3>
                            <p>Daftar akun baru atau login jika sudah memiliki akun untuk dapat mengakses layanan Repotly.</p>
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">02</div>
                        <div class="step-content">
                            <h3>Sampaikan Laporan</h3>
                            <p>Isi formulir pengaduan dengan detail kejadian, lokasi, dan lampirkan bukti pendukung jika ada.</p>
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">03</div>
                        <div class="step-content">
                            <h3>Verifikasi Laporan</h3>
                            <p>Tim admin akan memverifikasi laporan Anda untuk memastikan keabsahan dan kelengkapan informasi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="process-step">
                        <div class="step-number">04</div>
                        <div class="step-content">
                            <h3>Penyaluran ke Instansi Terkait</h3>
                            <p>Laporan akan diteruskan ke instansi pemerintah yang berwenang untuk ditindaklanjuti.</p>
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">05</div>
                        <div class="step-content">
                            <h3>Pemrosesan dan Tindak Lanjut</h3>
                            <p>Instansi terkait akan memproses dan memberikan tindak lanjut terhadap laporan Anda.</p>
                        </div>
                    </div>
                    <div class="process-step">
                        <div class="step-number">06</div>
                        <div class="step-content">
                            <h3>Pantau Status Laporan</h3>
                            <p>Anda dapat memantau status dan perkembangan laporan melalui dashboard Repotly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials with shapes -->
    <section class="testimonial-section">
        <!-- Testimonial shapes -->
        <div class="testimonial-shape testimonial-shape-1"></div>
        <div class="testimonial-shape testimonial-shape-2"></div>
        
        <div class="container">
            <h2 class="section-title">Apa Kata Mereka?</h2>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>Berkat Repotly, jalan di depan rumah saya yang rusak parah akhirnya diperbaiki setelah laporan saya ditindaklanjuti. Responnya cepat dan hasilnya memuaskan!</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSx1JBQYbHMwJC2yWjhp0Uz8lufQneWpPAOug&s" alt="User 1" class="author-img">
                            <div class="author-info">
                                <h5>Budi Santoso</h5>
                                <p>Warga Sekupang</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>Platform yang sangat membantu untuk menyampaikan aspirasi masyarakat. Saya melaporkan masalah drainase dan dalam 2 minggu sudah ada tindakan dari Dinas PU.</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://i.pinimg.com/736x/3d/d4/d0/3dd4d0ebeef9a12a357e269d3b60492b.jpg" alt="User 2" class="author-img">
                            <div class="author-info">
                                <h5>Dewi Anggraini</h5>
                                <p>Warga Batam Center</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <p>Transparan dan akuntabel. Saya bisa memantau progress laporan sampai benar-benar selesai. Interface-nya juga user-friendly. Recommended!</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://i.pinimg.com/474x/eb/5d/09/eb5d09f051d690516566ae835d90a30a.jpg" alt="User 3" class="author-img">
                            <div class="author-info">
                                <h5>Arief Wicaksono</h5>
                                <p>Aktivis Sosial</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action with floating shapes -->
    <section class="cta-section">
        <!-- CTA shapes -->
        <div class="cta-shape cta-shape-1"></div>
        <div class="cta-shape cta-shape-2"></div>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>Siap Berkontribusi untuk Kota yang Lebih Baik?</h2>
                    <p>Sampaikan laporan atau aspirasi Anda sekarang dan jadilah bagian dari perubahan positif</p>
                    <div class="mt-4">
                        <a href="{{ route('home.lapor') }}" class="banner-btn">
                            <i class="bi bi-megaphone me-2"></i> Laporkan Sekarang!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer with shapes -->
    <footer class="footer">
        <!-- Footer shapes -->
        <div class="footer-shape footer-shape-1"></div>
        <div class="footer-shape footer-shape-2"></div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>Repotly</h5>
                    <p class="mb-2">Layanan Aspirasi dan Pengaduan Online Rakyat</p>
                    <p class="mb-0 small">Jl. Medan Merdeka Barat No. 10, Jakarta Pusat</p>
                    <p class="mb-0 small">Email: lapor@lapor.go.id</p>
                    <p class="mb-0 small">Telepon: (021) 1234567</p>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6>Tentang Kami</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#">Tentang Repotly</a></li>
                        <li class="mb-2"><a href="#">Kebijakan Privasi</a></li>
                        <li class="mb-2"><a href="#">Syarat dan Ketentuan</a></li>
                        <li class="mb-2"><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h6>Laporan</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#">Buat Laporan</a></li>
                        <li class="mb-2"><a href="#">Cek Status</a></li>
                        <li class="mb-2"><a href="#">Statistik</a></li>
                        <li class="mb-2"><a href="#">Arsip</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6>Ikuti Kami</h6>
                    <div class="social-links mb-3">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                    <h6>Unduh Aplikasi</h6>
                    <div class="d-flex app-download">
                        <a href="#" class="me-2">
                            <img src="{{ asset('images/google-play.png') }}" alt="Google Play" class="img-fluid">
                        </a>
                        <a href="#">
                            <img src="{{ asset('images/app-store.png') }}" alt="App Store" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="opacity: 0.1;">
            <div class="text-center">
                <p class="small mb-0">© 2023 Repotly - Layanan Aspirasi dan Pengaduan Online Rakyat. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>