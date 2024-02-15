@extends('layouts.admin-master')

@section('content')
<div id="content" style="height: 100vh; overflow-y: auto;">
<div class="container mt-5">
    <div class="content-header d-flex justify-content-between align-items-center">
        <h3>Tambah Stok Barang</h3>
        <button class="btn btn-warning"><a href="{{ route('admin.show')}}">Kembali</a></button>
    </div>
    <table class="table">
        <br>
    <form method="post" action="{{ route('barang.store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
            <label for="nama_barang">Nama Barang :</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Enter text">
        </div>
        <div class="form-group">
            <label for="ukuran">Ukuran :</label>
            <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Enter number">
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan :</label>
            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Enter number">
        </div>
        <div class="form-group">
            <label for="url_img">Foto Barang :</label>
            <input type="file" class="form-control-file" id="url_img" name="url_img">
        </div>
        <div class="form-group">
            <label for="jumlah_stok">Jumlah Stok :</label>
            <input type="number" class="form-control" id="jumlah_stok" name="jumlah_stok" placeholder="Enter text">
        </div>
        <div class="form-group">
            <label for="warna">Warna :</label>
            <input type="text" class="form-control" id="warna" name="warna" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi :</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</table>
</div>
</div>
@endsection