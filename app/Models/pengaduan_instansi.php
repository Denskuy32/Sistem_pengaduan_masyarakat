<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan_instansi extends Model
{
    use HasFactory;

    protected $table = 'pengaduan_instansi'; 
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_pengaduan',
        'id_instansi'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(pengaduan::class, 'id_pengaduan'); 
    }

    public function instansi()
    {
        return $this->belongsTo(instansi::class, 'id_instansi'); 
    }
}
