<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        $barangs = Barang::all();
        $activePage = 'stok';
        return view('admin.dashboard', ['barangs' => $barangs, 'activePage' => $activePage]);
    }

    public function pesanan(){
        $pesanans = Pesanan::join('barang', 'pesanan_tables.id_barang', '=', 'barang.id')
        ->where('pesanan_tables.status_barang', '!=', 'Selesai')
        ->select('pesanan_tables.*', 'barang.nama_barang')
        ->get();
        $activePage = 'pesanan';
        return view('product.add_pesanan', ['pesanans' => $pesanans, 'activePage' => $activePage]);
    }

    public function selesai(){
        $pendapatan = Pesanan::where('status_barang', 'Selesai')->sum('jumlah_bayar');
        $pesanans = Pesanan::join('barang', 'pesanan_tables.id_barang', '=', 'barang.id')
        ->where('pesanan_tables.status_barang', '=', 'Selesai')
        ->select('pesanan_tables.*', 'barang.nama_barang')
        ->get();
        $activePage = 'selesai';
        return view('product.add_selesai', ['pesanans' => $pesanans, 'activePage' => $activePage, 'pendapatan' => $pendapatan]);
    }
}
