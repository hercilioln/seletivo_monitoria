<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertidao2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certidao2s', function (Blueprint $table) {
            $table->id();
            $table->string('cer_nome_pessoa');
            $table->string('cer_cpf', 14);
            $table->string('cer_matricula');
            $table->string('cer_data_nascimento_extenso');
            $table->date('cer_data_nascimento');
            $table->time('cer_hora_nascimento');
            $table->string('cer_naturalidade');
            $table->string('cer_municipio_registro_uf');
            $table->string('cer_local_nascimento');
            $table->enum('cer_sexo', ['masculino', 'feminino']);
            $table->string('cer_filiacao_nome_pai')->nullable();
            $table->string('cer_filiacao_nome_mae');
            $table->string('cer_avos_paternos')->nullable();
            $table->string('cer_avos_maternos');
            $table->boolean('cer_gemeos');
            $table->string('cer_matricula_gemeos')->nullable();
            $table->string('cer_data_registro_extenso');
            $table->string('cer_numero_dnv');
            $table->string('cer_observacao')->nullable();
            $table->json('cer_anotacoes_cadastro')->nullable();
            $table->string('cer_cidade_e_data');

            $table->foreignId('cartorio_id')->constrained('configuracao_cartorios');
            $table->foreignId('escrevente_id')->constrained('escreventes');

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
        Schema::dropIfExists('certidao2s');
    }
}
