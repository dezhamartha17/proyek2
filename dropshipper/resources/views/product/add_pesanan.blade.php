@extends('layouts.admin-master')

@section('content')
<div class="container mt-5">
    <div id="content">
        <div class="content-header d-flex justify-content-between align-items-center">
            <h3>List Pesanan</h3>
            {{-- <button class="btn btn-warning"><a href="{{ route('barang.show')}}">Tambah Barang</a></button> --}}
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pesanan</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
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
                    if ($pesanan->status_barang === 'Payment Success') {
                            echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#prosesModal{$pesanan->id}'>Proses</button></td>";
                
                            // Modal untuk setiap pesanan
                            echo "<div class='modal fade' id='prosesModal{$pesanan->id}' tabindex='-1' role='dialog' aria-labelledby='prosesModalLabel{$pesanan->id}' aria-hidden='true'>";
                            echo "<div class='modal-dialog' role='document'>";
                            echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                            echo "<h5 class='modal-title' id='prosesModalLabel{$pesanan->id}'>Proses Pesanan</h5>";
                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                            echo "<div class='modal-body'>";
                            
                            // Isi modal dengan formulir pembayaran atau informasi lainnya
                            echo "<form id='bayarForm{$pesanan->id}' action='" . route('pesanan.proses') . "' method='post'>";
                            // Tambahkan elemen formulir yang dibutuhkan di sini
                            echo "<input type='hidden' name='_token' value='" . csrf_token() . "'>";
                            echo "<input type='hidden' name='pesanan_id' value='{$pesanan->id}'>";
                            echo "<div class='form-group'>";
                            echo "<label for='bayar' class='text-center d-flex align-items-center justify-content-center'>Apakah anda akan memproses pesanan ini?</label>";
                            echo "</div>";
                            // Tambahkan formulir pembayaran lainnya sesuai kebutuhan
                            
                            echo "<button type='submit' class='btn btn-success'>Ya, Proses</button>";
                            echo "</form>";
                
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
@endsection