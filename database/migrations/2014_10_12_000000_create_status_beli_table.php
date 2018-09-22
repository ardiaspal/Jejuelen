<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusBeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_beli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keterangan',225);
            $table->timestamps();
        });

         // Insert some stuff
        DB::table('status_beli')->insert(
            array(
                ['keterangan' => 'mitra'],
                ['keterangan' => 'umum'],
                ['keterangan' => 'petani']
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_beli');
    }
}
