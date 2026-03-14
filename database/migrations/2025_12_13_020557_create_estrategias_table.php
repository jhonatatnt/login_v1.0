<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estrategias', function (Blueprint $table) {
            $table->id();

            // Grupo A
            $table->unsignedInteger('op_mestre_a');
            $table->unsignedInteger('op_sec_a');
            $table->decimal('valor_mestre_a', 12, 3);
            $table->string('tipo_op_a', 20); // compra / venda
            $table->integer('variacao_a')->default(0);
            $table->json('contas_mestre_a')->nullable();
            $table->json('contas_sec_a')->nullable();

            // Grupo B
            $table->unsignedInteger('op_mestre_b');
            $table->unsignedInteger('op_sec_b');
            $table->string('tipo_op_b', 20);
            $table->json('contas_mestre_b')->nullable();
            $table->json('contas_sec_b')->nullable();

            $table->timestamp('date_creation')->useCurrent();

            // FKs CORRETAS (tipo + coluna)
            $table->foreign('op_mestre_a')->references('cod_operador')->on('operadores');
            $table->foreign('op_sec_a')->references('cod_operador')->on('operadores');
            $table->foreign('op_mestre_b')->references('cod_operador')->on('operadores');
            $table->foreign('op_sec_b')->references('cod_operador')->on('operadores');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estrategias');
    }
};
