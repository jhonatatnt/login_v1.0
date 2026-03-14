<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('valid_ordens', function (Blueprint $table) {

            $table->id('id_valid_ordens');

            // usuário que validou
            $table->unsignedBigInteger('id_user');

            // ordem validada
            $table->unsignedBigInteger('ordem_id');

            $table->enum('status', [
                'aguardando',
                'executada',
                'finalizada'
            ])->default('aguardando');

            $table->enum('resultado', [
                'ganhou',
                'perdeu'
            ])->nullable();

            $table->timestamps();
            $table->softDeletes();

            // foreign keys
            $table->foreign('id_user')
                ->references('id_user')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreign('ordem_id')
                ->references('id')
                ->on('ordens')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('valid_ordens');
    }
};