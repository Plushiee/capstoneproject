<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPengunjungs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pengunjungs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pesanan');
            $table->foreign('id_pesanan')->references('id')->on('tbl_pesanans')->onDelete('cascade');
            $table->string('nama_pengunjung');
            $table->integer('jumlah_kunjungan')->default(1);
            $table->string('alamat_ip');
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
        Schema::dropIfExists('tbl_pengunjungs');
    }
}
