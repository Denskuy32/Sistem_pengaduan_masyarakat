<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\instansicontroller;
use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\komentarcontroller;
use App\Http\Controllers\notifikasicontroller;
use App\Http\Controllers\pengaduan_instansicontroller;
use App\Http\Controllers\pengaduancontroller;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tanggapancontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/instansi', [instansicontroller::class, 'index'])->name('instansi.index');
Route::get('/instansi/create', [instansicontroller::class, 'create'])->name('instansi.create');
Route::post('/instansi', [instansicontroller::class, 'store']);
Route::get('/instansi/{id}/edit', [instansicontroller::class, 'edit'])->name('instansi.edit');
Route::put('/instansi/{id}', [instansicontroller::class, 'update'])->name('instansi.update');
Route::resource('instansi', instansicontroller::class);
//pengguna
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::post('/pengguna', [penggunacontroller::class, 'store']);
Route::get('/pengguna/{id}/edit', [penggunacontroller::class, 'edit'])->name('pengguna.edit');
Route::put('/pengguna/{id}', [penggunacontroller::class, 'update'])->name('pengguna.update');
Route::resource('pengguna', penggunacontroller::class);
//kategori
Route::get('/kategori', [kategoricontroller::class, 'index']);
Route::get('/kategori/create', [kategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [kategoricontroller::class, 'store']);
Route::get('/kategori/{id}/edit', [kategoricontroller::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [kategoricontroller::class, 'update'])->name('kategori.update');
Route::resource('kategori', kategoricontroller::class);
//pengaduan_instansi
Route::get('/pengaduan_instansi', [pengaduan_instansicontroller::class, 'index'])->name('pengaduan_instansi.index');
Route::get('/pengaduan_instansi/create', [pengaduan_instansiController::class, 'create'])->name('pengaduan_instansi.create');
Route::post('/pengaduan_instansi', [pengaduan_instansicontroller::class, 'store']);
Route::get('/pengaduan_instansi/{id_pengaduan}/{id_instansi}/edit', [pengaduan_instansicontroller::class, 'edit'])->name('pengaduan_instansi.edit');
Route::put('/pengaduan_instansi/{id_pengaduan}/{id_instansi}', [pengaduan_instansicontroller::class, 'update'])->name('pengaduan_instansi.update');
Route::delete('/pengaduan_instansi/{id_pengaduan}/{id_instansi}', [pengaduan_instansicontroller::class, 'destroy'])->name('pengaduan_instansi.destroy');
//pengaduan
Route::get('/pengaduan', [pengaduancontroller::class, 'index'])->name('pengaduan.index');
Route::get('/pengaduan/create', [pengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [pengaduancontroller::class, 'store']);
Route::get('/pengaduan/{id}/edit', [pengaduancontroller::class, 'edit'])->name('pengaduan.edit');
Route::put('/pengaduan/{id}', [pengaduancontroller::class, 'update'])->name('pengaduan.update');
Route::put('/pengaduan/{id}/update-status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.update-status');
Route::post('/pengaduan/{id}/forward', [PengaduanController::class, 'forward'])->name('pengaduan.forward');
Route::post('/pengaduan/tanggapan', [PengaduanController::class, 'storeTanggapan'])->name('pengaduan.storeTanggapan');
Route::put('/pengaduan/tanggapan/{id}', [PengaduanController::class, 'updateTanggapan'])->name('tanggapan.update');
Route::delete('/pengaduan/tanggapan/{id}', [PengaduanController::class, 'destroyTanggapan'])->name('tanggapan.destroy');
Route::resource('pengaduan', pengaduancontroller::class);
//komentar
Route::get('/komentar', [komentarcontroller::class, 'index'])->name('komentar.index');
Route::get('/komentar/create', [komentarController::class, 'create'])->name('komentar.create');
Route::post('/komentar', [komentarcontroller::class, 'store']);
Route::get('/komentar/{id}/edit', [komentarcontroller::class, 'edit'])->name('komentar.edit');
Route::put('/komentar/{id}', [komentarcontroller::class, 'update'])->name('komentar.update');
Route::resource('komentar', komentarcontroller::class);
//notifikasi
Route::get('/notifikasi', [notifikasicontroller::class, 'index'])->name('notifikasi.index');
Route::get('/notifikasi/create', [notifikasiController::class, 'create'])->name('notifikasi.create');
Route::post('/notifikasi', [notifikasicontroller::class, 'store']);
Route::get('/notifikasi/{id}/edit', [notifikasicontroller::class, 'edit'])->name('notifikasi.edit');
Route::put('/notifikasi/{id}', [notifikasicontroller::class, 'update'])->name('notifikasi.update');
Route::resource('notifikasi', notifikasicontroller::class);
//tanggapan
Route::get('/tanggapan', [tanggapancontroller::class, 'index'])->name('tanggapan.index');
Route::get('/tanggapan/create', [tanggapanController::class, 'create'])->name('tanggapan.create');
Route::post('/tanggapan', [tanggapancontroller::class, 'store']);
Route::get('/tanggapan/{id}/edit', [tanggapancontroller::class, 'edit'])->name('tanggapan.edit');
Route::put('/tanggapan/{id}', [tanggapancontroller::class, 'update'])->name('tanggapan.update');
Route::resource('tanggapan', tanggapancontroller::class);

// Halaman beranda
Route::get('/', [HomeController::class, 'index'])->name('home');
// Routes untuk pengaduan, sekarang dengan HomeController
Route::get('/lapor', [HomeController::class, 'lapor'])->name('home.lapor');
Route::post('/lapor/submit', [HomeController::class, 'store'])->name('home.store');
Route::get('/lapor/success', [HomeController::class, 'success'])->name('home.success');

Route::get('/dashboard', [dashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/home', [HomeController::class, 'lapor'])->name('home');
    Route::get('/beranda', [HomeController::class, 'laporBaru'])->name('home.lapor_baru');
    Route::get('/load-more-complaints', [HomeController::class, 'loadMoreComplaints'])->name('load.more.complaints');
    Route::get('/tentang', function () {
        return view('homepage.tentang'); 
    })->name('tentang');
    

// Rute untuk komentar, dukungan, dan bagikan
Route::post('/komentar', [HomeController::class, 'storeKomentar'])->name('komentar.store');
Route::get('/tanggapan/{id}', [HomeController::class, 'getTanggapan'])->name('tanggapan.get');
Route::post('/dukungan/{id}', [HomeController::class, 'toggleDukungan'])->name('dukungan.toggle');
Route::get('/dukungan/{id}', [HomeController::class, 'showSupporters'])->name('dukungan.show');
Route::get('/bagikan/{id}', [HomeController::class, 'share'])->name('pengaduan.share');
    
    // Authentication routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Protected routes (require authentication)
    Route::middleware('auth')->group(function () {
        // Complaint submission
        Route::get('/lapor', [HomeController::class, 'lapor'])->name('home.lapor');
        Route::post('/lapor', [HomeController::class, 'store'])->name('home.store');
        Route::get('/sukses', [HomeController::class, 'success'])->name('home.success');
        
        // Profile routes
        Route::get('/profil', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profil/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profil/password', [ProfileController::class, 'showChangePasswordForm'])->name('profile.password');
        Route::put('/profil/password/update', [ProfileController::class, 'changePassword'])->name('profile.update.password');
    });