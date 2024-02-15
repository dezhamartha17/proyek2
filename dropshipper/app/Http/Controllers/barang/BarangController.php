<?php

namespace App\Http\Controllers\barang;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function show(){
        $activePage = 'stok';
        return view('product.add_barang', ['activePage' => $activePage]);
    }
    public function store(Request $request){

        $image = $request->file('url_img');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('asset/img'), $imageName);

        $product = Barang::create([
            'nama_barang' => $request->input('nama_barang'),
            'harga_satuan' => $request->input('harga_satuan'),
            'jumlah_stok' => $request->input('jumlah_stok'),
            'warna' => $request->input('warna'),
            'deskripsi' => $request->input('deskripsi'),
            'ukuran' => $request->input('ukuran'),
            'url_img' => $imageName
        ]);

        return redirect()->route('admin.show')->with('success', 'Product created successfully');
    }

    public function edit($id){
        $barang = Barang::find($id);
        $activePage = 'stok';
        return view('product.edit_barang', ['barang' => $barang, 'activePage' => $activePage]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'harga_satuan' => 'required|numeric',
            'jumlah_stok' => 'required|numeric',
            'warna' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'url_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $barang = Barang::findOrFail($id);

        $barang->nama_barang = $request->input('nama_barang');
        $barang->ukuran = $request->input('ukuran');
        $barang->harga_satuan = $request->input('harga_satuan');
        $barang->jumlah_stok = $request->input('jumlah_stok');
        $barang->warna = $request->input('warna');
        $barang->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('url_img')) {

            if (file_exists(public_path($barang->url_img))) {
                unlink(public_path($barang->url_img));
            }

            $imageName = time().'.'.$request->url_img->extension();  
            $request->url_img->move(public_path('path/to/your/image/'), $imageName);

            $barang->url_img = 'path/to/your/image/' . $imageName;
        }

        $barang->save();

        return redirect()->route('admin.show')->with('success', 'Data barang berhasil diupdate.');
    }

    public function destroy(Request $request)
    {
        $barang = Barang::where('id', $request->id)->first();

        if ($barang) {
            $gambarPath = 'asset/img/' . $barang->url_img;
        
            if (Storage::exists($gambarPath)) {
                Storage::delete($gambarPath);
            }
    
            $barang->delete();
    
            return redirect()->route('admin.show')->with('success', 'Barang berhasil dihapus');
        }
    
        return redirect()->route('admin.show')->with('error', 'Barang tidak ditemukan');
    }
}
