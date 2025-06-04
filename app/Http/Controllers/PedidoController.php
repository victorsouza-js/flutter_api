<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PedidoController extends Controller
{
    // Lista todos os pedidos de um usuário específico
    public function pedidosPorUsuario($userId)
    {
        $pedidos = Pedido::where('user_id', $userId)->get();
        return response()->json([
            'data' => $pedidos
        ], Response::HTTP_OK);
    }

    // Retorna o usuário do pedido pelo id do pedido
    public function usuarioDoPedido($pedidoId)
    {
        $pedido = Pedido::find($pedidoId);
        if (!$pedido) {
            return response()->json([
                'message' => 'Pedido não encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
        $usuario = $pedido->user; // Relacionamento user() no model Pedido
        return response()->json([
            'data' => $usuario
        ], Response::HTTP_OK);
    }
}
