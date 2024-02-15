@extends('layouts.app-master')

@section('content')
        @guest
    {{-- <div class="bg-light p-5 rounded"> --}}
        <div class="image-container">
            <img src="/assets/img/banner.png" class="img-fluid banner" alt="Image 1">
            <button class="btn btn-primary centered-button blinking-button">Join us!</button>
          </div>
    {{-- </div> --}}
        @endguest
    <div class="bg-light p-5 rounded" style="margin-top:20px;">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        {{-- <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a> --}}
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>

    <div class="container md-12 p-5">
        <div class="row">
            <!-- Product 1 -->
            @foreach ($barangs as $barang)
                <div class="col-md-3">
                    <div class="card" data-toggle="modal" data-target="#barangModal-{{$barang->id}}">
                        <img src="{{ asset('asset/img/' . $barang->url_img)}}" alt="{{ $barang->nama_barang }}" style="aspect-ratio: 3/2; object-fit: contain;" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{$barang->nama_barang}}</h5>
                            <p class="text-menu">Harga Beli</p>
                            <p class="text-menu">Rp. {{$barang->harga_satuan}}</p>
                            <p class="text-menu">Harga Jual</p>
                            <p class="text-menu">Jumlah Stok</p>
                            <p class="text-menu"> {{$barang->jumlah_stok}} pcs</p>

                            <p class="text-menu">Belum ditentukan supplier</p>
                        </div>
                    </div>

                    <!-- Modal untuk setiap card -->
                    <div class="modal fade" id="barangModal-{{$barang->id}}" tabindex="-1" role="dialog" aria-labelledby="barangModalLabel-{{$barang->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="barangModalLabel-{{$barang->id}}">{{$barang->nama_barang}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <img src="{{ asset('asset/img/' . $barang->url_img)}}" alt="{{ $barang->nama_barang }}" style="aspect-ratio: 3/2; max-width:120px; object-fit: contain;" class="card-img-top mx-auto d-block" alt="Product Image">
                                    </div>
                                        <p>Deskripsi: {{$barang->deskripsi}}</p>
                                        <p>Harga Beli: Rp. {{$barang->harga_satuan}}</p>
                                        <p>Harga Jual: Rp. {{$barang->harga_jual}}</p>
                                        
                                        {{-- <button class="btn btn-primary" id="showFormBtn">Pesan</button> --}}

                                        
                                        <!-- Form Pemesanan (Default: Hidden) -->
                                        <form id="orderForm" method="post" action="{{ route('pesanan.store') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$barang->id}}">
                                            <div class="row">
                                                <!-- Bagian Kiri Form -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="namaPemesan">Nama Pemesan</label>
                                                        <input type="text" class="form-control" id="namaPemesan" name="nama_pemesan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nohp">No. Hp</label>
                                                        <input type="number" class="form-control" id="nohp" name="nohp_pemesan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ukuran">Ukuran</label>
                                                        <input type="text" class="form-control" id="ukuran" name="ukuran">
                                                    </div>
                                                </div>
                                        
                                                <!-- Bagian Kanan Form -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="warna">Warna</label>
                                                        <input type="text" class="form-control" id="warna" name="warna">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah_pesanan">Jumlah Pesanan</label>
                                                        <input type="number" class="form-control" id="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" name="jumlah_pesanan">
                                                        {{ $errors->first('jumlah_pesanan') }}
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <!-- Form Bagian Bawah -->
                                            <div class="form-group">
                                                <label for="alamatPengiriman">Alamat Pengiriman</label>
                                                <textarea class="form-control" id="alamatPengiriman" name="alamat"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                                            </div>
                                        <br>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Submit Pesanan</button>
                                            </div>
                                        </form>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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