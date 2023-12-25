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
            $table->dateTime('waktu_acara')->nullable();
            $table->string('tempat_acara')->nullable();
            $table->string('alamat_acara')->nullable();
            $table->enum('countdown', [1, 0])->default(0);
            $table->text('google_map')->nullable();
            $table->string('long_acara')->nullable();

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
