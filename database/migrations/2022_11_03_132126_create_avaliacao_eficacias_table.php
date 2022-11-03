<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaoEficaciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao_eficacias', function (Blueprint $table) {
            $table->id();
            $table->string('metodo');
            $table->string('justificativa');
            $table->boolean('parecer');
            $table->bigInteger('responsavel')->unsigned();
            $table->bigInteger('inconformidade_id')->unsigned();
            $table->timestamps();

            $table->foreign('responsavel')->references('id')->on('users');
            $table->foreign('inconformidade_id')->references('id')->on('inconformidades')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao_eficacias');
    }
}
