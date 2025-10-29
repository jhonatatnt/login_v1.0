<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FinanceiroController;
use Illuminate\Support\Facades\Route;


Route::middleware(['throttle:login-attempts'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAttempt'])->name('auth');
});
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/esqueceu_senha', function () {
    return 'Em desenvolvimento: lembrar senhar!';
})->name('forgot-password');


Route::get('/cadastro', [UserController::class, 'create'])->name('create-account');
Route::post('/cadastro', [UserController::class, 'store'])->name('insert-account');


Route::middleware(['auth'])-> group(function() {

    Route::get('/task', function () {
        return view('sygest_task/home_task')->name('task');
    });

    Route::get('/pessoal', function () {
        return view('sygest_pes/home_pes')->name('pessoal');
    });


    

    Route::get('/financeiro', [FinanceiroController::class, 'index'])->name('financeiro');

    

    Route::get('/registro-conta', function () {
        return view('sygest_fin/register_fin');
    })->name('/registro-conta');
    Route::post('/registro-conta', [FinanceiroController::class, 'store'])->name('registro-conta');


    Route::get('/analitico-financeiro', [FinanceiroController::class, 'analitico'])->name('analitico');
});



