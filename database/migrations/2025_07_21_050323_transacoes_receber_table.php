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
        Schema::create('transacoes_receber', function (Blueprint $table) {
            $table->id();

            $table->string('corretora')->nullable(); // Ex: MIDE, ARKADI
            $table->string('conta')->nullable(); // Ex: 587******, 777***501
            $table->string('usuario')->nullable(); // Ex: Wanderson, Jhonathan

            $table->decimal('valor_receber', 15, 2); // Ex: 2.560,00
            $table->decimal('valor_faturado', 15, 2); // Ex: 4.000,00
            $table->decimal('valor_impostos', 15, 2)->nullable(); // Ex: 1.440,00

            $table->date('data_recebimento'); // Ex: 11/07/2025

            $table->string('status'); // Ex: Pago, Em operação
            $table->string('ativo'); // Ex: Dólar, índice
            $table->string('tipo_conta'); // Ex: SR, SRC
            $table->string('situacao')->nullable(); // Ex: ok
            $table->integer('ordem'); // Ex: 5

            $table->timestamps(); // created_at / updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacoes_receber');
    }
};



		
	
	
	

	
	
	
	
	
	

