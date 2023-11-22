<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAcaras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_acaras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pesanan')->nullable();
            $table->foreign('id_pesanan')->references('id')->on('tbl_pesanans');
            $table->string('nama_acara')->nullable();
            $table->string('foto_pria')->nullable();
            $table->string('foto_wanita')->nullable();
            $table->string('tanggal_akad')->nullable();
            $table->string('tanggal_syukuran')->nullable();
            $table->string('tanggal_resepsi')->nullable();
            $table->string('jam_akad')->nullable();
            $table->string('jam_syukuran')->nullable();
            $table->string('jam_resepsi')->nullable();
            $table->string('alamat_akad')->nullable();
            $table->string('alamat_syukuran')->nullable();
            $table->string('alamat_resepsi')->nullable();
            $table->string('lat_akad')->nullable();
            $table->string('long_akad')->nullable();
            $table->string('lat_syukuran')->nullable();
            $table->string('long_syukuran')->nullable();
            $table->string('lat_resepsi')->nullable();
            $table->string('long_resepsi')->nullable();
            $table->string('QR')->nullable();
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
        Schema::dropIfExists('tbl_acaras');
    }
}
