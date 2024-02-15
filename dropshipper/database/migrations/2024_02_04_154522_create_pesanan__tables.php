<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_tables', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('enail_pemesan');
            $table->string('nohp_pemesan');
            $table->string('id_barang');
            $table->string('ukuran');
            $table->string('jumlah_pesanan');
            $table->string('jumlah_bayar');
            $table->string('total_dibayarkan')->nullable();
            $table->string('warna')->nullable();
            $table->string('alamat');
            $table->string('keterangan')->nullable();
            $table->string('status_barang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan__tables');
    }
};
