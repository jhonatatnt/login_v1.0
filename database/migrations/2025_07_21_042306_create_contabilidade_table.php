<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::create('contabilidade', function (Blueprint $table) {
            $table->id();
            $table->date('data_lancamento'); // Ex: 05/07/2025
            $table->string('periodo_competencia'); // Ex: jun/25
            $table->string('tipo_lancamento'); // Alterado de enum para string
            $table->string('codigo_movimentacao'); // Ex: DES001
            $table->string('codigo_conta'); // Ex: 2.02.03
            $table->string('classificacao_conta'); // Ex: Despesa com Plataforma
            $table->string('codigo_cc'); // Ex: CC002
            $table->string('centro_custo'); // Ex: Operacional
            $table->string('descricao_lancamento'); // Ex: Pagamento plataforma MIDE
            $table->string('detalhamento'); // Ex: DOC 000032-A
            $table->decimal('valor', 15, 2); // Ex: -100.00 (armazenado como número)
            $table->timestamps(); // para controle de criação e atualização (opcional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contabilidade');
    }
};






