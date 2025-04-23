<?php

namespace App\Console\Commands\tanggapan;

use Illuminate\Console\Command;
use App\Models\tanggapan;

class addtanggapan extends Command
{
    protected $signature = 'tanggapan:add';
    protected $description = 'tambah tanggapan baru';

    public function handle() {
        $id_pengaduan = $this->ask('id_pengaduan');
        $id_pengguna = $this->ask('id_pengguna');
        $tanggal_tanggapan = $this->ask('tanggal_tanggapan');
        $isi_tanggapan = $this->ask('isi_tanggapan');

        tanggapan::create([
            'id_pengaduan' => $id_pengaduan,
            'id_pengguna' => $id_pengguna,
            'tanggal_tanggaan' => $tanggal_tanggapan,
            'isi_tanggapan' => $isi_tanggapan 
        ]);

        $this->info('tanggapan berhasil ditambahkan');
    }
}
