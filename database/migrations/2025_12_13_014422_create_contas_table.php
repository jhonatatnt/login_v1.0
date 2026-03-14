<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contas', function (Blueprint $table) {

            // PK
            $table->id('id_conta');

            // Dados da conta
            $table->string('conta', 50);
            $table->integer('qtd_contrato');

            // Credenciais
            $table->string('login_email', 200);
            $table->string('login_senha', 300); // tamanho da senha
            $table->string('senha_operacao', 300);

            // Financeiro
            $table->decimal('valor_ganho', 10, 2)->default(0);
            $table->decimal('valor_perda', 10, 2)->default(0);

            // Status
            // ativo | inativo | bloqueado
            $table->string('status_conta', 20)->default('ativo');

            // Data de criação
            $table->timestamp('date_creation')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contas');
    }
};
