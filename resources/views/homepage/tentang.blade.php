<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tentang Repotly - Layanan dan Pengaduan Online Rakyat</title>
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
        
        /* About Hero */
        .about-hero {
            background: linear-gradient(135deg, var(--primary) 0%, #2c82c9 100%);
            color: white;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .about-hero-shape {
            position: absolute;
            z-index: 0;
        }
        
        .about-hero-shape-1 {
            top: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: morph 15s linear infinite alternate;
        }
        
        .about-hero-shape-2 {
            bottom: -50px;
            left: -50px;
            width: 250px;
            height: 250px;
            background-color: rgba(243, 167, 18, 0.1);
            border-radius: 58% 42% 33% 67% / 37% 45% 55% 63%;
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
        
        .about-hero h1 {
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 2.8rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 2;
        }
        
        .about-hero p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }
        
        /* About Content Section */
        .about-section {
            padding: 80px 0;
            position: relative;
        }
        
        .about-card {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 40px;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .about-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        
        .about-card:before {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: rgba(26, 77, 124, 0.05);
            border-radius: 50%;
            top: -50px;
            left: -50px;
            z-index: -1;
        }
        
        .about-card:after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background-color: rgba(243, 167, 18, 0.05);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            bottom: -50px;
            right: -50px;
            z-index: -1;
        }
        
        .about-card h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: 600;
            color: var(--primary);
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(26, 77, 124, 0.1);
        }
        
        .about-card p {
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--gray);
            margin-bottom: 20px;
        }
        
        .about-card ul {
            color: var(--gray);
            padding-left: 20px;
            margin-bottom: 20px;
        }
        
        .about-card ul li {
            margin-bottom: 10px;
            font-size: 1.05rem;
            line-height: 1.7;
        }
        
        /* Team Section */
        .team-section {
            padding: 80px 0;
            background-color: var(--light);
            position: relative;
        }
        
        .team-section:before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background-color: #f5f7fa;
            border-radius: 0 0 50% 50% / 0 0 100% 100%;
        }
        
        .team-section:after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background-color: #f5f7fa;
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
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
        
        .team-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            overflow: hidden;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .team-card-img {
            position: relative;
            overflow: hidden;
        }
        
        .team-card-img img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        
        .team-card:hover .team-card-img img {
            transform: scale(1.1);
        }
        
        .team-card-info {
            padding: 25px;
            text-align: center;
        }
        
        .team-card-info h4 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary);
        }
        
        .team-card-info p {
            color: var(--gray);
            margin-bottom: 15px;
        }
        
        .team-social {
            display: flex;
            justify-content: center;
        }
        
        .team-social a {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: rgba(26, 77, 124, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .team-social a:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
        }
        
        /* Partners Section */
        .partners-section {
            padding: 80px 0;
            position: relative;
        }
        
        .partner-logo {
            height: 80px;
            max-width: 100%;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.6;
            transition: all 0.4s ease;
            margin: 20px 0;
        }
        
        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }
        
        /* Timeline Section */
        .timeline-section {
            padding: 80px 0;
            background-color: var(--light);
            position: relative;
        }
        
        .timeline-section:before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background-color: #f5f7fa;
            border-radius: 0 0 50% 50% / 0 0 100% 100%;
        }
        
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px 0;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 3px;
            background-color: rgba(26, 77, 124, 0.2);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -1.5px;
        }
        
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: var(--white);
            border: 4px solid var(--primary);
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }
        
        .timeline-left {
            left: 0;
        }
        
        .timeline-left::after {
            right: -10px;
        }
        
        .timeline-right {
            left: 50%;
        }
        
        .timeline-right::after {
            left: -10px;
        }
        
        .timeline-content {
            padding: 20px;
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            position: relative;
            transition: all 0.3s ease;
        }
        
        .timeline-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .timeline-date {
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 5px;
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
            .about-hero {
                padding: 60px 0;
            }
            
            .about-hero h1 {
                font-size: 2rem;
            }
            
            .about-card {
                padding: 30px;
            }
            
            .team-card {
                margin-bottom: 30px;
            }
            
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-item::after {
                left: 20px;
            }
            
            .timeline-right {
                left: 0;
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
                        <a href="{{ route('home.lapor_baru') }}" class="nav-link">BERANDA</a>
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

    <!-- About Hero -->
    <section class="about-hero">
        <!-- Hero shapes -->
        <div class="about-hero-shape about-hero-shape-1"></div>
        <div class="about-hero-shape about-hero-shape-2"></div>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1>Tentang Repotly</h1>
                    <p>Repotly adalah platform layanan aspirasi dan pengaduan online yang menghubungkan rakyat dengan instansi pemerintah. Kami berkomitmen untuk menciptakan komunikasi yang efektif antara masyarakat dan pemerintah.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-card">
                        <h3>Sejarah Repotly</h3>
                        <p>Repotly didirikan pada tahun 2020 sebagai inisiatif untuk meningkatkan pelayanan publik dan mempermudah masyarakat dalam menyampaikan aspirasi serta pengaduan. Platform ini lahir dari kesadaran akan pentingnya partisipasi publik dalam pengawasan dan perbaikan layanan pemerintah.</p>
                        <p>Berawal dari sebuah proyek kecil yang dikembangkan oleh sekelompok anak muda yang peduli terhadap permasalahan layanan publik, Repotly kini telah tumbuh menjadi platform yang terintegrasi dengan berbagai instansi pemerintah di seluruh Indonesia.</p>
                        <p>Dalam perjalanannya, Repotly telah membantu menyelesaikan ribuan permasalahan masyarakat, mulai dari infrastruktur rusak, pelayanan publik yang tidak optimal, hingga permasalahan lingkungan dan sosial lainnya.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="about-card">
                        <h3>Visi</h3>
                        <p>Menjadi platform pengaduan publik terpercaya dan terintegrasi yang menjembatani komunikasi antara masyarakat dan pemerintah untuk menciptakan lingkungan hidup yang lebih baik dan pelayanan publik yang optimal.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-card">
                        <h3>Misi</h3>
                        <ul>
                            <li>Memfasilitasi masyarakat dalam menyampaikan aspirasi dan pengaduan secara mudah dan transparan.</li>
                            <li>Memastikan setiap laporan ditindaklanjuti dengan cepat dan responsif oleh instansi yang berwenang.</li>
                            <li>Menciptakan ekosistem partisipasi publik dalam pengawasan dan perbaikan layanan pemerintah.</li>
                            <li>Meningkatkan kualitas pelayanan publik melalui transparansi dan akuntabilitas.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="about-card">
                        <h3>Nilai-Nilai Kami</h3>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="text-center">
                                    <i class="bi bi-shield-check" style="font-size: 40px; color: var(--primary);"></i>
                                    <h5 class="mt-3 mb-2">Kepercayaan</h5>
                                    <p>Kami membangun kepercayaan melalui transparansi dan konsistensi dalam setiap tindakan.</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="text-center">
                                    <i class="bi bi-lightning-charge" style="font-size: 40px; color: var(--primary);"></i>
                                    <h5 class="mt-3 mb-2">Responsif</h5>
                                    <p>Kami berkomitmen untuk merespon setiap laporan dengan cepat dan tepat sasaran.</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="text-center">
                                    <i class="bi bi-people" style="font-size: 40px; color: var(--primary);"></i>
                                    <h5 class="mt-3 mb-2">Kolaborasi</h5>
                                    <p>Kami percaya pada kekuatan kolaborasi antara masyarakat dan pemerintah.</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="text-center">
                                    <i class="bi bi-arrow-repeat" style="font-size: 40px; color: var(--primary);"></i>
                                    <h5 class="mt-3 mb-2">Keberlanjutan</h5>
                                    <p>Kami bekerja untuk solusi yang berkelanjutan dan berdampak jangka panjang.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="container">
            <h2 class="section-title">Perjalanan Kami</h2>
            <div class="timeline">
                <div class="timeline-item timeline-left">
                    <div class="timeline-content">
                        <div class="timeline-date">2020</div>
                        <h4>Awal Mula</h4>
                        <p>Repotly diluncurkan sebagai platform pengaduan online skala kota dengan 10 instansi terintegrasi.</p>
                    </div>
                </div>
                <div class="timeline-item timeline-right">
                    <div class="timeline-content">
                        <div class="timeline-date">2021</div>
                        <h4>Ekspansi Regional</h4>
                        <p>Repotly berkembang menjadi platform regional dengan 50+ instansi terintegrasi di berbagai kota.</p>
                    </div>
                </div>
                <div class="timeline-item timeline-left">
                    <div class="timeline-content">
                        <div class="timeline-date">2022</div>
                        <h4>Inovasi Digital</h4>
                        <p>Peluncuran aplikasi mobile dan implementasi sistem AI untuk kategorisasi laporan secara otomatis.</p>
                    </div>
                </div>
                <div class="timeline-item timeline-right">
                    <div class="timeline-content">
                        <div class="timeline-date">2023</div>
                        <h4>Ekspansi Nasional</h4>
                        <p>Repotly menjangkau skala nasional dengan 100+ instansi pemerintah terintegrasi di seluruh Indonesia.</p>
                    </div>
                </div>
                <div class="timeline-item timeline-left">
                    <div class="timeline-content">
                        <div class="timeline-date">2023-2024</div>
                        <h4>Pengembangan Berkelanjutan</h4>
                        <p>Peningkatan fitur platform dan kerjasama dengan lebih banyak institusi untuk pelayanan terbaik.</p>
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