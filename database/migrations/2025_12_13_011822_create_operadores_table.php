<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('operadores', function (Blueprint $table) {

            // PK
            $table->id('id_operador');

            // Código interno (5 dígitos)
            $table->unsignedInteger('cod_operador')->unique();

            // Dados do operador
            $table->string('name_operador', 200);
            $table->string('foto')->nullable();
            $table->string('color', 7)->default('#010101');

            // Status
            // 1 = ativo | 0 = inativo
            $table->tinyInteger('status_ativo')->default(1);

            // Localidade
            $table->string('local', 150)->nullable();

            // Data de criação
            $table->timestamp('date_creation')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('operadores');
    }
};
