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
        Schema::create('transacoes_pagar', function (Blueprint $table) {
            $table->id();
            $table->date('data'); // Ex: 05/07/2025
            $table->string('descricao'); // Ex: 
            $table->string('status'); // Ex: Pago, InvestFut, Aguardando Pagamento
            $table->decimal('valor_pago', 15, 2); // Ex: -100.00 (armazenado como número)
            $table->string('valor_pendente'); // Ex: 
            $table->timestamps(); // para controle de criação e atualização (opcional)
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacoes_pagar');
    }
};

	
	
	
	

