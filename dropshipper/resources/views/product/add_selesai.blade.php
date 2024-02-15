@extends('layouts.admin-master')

@section('content')
<div class="container mt-5">
    <div id="content">
        <div class="content-header d-flex justify-content-between align-items-center">
            <h3>List Selesai</h3>
            <button class="btn btn-warning" disabled>Pendapatan : Rp. {{$pendapatan}}</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pesanan</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($pesanans as $pesanan) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>"; // Nomor otomatis
                    echo "<td>" . $pesanan->nama_pemesan. "</td>";
                    echo "<td>" . $pesanan->nama_barang . "</td>";
                    echo "<td>" . $pesanan->jumlah_pesanan . "</td>";
                    echo "<td>" . $pesanan->status_barang . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
@endsection