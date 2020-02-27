<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProyePropuesta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proye_propuesta', function (Blueprint $table) {
            $table->bigInteger('id_propuesta')->unsigned();
            $table->bigInteger('id_proyecto')->unsigned();
            $table->timestamps();


            $table->foreign('id_propuesta')
            ->references('id')
            ->on('propuestas')
            ->onDelete('cascade');

            $table->foreign('id_proyecto')
            ->references('id')
            ->on('proyectos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proye_propuesta');
    }
}
