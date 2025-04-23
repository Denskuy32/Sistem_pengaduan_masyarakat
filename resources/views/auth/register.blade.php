<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Repotly</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1a5089;
            --primary-hover: #124072;
            --secondary: #f3a712;
            --light-bg: #f8f9fa;
            --text-dark: #212529;
        }
        
        body {
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            padding: 40px 0;
        }
        
        .container {
            max-width: 900px;
        }
        
        .register-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            background-color: white;
            transition: transform 0.3s ease;
        }
        
        .register-card:hover {
            transform: translateY(-5px);
        }
        
        .card-body {
            padding: 40px 30px;
            position: relative;
            overflow: hidden;
        }
        
        .form-control, .form-select {
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            margin-bottom: 5px;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(26, 80, 137, 0.15);
        }
        
        .form-label {
            font-weight: 500;
            font-size: 0.95rem;
            margin-bottom: 8px;
            color: #495057;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 12px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(26, 80, 137, 0.2);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .form-text {
            color: #6c757d;
            font-size: 0.85rem;
            margin-top: 5px;
        }
        
        .alert {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 25px;
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            border-left: 4px solid var(--primary);
        }
        
        .alert-danger ul {
            padding-left: 20px;
            margin-bottom: 0;
        }
        
        .logo-badge {
            display: inline-block;
            padding: 15px 25px;
            background-color: white;
            border-radius: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transform: rotate(-3deg);
            border: 2px solid var(--primary);
            position: relative;
            z-index: 2;
        }
        
        .logo-text {
            font-weight: 700;
            font-size: 2rem;
            color: var(--primary);
            letter-spacing: 1px;
        }
        
        .logo-text span {
            color: var(--secondary);
        }
        
        .card-decoration {
            position: absolute;
            width: 200px;
            height: 200px;
            background-color: var(--primary);
            opacity: 0.05;
            border-radius: 50%;
        }
        
        .decoration-1 {
            top: -100px;
            right: -100px;
        }
        
        .decoration-2 {
            bottom: -100px;
            left: -100px;
            background-color: var(--secondary);
        }
        
        .decoration-3 {
            top: 50%;
            right: -150px;
            width: 300px;
            height: 300px;
            background-color: var(--primary);
            opacity: 0.02;
        }
        
        .register-title {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        
        .register-title h2 {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
            font-size: 1.5rem;
        }
        
        .register-title p {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .register-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            margin: 15px auto 0;
            border-radius: 2px;
        }
        
        .mb-3 {
            margin-bottom: 20px !important;
        }
        
        .form-floating {
            position: relative;
        }
        
        .form-floating .bi {
            position: absolute;
            left: 15px;
            top: 18px;
            color: #6c757d;
            z-index: 5;
        }
        
        .form-floating .form-control {
            padding-left: 40px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
        }
        
        .form-row .mb-3 {
            flex: 1;
        }
        
        @media (max-width: 767px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo Badge -->
        <div class="text-center">
            <div class="logo-badge">
                <div class="logo-text">Repotly<span>!</span></div>
            </div>
        </div>
        
        <!-- Register Form -->
        <div class="register-card">
            <div class="card-body position-relative">
                <!-- Decorative elements -->
                <div class="card-decoration decoration-1"></div>
                <div class="card-decoration decoration-2"></div>
                <div class="card-decoration decoration-3"></div>
                
                <div class="register-title">
                    <h2>Buat Akun Baru</h2>
                    <p>Daftarkan diri Anda untuk mulai menggunakan layanan Repotly!</p>
                </div>
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <div class="form-floating">
                                <i class="bi bi-person-fill"></i>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required autofocus>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                            <div class="form-floating">
                                <i class="bi bi-card-text"></i>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK" required maxlength="16" minlength="16">
                            </div>
                            <div class="form-text">Masukkan 16 digit NIK Anda.</div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="form-floating">
                                <i class="bi bi-envelope-fill"></i>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nomor_hp" class="form-label">Nomor Handphone</label>
                            <div class="form-floating">
                                <i class="bi bi-phone-fill"></i>
                                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Masukkan nomor HP" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <div class="form-floating">
                            <i class="bi bi-geo-alt-fill"></i>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="form-floating">
                                <i class="bi bi-lock-fill"></i>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="form-text">Password minimal 8 karakter.</div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <div class="form-floating">
                                <i class="bi bi-shield-lock-fill"></i>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-person-plus-fill me-2"></i>Daftar Sekarang
                        </button>
                    </div>
                    
                    <div class="text-center">
                        <p class="mb-2">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none" style="color: var(--primary); font-weight: 500;">Masuk di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>