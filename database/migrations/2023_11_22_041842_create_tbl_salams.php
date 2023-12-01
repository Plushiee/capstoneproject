<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSalams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_salams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_acara')->nullable();
            $table->foreign('id_acara')->references('id')->on('tbl_acaras');
            $table->date('tanggal_salam')->nullable();
            $table->string('nama_pengirim')->nullable();
            $table->string('isi_salam')->nullable();
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
        Schema::dropIfExists('tbl_salams');
    }
}