<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\ContaController;
use App\Http\Controllers\OperadorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstrategiaController;
use App\Http\Controllers\OrdemController;
use App\Http\Controllers\CheckOperacionalController;
use App\Http\Controllers\ValidOrdemController;


/*
|--------------------------------------------------------------------------
| Rotas de Autenticação
|--------------------------------------------------------------------------
*/

Route::middleware(['throttle:login-attempts'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAttempt'])->name('auth');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/esqueceu_senha', function () {
    return 'Em desenvolvimento: lembrar senha!';
})->name('forgot-password');

Route::get('/cadastro', [UserController::class, 'create'])->name('create-account');
Route::post('/cadastro', [UserController::class, 'store'])->name('insert-account');

/*
|--------------------------------------------------------------------------
| Rotas Protegidas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Perfil do usuário
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    
    // Checagem Operacional
    Route::resource('check', CheckOperacionalController::class);
    
    // Validacao de ordens
    Route::resource('valid_ordens', ValidOrdemController::class);

    // Monitor de ordens principal
    Route::get('/monitor/ordens/data', [OrdemController::class, 'getOrdens']);
    
    // Rotas administrativas (role 3)
    Route::middleware(['role:3'])->group(function () {
        Route::get('/estrategias', [EstrategiaController::class, 'estrategias'])->name('estrategias');
        
        Route::get('/historico', [EstrategiaController::class, 'historico'])->name('estrategias.historico');
        Route::post('/estrategias', [EstrategiaController::class, 'store'])->name('estrategias.store');
        
        
        Route::get('/monitor/ordens', [OrdemController::class, 'monitor']);
        
        
        
        /* Listagem */
        Route::get('/contas', [ContaController::class, 'index'])
            ->name('contas.index');
        
        /* Formulário de cadastro */
        Route::get('/cadastro-contas', [ContaController::class, 'create'])
            ->name('cadastro_contas');
        
        /* Salvar conta */
        Route::post('/contas', [ContaController::class, 'store'])->name('contas.store');
        
        /* Formulário de edição */
        Route::get('/contas/{id}/editar', [ContaController::class, 'edit'])
            ->name('contas.edit');
        
        /* Atualizar conta */
        Route::put('/contas/{id}', [ContaController::class, 'update'])
            ->name('contas.update');
        
        /* Remover conta */
        Route::delete('/contas/{id}', [ContaController::class, 'destroy'])
            ->name('contas.destroy');
            
            
            
            
            
            

/* Listagem */
Route::get('/operadores', [OperadorController::class, 'index'])
    ->name('operadores.index');

/* Formulário de cadastro */
Route::get('/cadastro-operadores', [OperadorController::class, 'create'])
    ->name('operadores.create');

/* Salvar operador */
Route::post('/operadores', [OperadorController::class, 'store'])
    ->name('operadores.store');

/* Formulário de edição */
Route::get('/operadores/{id}/editar', [OperadorController::class, 'edit'])
    ->name('operadores.edit');

/* Atualizar operador */
Route::put('/operadores/{id}', [OperadorController::class, 'update'])
    ->name('operadores.update');

/* Remover operador */
Route::delete('/operadores/{id}', [OperadorController::class, 'destroy'])
    ->name('operadores.destroy');

        
        
    });

});
