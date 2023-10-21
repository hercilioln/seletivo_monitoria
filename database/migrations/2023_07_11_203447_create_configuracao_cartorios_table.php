<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracaoCartoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracao_cartorios', function (Blueprint $table) {
            $table->id();
            $table->string('coc_nome');
            $table->string('coc_comarca');
            $table->string('coc_registrador');
            $table->string('coc_endereco');
            $table->string('coc_cidade');
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
        Schema::dropIfExists('configuracao_cartorios');
    }
}
