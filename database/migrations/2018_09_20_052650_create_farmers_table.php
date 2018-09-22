<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',225);
            $table->string('nohp',16);
            $table->string('email')->unique();
            $table->text('alamat');
            $table->integer('nik');
            $table->enum('status', ['menikah', 'single']);
            $table->enum('jenisKelamin', ['laki-laki', 'perempuan']);
            $table->string('agama',225);
            $table->string('kewarganegaraan',225);
            $table->string('ttl',225);
            $table->text('image');
            $table->text('fotoKtp');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('farmers');
    }
}
