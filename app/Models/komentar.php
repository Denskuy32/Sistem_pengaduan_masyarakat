<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';
    protected $primaryKey = 'id_komentar';

    protected $fillable = [
        'id_pengaduan',
        'id_pengguna',
        'isi_komentar',
        'tanggal_komentar',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function pengguna()
    {
       return $this->belongsTo(pengguna::class, 'id_pengguna');
    }
        
    public function pengaduan()
    {
        return $this->belongsTo(pengaduan::class, 'id_pengaduan');
    }
}
