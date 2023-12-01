<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBukuTamus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_buku_tamus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pesanan')->nullable();
            $table->foreign('id_pesanan')->references('id')->on('tbl_pesanans');
            $table->string('nama_tamu')->nullable();
            $table->string('alamat_tamu')->nullable();
            $table->string('no_wa')->nullable();
            $table->enum('status', ['belum dikirim', 'terkirim'])->default('belum dikirim');
            $table->date('tanggal')->nullable();
            $table->string('kehadiran')->default('belum konfirmasi');
            $table->string('salam')->nullable();
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
        Schema::dropIfExists('tbl_buku_tamus');
    }
}
