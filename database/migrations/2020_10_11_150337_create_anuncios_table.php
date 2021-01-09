<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_ciudad');
            $table->unsignedBigInteger('id_categoria');
            $table->string('tipo_anuncio',50);
            $table->string('barrio',50);
            $table->string('direccion',100);
            $table->text('descripcion');
            $table->integer('cuartos');
            $table->integer('metros_cuadrados');
            $table->timestamps();
            
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_ciudad')->references('id')->on('ciudades');
            $table->foreign('id_categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}
