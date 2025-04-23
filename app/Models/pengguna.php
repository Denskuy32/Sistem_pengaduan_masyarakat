<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class Pengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nama',
        'nik',
        'email',
        'password',
        'nomor_hp',
        'alamat',
        'foto_profil',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token', // Menyembunyikan token agar tidak bocor
    ];

    protected $casts = [
        'role' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
