@extends('layouts.admin-master')

@section('content')
<div id="content" style="height: 100vh; overflow-y: auto;">
    <div class="container mt-5">
        <div class="content-header d-flex justify-content-between align-items-center">
            <h3>Edit Stok Barang</h3>
            <button class="btn btn-warning"><a href="{{ route('admin.show')}}">Kembali</a></button>
        </div>
        <table class="table">
            <br>
            <form method="post" action="{{ route('barang.update', $barang->id) }}" enctype="multipart/form-data">
                @method('PUT') <!-- Menambahkan method PUT untuk mengindikasikan bahwa ini adalah request update -->
                @csrf <!-- Menambahkan token CSRF -->

                <div class="form-group">
                    <label for="nama_barang">Nama Barang :</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}">
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran :</label>
                    <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ $barang->ukuran }}">
                </div>
                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan :</label>
                    <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ $barang->harga_satuan }}">
                </div>
                <div class="form-group">
                    <label for="url_img">Foto Barang :</label>
                    <input type="file" class="form-control-file" id="url_img" name="url_img">
                    <img src="{{ asset('path/to/your/image/' . $barang->url_img) }}" alt="Current Image" style="max-width: 200px; margin-top: 10px;">
                </div>
                <div class="form-group">
                    <label for="jumlah_stok">Jumlah Stok :</label>
                    <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" value="{{ $barang->jumlah_stok }}">
                </div>
                <div class="form-group">
                    <label for="warna">Warna :</label>
                    <input type="text" class="form-control" id="warna" name="warna" value="{{ $barang->warna }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi :</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $barang->deskripsi }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </table>
    </div>
</div>
@endsection
