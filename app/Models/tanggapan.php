<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';

    protected $fillable = [
        'id_pengaduan',
        'isi_tanggapan',
        'lampiran',
    ];

    protected $dates = ['created_at', 'updated_at'];
        
    public function pengaduan()
    {
        return $this->belongsTo(pengaduan::class, 'id_pengaduan');
    }
}
