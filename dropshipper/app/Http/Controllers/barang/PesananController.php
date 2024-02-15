<?php

namespace App\Http\Controllers\barang;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pesanan;
use Auth;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function store(Request $request){
        $user = Auth::user();
        $data_harga_barang = Barang::where('id',$request->id)->select('harga_satuan')->first();
        $jumlah_bayar = $request->jumlah_pesanan * $data_harga_barang->harga_satuan;

        // Ambil data barang berdasarkan id
        $barang = Barang::find($request->input('id'));

        // Hitung jumlah stok baru
        $jumlahStokBaru = $barang->jumlah_stok - $request->input('jumlah_pesanan');

        $request->validate([
            'jumlah_pesanan' => [
                'required',
                'integer',
                'min:1',
                'max:' . $barang->jumlah_stok, // Jumlah pesanan tidak boleh melebihi jumlah stok
            ],
        ]);
        
        // Update jumlah stok pada data barang
        $barang->update(['jumlah_stok' => $jumlahStokBaru]);
        // Simpan data ke database

        $order = Pesanan::create([
            'nama_pemesan' => $request->input('nama_pemesan'),
            'enail_pemesan' => $user->email,
            'nohp_pemesan' => $request->input('nohp_pemesan'),
            'id_barang' => $request->input('id'),
            'ukuran' => $request->input('ukuran'),
            'jumlah_pesanan' => $request->input('jumlah_pesanan'),
            'jumlah_bayar' => $jumlah_bayar,
            'warna' => $request->input('warna'),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
            'status_barang' => 'Menunggu Pembayaran'

        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('home.index')->with('success', 'Product created successfully');
    }   
    public function status(){
        $user = Auth::user();
        $pesanan = Pesanan::where('enail_pemesan', $user->email)
        ->join('barang', 'pesanan_tables.id_barang', '=', 'barang.id')
        ->select('pesanan_tables.*', 'barang.nama_barang', 'barang.url_img')
        ->get();
        $jumlahData = '0';
        return view('users.list_pesanan', ['pesanans' => $pesanan, 'jumlahData' => $jumlahData]);
    }

    public function bayar(Request $request){
        $data = Pesanan::findOrFail($request->pesanan_id);

        if ($data->jumlah_bayar == $request->total_dibayarkan) {
            $data->update([
                'status_barang' => 'Payment Success',
                'total_dibayarkan' => $request->input('total_dibayarkan'),
    
            ]);
        } else {
            return redirect()->route('pesanan.status')->with('gagal', 'Pembayaran tidak berhasil');
        }
        
        return redirect()->route('pesanan.status')->with('success', 'Product created successfully');
    }

    public function selesai(Request $request){
        $data = Pesanan::findOrFail($request->pesanan_id);
            $data->update([
                'status_barang' => 'Selesai',
            ]);

        return redirect()->route('pesanan.status')->with('success', 'Product created successfully');
    }

    public function proses(Request $request){
        $data = Pesanan::findOrFail($request->pesanan_id);
            $data->update([
                'status_barang' => 'Selesai',
            ]);

        return redirect()->route('admin.pesanan')->with('success', 'Product created successfully');
    }
}
?>