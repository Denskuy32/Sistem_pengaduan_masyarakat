<?php

namespace App\Console\Commands\instansi;

use Illuminate\Console\Command;
use App\Models\instansi;

class hapusinstansi extends Command
{
    protected $signature = 'instansi:hapus {id : ID instansi yang akan di hapus}';
    protected $description = 'menghapus instansi berdasarkan id';

    public function handle()
    {
        $id = $this->argument('id');

        $instansi = instansi::find($id);

        if ($instansi) {
            $instansi->delete();
            $this->info("instansi dengan ID $id berhasil dihapus.");
        } else {
            $this->error("instansi dengan ID $id tidak di temukan.");
        }
    }
}
