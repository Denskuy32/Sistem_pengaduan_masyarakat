<?php

namespace App\Console\Commands\instansi;

use Illuminate\Console\Command;
use App\Models\instansi;

class editinstansi extends Command
{
    protected $signature = 'instansi:edit {id}';
    protected $description = 'edit data instansi';

    public function handle()
    {
        $id = $this->argument('id');
        $instansi = instansi::find($id);

        if (!$instansi) {
            $this->error('instansi dengan ID tersebut tidak ditemukan.');
            return command::FAILURE;
        }

        $this->info("Data instansi saat ini:");
        $this->info("Nama instansi: {$instansi->nama_instansi}");
        $this->info("Kontak: {$instansi->kontak}");
        $this->info("alamat: {$instansi->alamat}");

        $nama_instansi = $this->ask('instansi baru (kosongkan untuk tetap sama)',$instansi->nama_instansi);
        $kontak = $this->ask('kontak baru (kosongkan untuk tetap sama)',$instansi->kontak);
        $alamat = $this->ask('alamat baru (kosongkan untuk tetap sama)',$instansi->alamat);

        $instansi->nama_instansi = $nama_instansi;
        $instansi->kontak = $kontak;
        $instansi->alamat = $alamat;

        $instansi->save();

        $this->info('Data instansi berhasil diperbarui.');
        return command::SUCCESS;
    }
}
