<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string("nome");
            $table->string("telefone")->unique();
            $table->string("email")->unique();
            $table->string("cep");
            $table->string("logradouro");
            $table->string("complemento")->nullable();
            $table->string("bairro");
            $table->string("localidade");
            $table->string("uf");

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
