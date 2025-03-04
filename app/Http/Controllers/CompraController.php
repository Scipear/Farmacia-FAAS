<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // Obtiene todas las compras de la tabla
    public function mostrarCompras(){
        $compras = Compra::all();

        return response()->json($compras, 200);
    }

    public function obtenerCompraID($id){
        $compra = Compra::find($id);
        
        return response()->json($compra, 200);
    }

    // Crea un nuevo registro de compra a traves de una peticion
    public function crearCompra(Request $request){
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'precioPagar' => 'required',
            'observaciones',
            'status' => 'required',
            'fechaLlegada' => 'required',
        ]); // Validaciones para los campos del registro

        $compra= Compra::create($request->all());
    
        return response()->json($pedido, 200); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de una compra
    public function actualizarCompra(Request $request, $id){

        $compra = Compra::find($id); // Busca una medicina por su ID

        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'precioPagar' => 'required',
            'observaciones',
            'status' => 'required',
            'fechaLlegada' => 'required',
        ]); // Validaciones para los campos del registro

        $compra->update($request->all());

        return response()->json($compra, 200);
    }
}
