<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Propuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('documento_1')->nullable(true);
            $table->bigInteger('documento_2')->nullable(true);
            $table->bigInteger('documento_3')->nullable(true);
            $table->string('documento_propuesta',200)->nullable(false);
            $table->string('propuesta',7000)->nullable(false);
            $table->timestamps();
        });
    }

    /*




     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propuestas');
    }
}
