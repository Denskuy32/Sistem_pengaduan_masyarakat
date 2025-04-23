<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    protected $dates = ['created_at', 'updated_at'];

      // Relasi dengan Pengaduan
      public function pengaduan()
      {
          return $this->hasMany(Pengaduan::class, 'id_kategori', 'id_kategori');
      }
}
