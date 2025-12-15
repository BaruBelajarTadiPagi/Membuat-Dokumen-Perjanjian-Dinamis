<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouInternationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mou_internationals', function (Blueprint $table) {
            $table->id();
            $table->string('name_instansi');
            $table->string('no_instansi');
            $table->string('no_poltekes');
            $table->date('start');
            $table->date('end');
            $table->string('name_1');
            $table->string('position_1');
            $table->string('name_2');
            $table->string('position_2');
            $table->string('address');
            $table->string('image');
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
        Schema::dropIfExists('mou_internationals');
    }
}
