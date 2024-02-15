<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'enail_pemesan',
        'nohp_pemesan',
        'id_barang',
        'ukuran',
        'jumlah_pesanan',
        'jumlah_bayar',
        'total_dibayarkan',
        'warna',
        'alamat',
        'keterangan',
        'status_barang',
    ];

    protected $table = 'pesanan_tables';
}
