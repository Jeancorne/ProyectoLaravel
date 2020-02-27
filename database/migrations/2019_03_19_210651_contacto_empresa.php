<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactoEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_empresa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('direccion_empresa',70)->nullable(false);
            $table->string('nit_empresa',40);
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
        Schema::dropIfExists('contacto_empresa');
    }
}
