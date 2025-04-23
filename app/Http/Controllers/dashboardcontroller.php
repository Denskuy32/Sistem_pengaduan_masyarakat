<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class dashboardController extends Controller
{
    public function index()
    {
        // Total statistik
        $totalStatistik = [
            'pengguna' => Pengguna::count(),
            'pengaduan' => Pengaduan::count(),
            'tanggapan' => Tanggapan::count(),
            'kategori' => Kategori::count()
        ];

        // Status pengaduan
        $statusPengaduan = Pengaduan::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        // Pengaduan terbaru
        $recentPengaduan = Pengaduan::with(['pengguna', 'kategori'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Tren bulanan pengaduan
        $monthlyPengaduan = Pengaduan::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Kategori teratas
        $topKategori = Kategori::withCount('pengaduan')
            ->orderBy('pengaduan_count', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard.dashboard', [
            'totalPengguna' => $totalStatistik['pengguna'],
            'totalPengaduan' => $totalStatistik['pengaduan'],
            'totalTanggapan' => $totalStatistik['tanggapan'],
            'totalKategori' => $totalStatistik['kategori'],
            'statusPengaduan' => $statusPengaduan,
            'recentPengaduan' => $recentPengaduan,
            'monthlyPengaduan' => $monthlyPengaduan,
            'topKategori' => $topKategori,
        ]);
    }
}