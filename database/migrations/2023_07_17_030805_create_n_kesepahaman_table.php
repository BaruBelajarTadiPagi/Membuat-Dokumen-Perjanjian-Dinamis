<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNKesepahamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_kesepahaman', function (Blueprint $table) {
            $table->id();
            $table->string('name_instansi');
            $table->string('no_instansi');
            $table->string('no_poltekes');
            $table->date('start');
            $table->date('end');
            $table->string('name');
            $table->string('position');
            $table->string('address');
            $table->string('image');
            $table->string('nip');
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
        Schema::dropIfExists('n_kesepahaman');
    }
}
