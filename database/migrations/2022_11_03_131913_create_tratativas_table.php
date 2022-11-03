<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analise_causas', function (Blueprint $table) {
            $table->id();
            $table->json('porques');
            $table->bigInteger('inconformidade_id')->unsigned();
            $table->timestamps();
            
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
        Schema::dropIfExists('analise_causas');
    }
}
