<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('check_operacional', function (Blueprint $table) {
            
            $table->id('id_check');

            $table->unsignedBigInteger('id_operador');
            
            $table->boolean('login_plataforma')->default(false);
            $table->boolean('valid_contas')->default(false);
            $table->boolean('valid_senha_op')->default(false);
            $table->boolean('valid_OCO')->default(false);
            $table->boolean('valid_contratos')->default(false);

            $table->boolean('conf_replicador')->default(false);
            $table->boolean('reuniao')->default(false);

            $table->timestamp('data_creation')->useCurrent();

            $table->string('uploaded')->nullable();

            $table->softDeletes(); // deleted_at

            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('check_operacional');
    }
};