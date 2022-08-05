<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Datapribadis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('datapribadis', function (Blueprint $table) {
            $table->id();
            // $table->longText('description');
            // $table->text('short_des');
            // $table->string('logo');
            // $table->string('photo');
            // $table->string('address');
            $table->string('nama');
            $table->string('email');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('datapribadis');
    }
}
