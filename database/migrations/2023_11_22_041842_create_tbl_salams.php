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
            $table->unsignedBigInteger('id_tamu')->nullable();
            $table->foreign('id_tamu')->references('id')->on('tbl_buku_tamus');
            $table->string('isi_salam')->nullable();
            $table->json('like_by')->nullable();
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
