<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AprendizPrograma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendiz_programa', function (Blueprint $table) {
            $table->string('documento_apre',40);
            $table->increments('id')->unsigned();
            $table->timestamps();

            $table->foreign('documento_apre')
            ->references('documento_apre')
            ->on('aprendiz')
            ->onDelete('cascade');

            $table->foreign('id')
            ->references('id')
            ->on('programas')
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
        Schema::dropIfExists('aprendiz_programa');
    }
}
