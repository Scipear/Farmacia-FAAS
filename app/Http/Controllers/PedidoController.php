<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Medicina_pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Obtiene todos los pedidos de la tabla
    public function mostrarPedidos(){
        $pedidos = Pedido::all();

        return response()->json($pedidos, 200);
    }

    public function obtenerPedidoID($id){
        $pedido = Pedido::findOrFail($id);
        
        return response()->json($pedido, 200);
    }

    public function obtenerMedicinas($id){
        $medicinas = Medicina_pedido::where('pedido_id', $id)->get();
        
        return response()->json($medicinas, 200);
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
            'observaciones' => 'nullable',
            'medicinas' => 'required|array',
            'medicinas.*.medicina_id' => 'required|exists:medicinas,id',
            'medicinas.*.precio' => 'required|numeric',
            'medicinas.*.cantidad' => 'required|numeric',
        ]); // Validaciones para los campos del registro

        $pedido = Pedido::create($request->only(['sucursal_id', 'empleado_id', 'laboratorio_id', 'precioTotal', 'tipoPago', 'status', 'observaciones']));
    
        $this->guardarMedicinas($request->medicinas, $pedido);

        return response()->json($pedido, 200); // Respuesta en formato JSON implementada por ahora
    }

    public function guardarMedicinas($medicinas, $pedido){
        $medicinasPedido = [];

        foreach($medicinas as $medicina){
            $medicinasPedido[$medicina['medicina_id']] = [
                'precio' => $medicina['precio'],
                'cantidad' => $medicina['cantidad']
            ];
        }

        $pedido->medicinas()->sync($medicinasPedido);
    }

    // Actualiza los datos de un pedido
    public function actualizarPedido(Request $request, $id){

        $pedido = Pedido::findOrFail($id); // Busca un pedido por su ID

        $request->validate([
            'status' => 'required',
            'observaciones' => 'nullable',
        ]);

        $pedido->update(['status' => $request->status, 'observaciones' => $request->observaciones]);

        return response()->json($pedido, 200);
    }

}
