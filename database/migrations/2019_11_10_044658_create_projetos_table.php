<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id_projeto');
            $table->string("nome",255);
            $table->string("descricao",255);
            $table->string("tempo",255);
            $table->string("custo",255);
            $table->string("img1",255);
            $table->string("img2",255);
            $table->enum('status',['ativo','inativo'])->default('ativo');
            $table->unsignedInteger('id_usuario');
            
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
