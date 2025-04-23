<?php

namespace App\Console\Commands\pengguna;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class addpengguna extends Command
{
    protected $signature = 'pengguna:add';
    protected $description = 'tambah pengguna baru';

    public function handle() {
        $nik = $this->ask('nik');
        $nama = $this->ask('nama_lengkap');
        $email = $this->ask('email');
        $nomorhp = $this->ask('nomor_hp');
        $alamat = $this->ask('alamat');
        $role = $this->choice('role',['Admin','masyarakat'],1);
        $password = $this->secret('Masukan password (minimal 8 karakter):');

        while (empty($password) || strlen($password) < 8) {
            $this->error('password harus minimal 8 karakter.');
            $password = $this->secret('masukan password (minimal 8 karakter):');
        }

        pengguna::create([
            'nik' => $nik,
            'nama_lengkap' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'password' => hash::make($password),
            'nomor_hp' => $nomorhp,
            'role' => $role 
        ]);

        $this->info('pengguna berhasil ditambahkan');
    }
}
