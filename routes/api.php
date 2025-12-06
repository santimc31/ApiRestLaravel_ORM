<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ClienteAuthController;
use App\Http\Controllers\Auth\CodigoController;

Route::prefix('cliente')->group(function () {
    Route::post('login', [ClienteAuthController::class, 'login']);
    Route::post('store', [ClienteAuthController::class, 'store']);
    Route::put('update/{id}', [ClienteAuthController::class, 'update']);
});

Route::prefix('codigo')->group(function () {
    Route::post('generar', [CodigoController::class, 'generar']);
    Route::post('validar', [CodigoController::class, 'validar']);
});
