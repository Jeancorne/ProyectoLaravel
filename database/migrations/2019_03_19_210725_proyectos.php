<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('depart_proyecto',30)->nullable(false);
            $table->string('nombre_proye',70)->nullable(false);
            $table->string('ciudad_proye',40)->nullable(false);
            $table->string('categoria_proye',30)->nullable(false);
            $table->string('descripcion_proye',8000)->nullable(false);
            $table->date('fecha_proyecto');
            $table->string('nit_empresa',40)->nullable(false);
            $table->timestamps();

             $table->foreign('nit_empresa')
            ->references('nit_empresa')
            ->on('empresa')
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
        Schema::dropIfExists('proyectos');
    }
}







