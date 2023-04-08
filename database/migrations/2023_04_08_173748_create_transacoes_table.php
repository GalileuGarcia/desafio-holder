<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->bigIncrements('id_transacao');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->float('valor_compra', 8, 2);
            $table->float('valor_venda', 8, 2);
            $table->string('descricao');
            $table->string('duracao')->nullable();
            $table->float('resultado', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacoes');
    }
}
