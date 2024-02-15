@extends('layouts.admin-master')

@section('content')

    <!-- Main Content -->
    <div class="container mt-5">
    <div id="content">
        <div class="content-header d-flex justify-content-between align-items-center">
            <h3>List Stok Barang</h3>
            <button class="btn btn-warning"><a href="{{ route('barang.show')}}">Tambah Barang</a></button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $imagePath = '/asset/img/';
                foreach ($barangs as $barang) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>"; // Nomor otomatis
                    echo "<td> <img src='" . $imagePath . $barang->url_img . "' alt='Image' style='aspect-ratio: 3/2; max-width:100px; object-fit: contain;' class='card-img-top'></td>";
                    echo "<td>" . $barang->nama_barang . "</td>";
                    echo "<td>" . $barang->jumlah_stok . "</td>";

                    echo "<td><a href='" . route('barang.edit', $barang->id) . "' class='btn btn-primary'>Edit</a></td>";

                    echo "<td>
                            <form action='" . route('barang.destroy', $barang->id) . "' method='post'>
                                " . csrf_field() . "
                                " . method_field('DELETE') . "
                                <button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
{{-- 
</div> --}}

@endsection