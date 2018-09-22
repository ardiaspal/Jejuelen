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
            $table->integer('stok');
            $table->text('image');
            $table->timestamp('masatanam')->nullable();
            $table->timestamp('perkiraanPanen')->nullable();
            $table->integer('hargaFix_id')->unsigned();
            $table->integer('farmers_id')->unsigned();
            $table->timestamps();

            $table->foreign('hargaFix_id')->references('id')->on('harga_fix')->onDelete('cascade');
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
