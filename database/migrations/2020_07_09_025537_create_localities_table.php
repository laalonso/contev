<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->id();
            $table->unsignedbigInteger('municipality_id');
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
            $table->string('clave',70);
            $table->string('name',70);
            $table->string('latitud',70);
            $table->string('longitud',70);
            $table->string('altitud',70);
            $table->string('carta',70);
            $table->string('ambito',70);
            $table->string('poblacion',70);
            $table->string('masculino',70);
            $table->string('femenino',70);
            $table->string('viviendas',70);
            $table->string('Lat',70);
            $table->string('Ing',70);
            $table->string('activo');
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
        Schema::dropIfExists('localities');
    }
}

