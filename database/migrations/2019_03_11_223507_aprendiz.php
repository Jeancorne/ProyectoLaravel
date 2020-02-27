<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aprendiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendiz', function (Blueprint $table) {        
            $table->string('documento_apre',40)->primary();
            $table->string('nombre_apre',50)->nullable(true);
            $table->string('apellido_apre',50)->nullable(true);          
            $table->integer('id_user')->unsigned();
            $table->timestamps();


            $table->foreign('id_user')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');


        });


        /*Schema::table('aprendiz', function($table){
            $table->foreign('id_user')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprendiz');
    }
}
