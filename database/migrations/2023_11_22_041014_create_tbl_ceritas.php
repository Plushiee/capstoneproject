<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCeritas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ceritas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_acara')->nullable();
            $table->foreign('id_acara')->references('id')->on('tbl_acaras');
            $table->date('tanggal_cerita')->nullable();
            $table->string('judul_cerita')->nullable();
            $table->string('isi_acara')->nullable();
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
        Schema::dropIfExists('tbl_ceritas');
    }
}
