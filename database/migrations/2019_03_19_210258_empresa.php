<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->string('nit_empresa',40)->primary();
            $table->string('nombre_empresa',70)->nullable(false);
            $table->string('imagen_empresa',100)->nullable(false);
            $table->integer('id')->unsigned();
            $table->timestamps();
              $table->foreign('id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });


    }

    /**$table->string('documento_apre',40)->primary();
            $table->string('nombre_apre',50)->nullable(true);
            $table->string('apellido_apre',50)->nullable(true);          
            $table->integer('id_user')->unsigned();
            $table->timestamps();
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
