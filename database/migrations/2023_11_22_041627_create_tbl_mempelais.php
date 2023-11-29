<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblMempelais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mempelais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pesanan')->nullable();
            $table->foreign('id_pesanan')->references('id')->on('tbl_pesanans');
            $table->string('foto_sampul')->nullable();
            $table->string('foto_pria')->nullable();
            $table->string('foto_wanita')->nullable();
            $table->string('nama_ayah_pria')->nullable();
            $table->string('nama_ayah_wanita')->nullable();
            $table->string('nama_ibu_pria')->nullable();
            $table->string('nama_ibu_wanita')->nullable();
            $table->string('nama_panggilan_pria')->nullable();
            $table->string('nama_panggilan_wanita')->nullable();
            $table->string('nama_pria')->nullable();
            $table->string('nama_wanita')->nullable();
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
        Schema::dropIfExists('tbl_mempelais');
    }
}
