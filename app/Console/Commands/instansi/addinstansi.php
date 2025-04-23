<?php

namespace App\Console\Commands\instansi;

use Illuminate\Console\Command;
use App\Models\instansi;

class addinstansi extends Command
{
    protected $signature = 'instansi:add';
    protected $description = 'tambah instansi baru';

    public function handle() {
        $namainstansi = $this->ask('nama_instansi');
        $kontak = $this->ask('kontak');
        $alamat = $this->ask('alamat');

        instansi::create([
            'nama_instansi' => $namainstansi,
            'kontak' => $kontak,
            'alamat' => $alamat 
        ]);

        $this->info('instansi berhasil ditambahkan');
    }
}
