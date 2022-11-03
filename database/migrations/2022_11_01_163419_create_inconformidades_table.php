<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInconformidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inconformidades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('descricao');
            $table->string('evidencias')->nullable();
            $table->string('contrariedade')->nullable();
            $table->date('previsao_retorno')->nullable();
            $table->date('data_retorno')->nullable();
            $table->bigInteger('departamento_id')->unsigned()->nullable();
            $table->bigInteger('origem_id')->unsigned()->nullable();
            $table->bigInteger('tipo_acao_id')->unsigned()->nullable();
            $table->bigInteger('nivel_id')->unsigned()->nullable();
            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->bigInteger('responsavel_id')->unsigned()->nullable();
            $table->bigInteger('criado_por')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('origem_id')->references('id')->on('origens');
            $table->foreign('tipo_acao_id')->references('id')->on('tipo_acoes');
            $table->foreign('nivel_id')->references('id')->on('niveis');
            $table->foreign('responsavel_id')->references('id')->on('users');
            $table->foreign('criado_por')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inconformidades');
    }
}
