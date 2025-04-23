<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'id_pengguna',
        'id_kategori',
        'judul_pengaduan',
        'deskripsi',
        'lokasi',
        'lampiran',
        'status',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function pengguna()
    {
       return $this->belongsTo(pengguna::class, 'id_pengguna');
    }
        
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
    public function tanggapan()
    {
        return $this->belongsTo(tanggapan::class, 'id_tanggapan');
    }
    public function instansi()
    {
        return $this->belongsTo(instansi::class, 'id_instansi');
    }
    public function komentar()
    {
        return $this->belongsTo(komentar::class, 'id_komentar');
    }
}
