<?php

namespace App\Console\Commands\pengguna;

use Illuminate\Console\Command;
use App\Models\Pengguna;

class caripengguna extends Command
{
    protected $signature = 'pengguna:cari {search : Nama atau email pengguna yang ingin di cari}';
    protected $description = 'mencari pengguna berdasarkan nama atau email';

    public function handle()
    {
        $search = $this->argument('search');

        $pengguna = pengguna::Where('nama_lengkap', 'LIKE', "%$search%")
                            ->orWhere('email', 'LIKE', "%$search%")
                            ->orWhere('id_pengguna', 'LIKE', "%$search%")
                            ->get();

        if ($pengguna->isEmpty()) {
            $this->error("tidak di temukan pengguna dengan id pengguna atau nama atau email yang mengandung '$search'.");
        } else {
            $this->info("hasil pencarian untuk '$search':");
            $this->table(
                ['ID','Nik','Nama','Email','Nomor telepon','Alamat','Role','Created_at','Updated_at'],
                $pengguna->toArray()
            );
        }
    }
}
