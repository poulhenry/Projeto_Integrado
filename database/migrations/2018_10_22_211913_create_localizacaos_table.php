<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalizacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("pais")->nullable();
            $table->string("estado")->nullable();
            $table->string("cidade")->nullable();
            $table->string("endereco")->nullable();
            $table->string("bairro")->nullable();
            $table->string("cep")->nullable();
            $table->boolean("status")->default(0);
            $table->integer("numero")->nullable();
            $table->string("complemento")->nullable();
            $table->string("latitude")->nullable();
            $table->string("longitude")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localizacaos');
    }
}
