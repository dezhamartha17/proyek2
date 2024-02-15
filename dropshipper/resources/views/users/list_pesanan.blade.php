@extends('layouts.app-master')

@section('content')
    <!-- Main Content -->
    <div class="container mt-5">
        <div id="content">
            <div class="content-header d-flex justify-content-between align-items-center">
                <h3>List Pesanan</h3>
                <button class="btn btn-warning"><a href="{{ route('home.index')}}">TambahPesanan</a></button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Tagihan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $imagePath = '/asset/img/';
                    foreach ($pesanans as $pesanan) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>"; 
                        echo "<td> <img src='" . $imagePath . $pesanan->url_img . "' alt='Image' style='aspect-ratio: 3/2; max-width:100px; object-fit: contain;' class='card-img-top'></td>";
                        echo "<td>" . $pesanan->nama_barang . "</td>";
                        echo "<td>" . $pesanan->jumlah_bayar . "</td>";
                        echo "<td>" . $pesanan->status_barang . "</td>";
                        
                        if ($pesanan->status_barang === 'Menunggu Pembayaran') {
                            echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#bayarModal{$pesanan->id}'>Bayar</button></td>";
                
                            // Modal untuk setiap pesanan
                            echo "<div class='modal fade' id='bayarModal{$pesanan->id}' tabindex='-1' role='dialog' aria-labelledby='bayarModalLabel{$pesanan->id}' aria-hidden='true'>";
                            echo "<div class='modal-dialog' role='document'>";
                            echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                            echo "<h5 class='modal-title' id='bayarModalLabel{$pesanan->id}'>Bayar Pesanan</h5>";
                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                            echo "<div class='modal-body'>";
                            
                            // Isi modal dengan formulir pembayaran atau informasi lainnya
                            echo "<form id='bayarForm{$pesanan->id}' action='" . route('pesanan.bayar') . "' method='post'>";
                            // Tambahkan elemen formulir yang dibutuhkan di sini
                            echo "<input type='hidden' name='_token' value='" . csrf_token() . "'>";
                            echo "<input type='hidden' name='pesanan_id' value='{$pesanan->id}'>";
                            echo "<div class='form-group'>";
                            echo "<label for='bayar' class='text-center d-flex align-items-center justify-content-center'>Jumlah Tagihan</label>";
                            echo "<input type='text' class='mx-auto d-block' name='jumlah_bayar' value='{$pesanan->jumlah_bayar}' disabled>";
                            // echo "<label for='gambar_pesanan'>Foto Pembayaran</label><br>";
                            echo "<img src='" . asset('assets/img/qris.png') . "' alt='Foto Pesanan' class='img-fluid mx-auto d-block'>";
                            echo "<label for='bayar' class='text-center d-flex align-items-center justify-content-center'>Total Dibayarkan</label>";
                            echo "<input type='text' class='mx-auto d-block' name='total_dibayarkan'>";
                            echo "</div>";
                            // Tambahkan formulir pembayaran lainnya sesuai kebutuhan
                            
                            echo "<button type='submit' class='btn btn-success'>Selesai</button>";
                            echo "</form>";
                
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        } elseif ($pesanan->status_barang === 'Dalam Proses') {
                            echo "<td><button class='btn btn-success' data-toggle='modal' data-target='#selesaiModal{$pesanan->id}'>Selesai</button></td>";
                
                            // Modal untuk setiap pesanan
                            echo "<div class='modal fade' id='selesaiModal{$pesanan->id}' tabindex='-1' role='dialog' aria-labelledby='selesaiModalLabel{$pesanan->id}' aria-hidden='true'>";
                            echo "<div class='modal-dialog' role='document'>";
                            echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                            echo "<h5 class='modal-title' id='selesaiModalLabel{$pesanan->id}'>Bayar Pesanan</h5>";
                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                            echo "<div class='modal-body'>";
                            
                            // Isi modal dengan formulir pembayaran atau informasi lainnya
                            echo "<form id='bayarForm{$pesanan->id}' action='" . route('pesanan.selesai') . "' method='post'>";
                            // Tambahkan elemen formulir yang dibutuhkan di sini
                            echo "<input type='hidden' name='_token' value='" . csrf_token() . "'>";
                            echo "<input type='hidden' name='pesanan_id' value='{$pesanan->id}'>";
                            echo "<div class='form-group'>";
                            echo "<label for='bayar' class='text-center d-flex align-items-center justify-content-center'>Pesanan Telah Diterima ?</label>";
                            // echo "<input type='text' class='mx-auto d-block' name='jumlah_bayar' value='{$pesanan->jumlah_bayar}' disabled>";
                            // echo "<label for='gambar_pesanan'>Foto Pembayaran</label><br>";
                            // echo "<img src='" . asset('assets/img/qris.png') . "' alt='Foto Pesanan' class='img-fluid mx-auto d-block'>";
                            // echo "<label for='bayar' class='text-center d-flex align-items-center justify-content-center'>Total Dibayarkan</label>";
                            // echo "<input type='text' class='mx-auto d-block' name='total_dibayarkan'>";
                            echo "</div>";
                            // Tambahkan formulir pembayaran lainnya sesuai kebutuhan
                            
                            echo "<button type='submit' class='btn btn-success'>Ya, Selesai</button>";
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
    <div class="container-fluid">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-md-4 py-5" style="background-color: #e8e8e8">
                <div class="container">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Customer Service</h5>
                            <p class="card-text">Our customer service team is available 24/7 to assist you with any inquiries or issues you may have.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Email: support@example.com</li>
                                <li class="list-group-item">Phone: (123) 456-7890</li>
                                <li class="list-group-item">Live Chat: Available</li>
                            </ul>
                            <button type="button" class="btn btn-primary rounded"><i class="fab fa-whatsapp"></i> Hubungi Kami</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Us Section -->
            <div class="col-md-4 py-5" style="background-color: #e8e8e8">
                <div class="container">
                    <h2 class="text-center">About Us</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet metus auctor, tempus ligula eu, vehicula odio. In hac habitasse platea dictumst.</p>
                </div>
            </div>
    
            <!-- Contact Us Section -->
            <div class="col-md-4 py-5" style="background-color: #e8e8e8">
                <div class="container">
                    <h2 class="text-center">Contact Us</h2>
                    <p class="text-center">Email: info@example.com</p>
                    <p class="text-center">Phone: (123) 456-7890</p>
                </div>
            </div>
    
        </div>
    </div>
    
    <section class="contact-section bg-white py-5">
        <div class="container">
            <h2 class="text-center">Contact Us</h2>
            <p class="text-center">Email: info@example.com</p>
            <p class="text-center">Phone: (123) 456-7890</p>
        </div>
    </section>

<!-- Pastikan jQuery dan Bootstrap JavaScript terhubung dengan baik -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    // Gunakan jQuery untuk menangani tindakan tombol pesan
    $(document).ready(function(){
        $("#showFormBtn").click(function(){
            $("#orderForm").show();
        });
    });
</script>
<!-- Atau gunakan Bootstrap JavaScript dari CDN -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script> -->
@endsection