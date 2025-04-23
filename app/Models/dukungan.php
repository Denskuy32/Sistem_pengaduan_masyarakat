<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dukungan extends Model
{
    use HasFactory;

    protected $table = 'dukungan';
    protected $primaryKey = 'id_dukungan';

    protected $fillable = [
        'id_pengaduan',
        'id_pengguna',
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
