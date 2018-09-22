<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',225);
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('level')->default(0);
            $table->integer('status_id')->unsigned();
            $table->enum('status', ['setuju', 'tidak'])->default('setuju');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('status_beli')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
