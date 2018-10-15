<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukLahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_lahan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',225);
            $table->integer('stokAwal');
            $table->integer('stokAkhir');
            $table->integer('harga');
            $table->text('image');
            $table->string('slug',225);
            $table->text('deskripsi');
            $table->string('masatanam',225)->nullable();
            $table->string('perkiraanPanen',225)->nullable();
            $table->integer('farmers_id')->unsigned();
            $table->timestamps();

            $table->foreign('farmers_id')->references('id')->on('farmers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_lahan');
    }
}
