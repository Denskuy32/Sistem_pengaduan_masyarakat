<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';

    protected $fillable = [
        'id_pengguna',
        'id_pengaduan',
        'pesan_notifikasi',
        'status',
    ];

    protected $dates = ['created_at', 'updated_at', 'tanggal_kirim'];

    public function pengguna()
    {
       return $this->belongsTo(pengguna::class, 'id_pengguna');
    }
        
    public function pengaduan()
    {
        return $this->belongsTo(pengaduan::class, 'id_pengaduan');
    }
}
