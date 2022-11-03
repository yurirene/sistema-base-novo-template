<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('responsavel')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('inconformidade_id')->unsigned();
            $table->timestamps();

            $table->foreign('responsavel')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('historico_ocorrencias');
    }
}
