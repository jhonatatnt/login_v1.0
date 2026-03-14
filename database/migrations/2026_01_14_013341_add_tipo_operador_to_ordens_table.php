<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ordens', function (Blueprint $table) {
            $table->enum('tipo_operador', ['mestre', 'secundario'])
                  ->after('cod_operador');
        });
    }

    public function down(): void
    {
        Schema::table('ordens', function (Blueprint $table) {
            $table->dropColumn('tipo_operador');
        });
    }
};
