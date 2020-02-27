<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactApren extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_apren', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tel_fijo')->unsigned();
            $table->bigInteger('cel_apren')->unsigned();
            $table->string('depart_aprendiz',20);         
            $table->string('ciudad_apren',50);
            $table->string('documento_apre',50);  
            $table->timestamps();

            $table->foreign('documento_apre')
                ->references('documento_apre')
                ->on('aprendiz')
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
        Schema::dropIfExists('contacto_apren');
    }
}
