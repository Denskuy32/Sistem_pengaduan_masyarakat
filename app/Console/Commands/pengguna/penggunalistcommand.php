<?php

namespace App\Console\Commands\pengguna;

use Illuminate\Console\Command;
use App\Models\Pengguna;

class penggunalistcommand extends Command
{
    protected $signature = 'pengguna:list';
    protected $description = 'List all pengguna data';

    public function handle()
    {
        $pengguna = pengguna::all();

        if ($pengguna->isEmpty()) {
            $this->info("No pengguna found.");
        } else {
            foreach ($pengguna as $user) {
                $this->info("ID: " . $user->id_pengguna);
                $this->info("Nik: " . $user->nik);
                $this->info("Nama_lengkap: " . $user->nama_lengkap);
                $this->info("Email: " . $user->email);
                $this->info("Nomor Telepon: " . $user->nomor_hp);
                $this->info("Alamat: " . $user->alamat);
                $this->info("Role: " . $user->role);
                $this->info("------------------------------");
            }
        }
    }
}
