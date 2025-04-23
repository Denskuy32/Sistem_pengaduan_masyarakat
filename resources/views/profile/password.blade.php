<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password - Repotly</title>
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
        
        /* Password Specific Styles */
        .password-strength {
            height: 5px;
            border-radius: 5px;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        
        .password-feedback {
            font-size: 12px;
            margin-top: 8px;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
        }
        
        .password-container {
            position: relative;
        }
        
        .password-info {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .password-info h6 {
            color: var(--primary);
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .password-info ul {
            margin-bottom: 0;
            padding-left: 20px;
        }
        
        .password-info li {
            font-size: 13px;
            color: var(--gray);
            margin-bottom: 5px;
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
            <h2 class="page-title">Ubah Password</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Alert for success message -->
                    @if(session('success'))
                        <div class="alert alert-success mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- Alert for errors -->
                    @if($errors->any())
                        <div class="alert alert-danger mb-4">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Terdapat kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="custom-card">
                        <div class="card-header d-flex align-items-center">
                            <i class="bi bi-shield-lock me-2"></i>
                            <span>Ubah Password</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Password Saat Ini</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        <span class="password-toggle" onclick="togglePassword('current_password')">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="password" name="password" required onkeyup="checkPasswordStrength()">
                                        <span class="password-toggle" onclick="togglePassword('password')">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                    <div class="password-strength" id="passwordStrength"></div>
                                    <div class="password-feedback" id="passwordFeedback"></div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="password-info">
                                    <h6><i class="bi bi-info-circle me-2"></i>Ketentuan Password</h6>
                                    <ul>
                                        <li>Minimal 8 karakter</li>
                                        <li>Kombinasi huruf besar, huruf kecil, angka dan simbol membuat password lebih kuat</li>
                                        <li>Jangan menggunakan password yang mudah ditebak seperti tanggal lahir atau nama</li>
                                    </ul>
                                </div>
                                
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('profile.index') }}" class="btn btn-outline-custom">
                                        <i class="bi bi-arrow-left me-2"></i>Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary-custom">
                                        <i class="bi bi-shield-check me-2"></i>Perbarui Password
                                    </button>
                                </div>
                            </form>
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
                    <h5 class="mb-3">LAPOR!</h5>
                    <p class="mb-2">Layanan Aspirasi dan Pengaduan Online Rakyat</p>
                    <p class="mb-0 small">Jl. Medan Merdeka Barat No. 10, Jakarta Pusat</p>
                    <p class="mb-0 small">Email: lapor@gov.id</p>
                    <p class="mb-0 small">Telepon: (021) 1234567</p>
                </div>
                <div class="col-lg-2 mb-3">
                    <h6 class="mb-3">Tentang Kami</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Tentang LAPOR!</a></li>
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
                <p class="small mb-0">© 2023 LAPOR! - Layanan Aspirasi dan Pengaduan Online Rakyat. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.nextElementSibling.querySelector('i');
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }
        }
        
        // Check password strength
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrength');
            const feedback = document.getElementById('passwordFeedback');
            
            // Reset
            strengthBar.style.width = '0%';
            strengthBar.style.backgroundColor = '';
            feedback.textContent = '';
            
            if (password.length === 0) {
                return;
            }
            
            // Calculate strength
            let strength = 0;
            const regexes = [
                /[A-Z]/, // Uppercase letters
                /[a-z]/, // Lowercase letters
                /[0-9]/, // Numbers
                /[^A-Za-z0-9]/ // Special characters
            ];
            
            // Add strength for password length
            strength += Math.min(6, Math.floor(password.length / 3)) * 10;
            
            // Add strength for character variety
            regexes.forEach(regex => {
                if (regex.test(password)) {
                    strength += 10;
                }
            });
            
            // Max strength is 100
            strength = Math.min(100, strength);
            
            // Set the strength bar
            strengthBar.style.width = strength + '%';
            
            // Set color and feedback based on strength
            if (strength < 30) {
                strengthBar.style.backgroundColor = '#e74c3c';
                feedback.textContent = 'Password sangat lemah';
                feedback.style.color = '#e74c3c';
            } else if (strength < 60) {
                strengthBar.style.backgroundColor = '#f39c12';
                feedback.textContent = 'Password lemah';
                feedback.style.color = '#f39c12';
            } else if (strength < 80) {
                strengthBar.style.backgroundColor = '#3498db';
                feedback.textContent = 'Password sedang';
                feedback.style.color = '#3498db';
            } else {
                strengthBar.style.backgroundColor = '#2ecc71';
                feedback.textContent = 'Password kuat';
                feedback.style.color = '#2ecc71';
            }
        }
    </script>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password - Repotly</title>
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
        
        /* Password Specific Styles */
        .password-strength {
            height: 5px;
            border-radius: 5px;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        
        .password-feedback {
            font-size: 12px;
            margin-top: 8px;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
        }
        
        .password-container {
            position: relative;
        }
        
        .password-info {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .password-info h6 {
            color: var(--primary);
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .password-info ul {
            margin-bottom: 0;
            padding-left: 20px;
        }
        
        .password-info li {
            font-size: 13px;
            color: var(--gray);
            margin-bottom: 5px;
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
            <h2 class="page-title">Ubah Password</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <!-- Alert for success message -->
                    @if(session('success'))
                        <div class="alert alert-success mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- Alert for errors -->
                    @if($errors->any())
                        <div class="alert alert-danger mb-4">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Terdapat kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="custom-card">
                        <div class="card-header d-flex align-items-center">
                            <i class="bi bi-shield-lock me-2"></i>
                            <span>Ubah Password</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Password Saat Ini</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        <span class="password-toggle" onclick="togglePassword('current_password')">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="password" name="password" required onkeyup="checkPasswordStrength()">
                                        <span class="password-toggle" onclick="togglePassword('password')">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                    <div class="password-strength" id="passwordStrength"></div>
                                    <div class="password-feedback" id="passwordFeedback"></div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="password-info">
                                    <h6><i class="bi bi-info-circle me-2"></i>Ketentuan Password</h6>
                                    <ul>
                                        <li>Minimal 8 karakter</li>
                                        <li>Kombinasi huruf besar, huruf kecil, angka dan simbol membuat password lebih kuat</li>
                                        <li>Jangan menggunakan password yang mudah ditebak seperti tanggal lahir atau nama</li>
                                    </ul>
                                </div>
                                
                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('profile.index') }}" class="btn btn-outline-custom">
                                        <i class="bi bi-arrow-left me-2"></i>Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary-custom">
                                        <i class="bi bi-shield-check me-2"></i>Perbarui Password
                                    </button>
                                </div>
                            </form>
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
                    <h5 class="mb-3">LAPOR!</h5>
                    <p class="mb-2">Layanan Aspirasi dan Pengaduan Online Rakyat</p>
                    <p class="mb-0 small">Jl. Medan Merdeka Barat No. 10, Jakarta Pusat</p>
                    <p class="mb-0 small">Email: lapor@gov.id</p>
                    <p class="mb-0 small">Telepon: (021) 1234567</p>
                </div>
                <div class="col-lg-2 mb-3">
                    <h6 class="mb-3">Tentang Kami</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Tentang LAPOR!</a></li>
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
                <p class="small mb-0">© 2023 LAPOR! - Layanan Aspirasi dan Pengaduan Online Rakyat. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.nextElementSibling.querySelector('i');
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }
        }
        
        // Check password strength
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrength');
            const feedback = document.getElementById('passwordFeedback');
            
            // Reset
            strengthBar.style.width = '0%';
            strengthBar.style.backgroundColor = '';
            feedback.textContent = '';
            
            if (password.length === 0) {
                return;
            }
            
            // Calculate strength
            let strength = 0;
            const regexes = [
                /[A-Z]/, // Uppercase letters
                /[a-z]/, // Lowercase letters
                /[0-9]/, // Numbers
                /[^A-Za-z0-9]/ // Special characters
            ];
            
            // Add strength for password length
            strength += Math.min(6, Math.floor(password.length / 3)) * 10;
            
            // Add strength for character variety
            regexes.forEach(regex => {
                if (regex.test(password)) {
                    strength += 10;
                }
            });
            
            // Max strength is 100
            strength = Math.min(100, strength);
            
            // Set the strength bar
            strengthBar.style.width = strength + '%';
            
            // Set color and feedback based on strength
            if (strength < 30) {
                strengthBar.style.backgroundColor = '#e74c3c';
                feedback.textContent = 'Password sangat lemah';
                feedback.style.color = '#e74c3c';
            } else if (strength < 60) {
                strengthBar.style.backgroundColor = '#f39c12';
                feedback.textContent = 'Password lemah';
                feedback.style.color = '#f39c12';
            } else if (strength < 80) {
                strengthBar.style.backgroundColor = '#3498db';
                feedback.textContent = 'Password sedang';
                feedback.style.color = '#3498db';
            } else {
                strengthBar.style.backgroundColor = '#2ecc71';
                feedback.textContent = 'Password kuat';
                feedback.style.color = '#2ecc71';
            }
        }
    </script>
</body>
</html>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
