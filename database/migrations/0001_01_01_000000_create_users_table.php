<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {

            // ID personalizado
            $table->id('id_user');

            // Dados pessoais
            $table->string('name', 200);
            $table->string('lastname', 200);

            // Autenticação
            $table->string('email', 200)->unique();
            $table->string('password');

            // Confirmação de e-mail
            // sim / nao
            $table->string('confirm_email', 3)->default('nao');

            // Perfil do usuário
            // 0 = comum | 1 = operador | 2 = admin | 3 = super admin
            $table->tinyInteger('role_user')->default(0);

            // Data de criação automática
            $table->timestamp('date_creation')->useCurrent();

            // Campos usados pelo Laravel (opcional, mas recomendado)
            $table->rememberToken();
        });

        /*
        |--------------------------------------------------------------------------
        | PASSWORD RESET TOKENS
        |--------------------------------------------------------------------------
        */
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        /*
        |--------------------------------------------------------------------------
        | SESSIONS
        |--------------------------------------------------------------------------
        */
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users', 'id_user')
                ->nullOnDelete();

            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
