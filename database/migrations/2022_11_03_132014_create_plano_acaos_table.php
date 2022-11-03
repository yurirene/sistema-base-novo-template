<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanoAcaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano_acoes', function (Blueprint $table) {
            $table->id();
            $table->string('oque')->nullable();
            $table->bigInteger('quem')->unsigned();
            $table->date('quando_inicio')->nullable();
            $table->date('quando_fim')->nullable();
            $table->string('onde')->nullable();
            $table->string('porque')->nullable();
            $table->string('como')->nullable();
            $table->decimal('quanto')->nullable();
            $table->string('observacao')->nullable();
            $table->bigInteger('inconformidade_id')->unsigned();
            $table->timestamps();

            $table->foreign('quem')->references('id')->on('users');
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
        Schema::dropIfExists('plano_acoes');
    }
}
