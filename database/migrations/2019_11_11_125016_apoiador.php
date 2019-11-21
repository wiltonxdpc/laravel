<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Apoiador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('apoiadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string("custo",255);
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_projeto');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_projeto')->references('id_projeto')->on('projetos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apoiadors');
    }
}
