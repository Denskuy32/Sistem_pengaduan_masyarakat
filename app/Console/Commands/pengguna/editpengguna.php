<?php

namespace App\Console\Commands\pengguna;

use Illuminate\Console\Command;
use App\Models\pengguna;
use Illuminate\Support\Facades\Hash;

class Editpengguna extends Command
{
    protected $signature = 'pengguna:edit {id}';
    protected $description = 'edit data pengguna';

    public function handle()
    {
        $id = $this->argument('id');
        $pengguna = pengguna::find($id);

        if (!$pengguna) {
            $this->error('pengguna dengan ID tersebut tidak ditemukan.');
            return command::FAILURE;
        }

        $this->info("Data pengguna saat ini:");
        $this->info("Nama: {$pengguna->nama}");
        $this->info("Email: {$pengguna->email}");
        $this->info("Nomor Teleon: {$pengguna->nomor_telepon}");
        $this->info("Role: {$pengguna->role}");

        $nama = $this->ask('Nama baru (kosongkan untuk tetap sama)',$pengguna->nama);
        $email = $this->ask('Email baru (kosongkan untuk tetap sama)',$pengguna->email);
        $nomortelepon = $this->ask('Nomor Telepon baru (kosongkan untuk tetap sama)',$pengguna->nomor_telepon);
        $role = $this->choice('Role baru',['admin','penumpang'],$pengguna->role);
        $password = $this->secret('Password baru (kosongkan untuk tetap sama)');

        $pengguna->nama = $nama;
        $pengguna->email = $email;
        $pengguna->nomor_telepon = $nomortelepon;
        $pengguna->role = $role;

        if (!empty($password)) {
            $pengguna->password = Hash::make($password);
        }

        $pengguna->save();

        $this->info('Data pengguna berhasil diperbarui.');
        return command::SUCCESS;
    }
}
