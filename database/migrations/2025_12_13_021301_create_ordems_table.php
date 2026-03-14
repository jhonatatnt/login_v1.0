<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
        
            $table->unsignedBigInteger('id_estrategy');
            $table->unsignedInteger('cod_operador'); 
            $table->unsignedBigInteger('id_conta'); 
        
            $table->string('grupo', 50);
            $table->string('valor', 50);
            $table->string('tipo_negocio', 50);
            $table->string('status', 50);
            $table->string('visibility', 50)->default('public');
        
            $table->timestamp('date_creation')->useCurrent();
        
            // Foreign Keys
            $table->foreign('id_estrategy')
                  ->references('id')
                  ->on('estrategias');
        
            $table->foreign('cod_operador')
                  ->references('cod_operador')
                  ->on('operadores');
        
            $table->foreign('id_conta')
                  ->references('id_conta')
                  ->on('contas');
        });

    } 

    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
