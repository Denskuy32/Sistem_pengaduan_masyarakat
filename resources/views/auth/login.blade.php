<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Repotly</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1a5089;
            --primary-hover: #124072;
            --secondary: #f3a712;
            --light-bg: #f5f7fa;
            --text-dark: #212529;
            --text-muted: #6c757d;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            max-width: 450px;
        }
        
        .login-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            background-color: white;
            transition: transform 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
        }
        
        .card-body {
            padding: 40px 30px;
            position: relative;
            overflow: hidden;
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
        
        .login-title {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        
        .login-title h2 {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
            font-size: 1.5rem;
        }
        
        .login-title p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }
        
        .login-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            margin: 15px auto 0;
            border-radius: 2px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            font-weight: 500;
            font-size: 0.95rem;
            margin-bottom: 8px;
            color: #495057;
            display: block;
        }
        
        .form-control {
            height: auto;
            padding: 12px 15px 12px 45px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(26, 80, 137, 0.15);
        }
        
        .input-icon-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .form-check-input {
            margin-right: 8px;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: var(--primary);
            border-color: var(--primary);
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .btn-login:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(26, 80, 137, 0.2);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            font-size: 0.95rem;
        }
        
        .login-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .login-footer a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
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
        
        .card-decoration {
            position: absolute;
            background-color: var(--primary);
            opacity: 0.05;
            border-radius: 50%;
        }
        
        .decoration-1 {
            width: 200px;
            height: 200px;
            top: -100px;
            right: -100px;
        }
        
        .decoration-2 {
            width: 150px;
            height: 150px;
            bottom: -50px;
            left: -50px;
            background-color: var(--secondary);
            opacity: 0.05;
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
        
        <!-- Login Card -->
        <div class="login-card">
            <div class="card-body">
                <!-- Decorative elements -->
                <div class="card-decoration decoration-1"></div>
                <div class="card-decoration decoration-2"></div>
                
                <!-- Login Title -->
                <div class="login-title">
                    <h2>Selamat Datang Kembali</h2>
                    <p>Masukkan kredensial Anda untuk akses ke akun</p>
                </div>
                
                <!-- Error Alert -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-icon-wrapper">
                            <i class="bi bi-envelope-fill input-icon"></i>
                            <input type="email" class="form-control" id="email" name="email" 
                                value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-icon-wrapper">
                            <i class="bi bi-lock-fill input-icon"></i>
                            <input type="password" class="form-control" id="password" 
                                name="password" placeholder="••••••••" required>
                        </div>
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="remember-me">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    
                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </button>
                    
                    <!-- Register Link -->
                    <div class="login-footer">
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Repotly</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1a5089;
            --primary-hover: #124072;
            --secondary: #f3a712;
            --light-bg: #f5f7fa;
            --text-dark: #212529;
            --text-muted: #6c757d;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            max-width: 450px;
        }
        
        .login-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            background-color: white;
            transition: transform 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
        }
        
        .card-body {
            padding: 40px 30px;
            position: relative;
            overflow: hidden;
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
        
        .login-title {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        
        .login-title h2 {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
            font-size: 1.5rem;
        }
        
        .login-title p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }
        
        .login-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            margin: 15px auto 0;
            border-radius: 2px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            font-weight: 500;
            font-size: 0.95rem;
            margin-bottom: 8px;
            color: #495057;
            display: block;
        }
        
        .form-control {
            height: auto;
            padding: 12px 15px 12px 45px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(26, 80, 137, 0.15);
        }
        
        .input-icon-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1.1rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .form-check-input {
            margin-right: 8px;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: var(--primary);
            border-color: var(--primary);
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .btn-login:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(26, 80, 137, 0.2);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            font-size: 0.95rem;
        }
        
        .login-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .login-footer a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
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
        
        .card-decoration {
            position: absolute;
            background-color: var(--primary);
            opacity: 0.05;
            border-radius: 50%;
        }
        
        .decoration-1 {
            width: 200px;
            height: 200px;
            top: -100px;
            right: -100px;
        }
        
        .decoration-2 {
            width: 150px;
            height: 150px;
            bottom: -50px;
            left: -50px;
            background-color: var(--secondary);
            opacity: 0.05;
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
        
        <!-- Login Card -->
        <div class="login-card">
            <div class="card-body">
                <!-- Decorative elements -->
                <div class="card-decoration decoration-1"></div>
                <div class="card-decoration decoration-2"></div>
                
                <!-- Login Title -->
                <div class="login-title">
                    <h2>Selamat Datang Kembali</h2>
                    <p>Masukkan kredensial Anda untuk akses ke akun</p>
                </div>
                
                <!-- Error Alert -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-icon-wrapper">
                            <i class="bi bi-envelope-fill input-icon"></i>
                            <input type="email" class="form-control" id="email" name="email" 
                                value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-icon-wrapper">
                            <i class="bi bi-lock-fill input-icon"></i>
                            <input type="password" class="form-control" id="password" 
                                name="password" placeholder="••••••••" required>
                        </div>
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="remember-me">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    
                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                    </button>
                    
                    <!-- Register Link -->
                    <div class="login-footer">
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
</html>