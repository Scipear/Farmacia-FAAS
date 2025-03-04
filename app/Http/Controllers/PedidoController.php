<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Obtiene todos los pedidos de la tabla
    public function mostrarPedidos(){
        $pedidos = Pedido::all();

        return response()->json($pedidos, 200);
    }

    public function obtenerPedidoID($id){
        $pedido = Pedido::find($id);
        
        return response()->json($pedido, 200);
    }

    // Crea un nuevo registro de pedido a traves de una peticion
    public function crearPedido(Request $request){
        $request->validate([
            'sucursal_id' => 'required|exists:sucursales,id',
            'empleado_id' => 'required|exists:empleados,id',
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'precioTotal' => 'required',
            'tipoPago' => 'required',
            'status' => 'required',
            'observaciones',
        ]); // Validaciones para los campos del registro

        $pedido = Pedido::create($request->all());
    
        return response()->json($pedido, 200); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de un pedido
    public function actualizarPedido(Request $request, $id){

        $pedido = Pedido::find($id); // Busca un pedido por su ID

        $request->validate([
            'sucursal_id' => 'required|exists:sucursales,id',
            'empleado_id' => 'required|exists:empleados,id',
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'precioTotal' => 'required',
            'tipoPago' => 'required',
            'status' => 'required',
            'observaciones',
        ]); // Validaciones para los campos del registro

        $pedido->update($request->all());

        return response()->json($pedido, 200);
    }
}
