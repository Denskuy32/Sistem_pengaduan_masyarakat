<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Berhasil - Sistem Pengaduan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .success-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px 20px;
            margin: 50px auto;
            max-width: 600px;
            text-align: center;
        }
        .success-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 20px;
        }
        .btn-home {
            background-color: #1a4d7c;
            color: white;
            border: none;
        }
        .btn-home:hover {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-container">
            <div class="success-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </div>
            <h3 class="mb-4">Pengaduan Berhasil Terkirim!</h3>
            <p class="mb-4">Terima kasih telah memberikan laporan Anda. Pengaduan Anda telah kami terima dan akan segera diproses oleh tim kami.</p>
            <p class="mb-4">Nomor Pengaduan: <strong>{{ session('pengaduan_id', 'PGD-' . date('YmdHis')) }}</strong></p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('home.lapor') }}" class="btn btn-outline-secondary">Buat Pengaduan Lagi</a>
                <a href="{{ route('home') }}" class="btn btn-home">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>