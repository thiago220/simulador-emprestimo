<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\SimulacaoController;

Route::prefix('v1')->group(function () {
    Route::prefix('instituicoes')->group(function () {
        Route::get('/', [InstituicaoController::class, 'index']);
        Route::get('{id}', [InstituicaoController::class, 'show']);
    });
    
    Route::prefix('convenios')->group(function () {
        Route::get('/', [ConvenioController::class, 'index']);
        Route::get('{id}', [ConvenioController::class, 'show']);
    });
    
    Route::post('/simulacoes', [SimulacaoController::class, 'store']);
});
