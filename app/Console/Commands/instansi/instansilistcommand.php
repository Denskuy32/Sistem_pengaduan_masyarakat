<?php

namespace App\Console\Commands\instansi;

use Illuminate\Console\Command;
use App\Models\instansi;

class instansilistcommand extends Command
{
    protected $signature = 'instansi:list';
    protected $description = 'List all instansi data';

    public function handle()
    {
        $instansi = instansi::all();

        if ($instansi->isEmpty()) {
            $this->info("No instansi found.");
        } else {
            foreach ($instansi as $order) {
                $this->info("ID: " . $order->id_instansi);
                $this->info("Nama instansi: " . $order->nama_instansi);
                $this->info("Kontak: " . $order->kontak);
                $this->info("Alamat: " . $order->alamat);
                $this->info("------------------------------");
            }
        }
    }
}
