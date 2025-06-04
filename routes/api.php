<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::apiResource('/produto', ProdutoController::class);
Route::get('/usuario/{userId}/pedidos', [PedidoController::class, 'pedidosPorUsuario']);
Route::get('/pedido/{pedidoId}/usuario', [PedidoController::class, 'usuarioDoPedido']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
});
