<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'stok', 'gambar', 'pengguna_id', 'koleksi_id'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function koleksi()
    {
        return $this->belongsTo(Koleksi::class);
    }

    public function detailPesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
