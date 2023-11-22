<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProduks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk');
            $table->string('jenis_produk');
            $table->string('nama_file');
            $table->string('biaya_dasar');
            $table->string('benefit');
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
        Schema::dropIfExists('tbl_produks');
    }
}
