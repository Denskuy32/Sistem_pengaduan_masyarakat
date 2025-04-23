<?php

namespace App\Console\Commands\instansi;

use App\Models\instansi;
use Illuminate\Console\Command;

class cariinstansi extends Command
{
    protected $signature = 'instansi:cari {search : id instansi yang ingin di cari}';
    protected $description = 'mencari instansi berdasarkan id';

    public function handle()
    {
        $search = $this->argument('search');

        $instansi = instansi::Where('id_instansi', 'LIKE', "%$search%")
                            ->orWhere('nama_instansi', 'LIKE', "%$search%")
                            ->orWhere('alamat', 'LIKE', "%$search%")
                            ->get();

        if ($instansi->isEmpty()) {
            $this->error("tidak di temukan instansi dengan id yang mengandung '$search'.");
        } else {
            $this->info("hasil pencarian untuk '$search':");
            $this->table(
                ['ID','nama_instansi','kontak','alamat','Created_at','Updated_at'],
                $instansi->toArray()
            );
        }
    }
}
