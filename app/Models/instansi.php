<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instansi extends Model
{
    use HasFactory;

    protected $table = 'instansi';
    protected $primaryKey = 'id_instansi';

    protected $fillable = [
        'nama_instansi',
        'kontak',
        'alamat',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function pengaduan_instansi()
{
    return $this->hasMany(pengaduan_instansi::class, 'id_pengaduan', 'id_instansi');
}

}
