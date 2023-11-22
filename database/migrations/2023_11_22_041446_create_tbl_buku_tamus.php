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
            $table->unsignedBigInteger('id_acara')->nullable();
            $table->foreign('id_acara')->references('id')->on('tbl_acaras');
            $table->string('nama_tamu')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('hadir')->nullable();
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
