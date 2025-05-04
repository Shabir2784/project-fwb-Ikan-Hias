<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama', 'email', 'password', 'telepon', 'role_id', 'email_terverifikasi',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_terverifikasi' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}


