<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPesanans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_admin')->default('1');
            $table->foreign('id_admin')->references('id')->on('tbl_admins');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('tbl_users');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('tbl_produks');
            $table->string('domain')->nullable();
            $table->integer('biaya')->nullable();
            $table->string('status_pembayaran')->default('belum lunas');
            $table->string('status_pesanan')->nullable();
            $table->string('pesan')->nullable();
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
        Schema::dropIfExists('tbl_pesanans');
    }
}
