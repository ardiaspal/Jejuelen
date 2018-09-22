<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('produkLahan_id')->nullable()->unsigned();
            $table->integer('produkKg_id')->nullable()->unsigned();
            $table->integer('jumlah');
            $table->timestamps();


            $table->foreign('produkLahan_id')->references('id')->on('produk_lahan')->onDelete('cascade');
            $table->foreign('produkKg_id')->references('id')->on('produk_kg')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
