<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Hotel\NivelController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware([JwtMiddleware::class])->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('/logged-user', [AuthController::class, 'loggedUser'])->name('me');
        Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->name('refresh');
        Route::post('/session-token', [AuthController::class, 'sessionToken'])->name('session-token');
    }); 

    Route::prefix('hotel')->group(function(){
        Route::prefix('niveles')->group(function(){
            Route::get('/lista', [NivelController::class, 'lista']);
            Route::get('/ver/{id}', [NivelController::class, 'ver']);
            Route::post('/guardar', [NivelController::class, 'guardar']);
            Route::post('/cambiarEstado', [NivelController::class, 'cambiarEstado']);
            Route::post('/eliminar', [NivelController::class, 'eliminar']);
        });
    });
});
