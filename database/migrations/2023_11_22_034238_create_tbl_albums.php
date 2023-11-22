<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAlbums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_albums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pesanan')->nullable();
            $table->foreign('id_pesanan')->references('id')->on('tbl_pesanans');
            $table->string('fungsi_file')->nullable();
            $table->string('nama_file')->nullable();
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
        Schema::dropIfExists('tbl_albums');
    }
}
