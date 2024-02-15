<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'jumlah_stok',
        'warna',
        'ukuran',
        'url_img',
        'deskripsi',
        'harga_satuan',
    ];
    protected $table = 'barang';
}
