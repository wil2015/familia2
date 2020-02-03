<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('familia_id')->nullable();
            $table->string('nome');
            $table->string('sexo');
            $table->date('data_nascimento');
            $table->string('naturalidade'); 
            $table->string('cpf');
            $table->string('rg');
            $table->string('estado_civil');
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
        Schema::dropIfExists('pessoa');
    }
}
