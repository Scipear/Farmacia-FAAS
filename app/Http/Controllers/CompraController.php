<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Medicina;
use App\Models\Medicina_compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // Obtiene todas las compras de la tabla
    public function mostrarCompras(){
        $compras = Compra::all();

        return view('analista.compras', compact('compras'));
    }

    public function obtenerCompraID(Request $request){
        $query = $request->input('query');

        $compras = Compra::where('id', 'LIKE', '%' . $query . '%')->get();
        
        return view('analista.compras', compact('compras'));
    }

    public function obtenerCuentasPorPagar(){
        $cuentas = Compra::where('status', 'Por Pagar')->get();

        return view('analista.cuentasxpagar', compact('cuentas'));
    }

    public function editarCompra($id){
        $compra = Compra::findOrFail($id);

        return view('analista.actualizarCompra', compact('compra'));
    }

    public function obtenerMedicinas($id){
        $compra = Compra::findOrFail($id);
        $medicinas = $compra->medicinas;

        $medicinas->each(function ($medicina) {
            $medicina->precio = $medicina->pivot->precio;
            $medicina->cantidad = $medicina->pivot->cantidad;
        });
        
        return view('analista.compraMedicina', compact('medicinas', 'compra'));
    }

    // Crea un nuevo registro de compra a traves de una peticion
    public function crearCompra(Request $request){
        $request->validate([
            'pedido_id' => 'required|exists:pedido,id',
            'precioPagar' => 'required',
            'observaciones' => 'nullable',
            'status' => 'required',
            'fechaLlegada' => 'nullable',
        ]); // Validaciones para los campos del registro

        $compra= Compra::create($request->all());
    
        return response()->json($compra, 200); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de una compra
    public function actualizarCompra(Request $request, $id){

        $compra = Compra::findOrFail($id); // Busca una medicina por su ID

        $request->validate([
            'observaciones' => 'nullable',
            'status' => 'required',
        ]); // Validaciones para los campos del registro

        $compra->update($request->all());

        return redirect('/analista/compras');
    }

    public function asignarMedicinas($id){
        $compra = Compra::findOrFail($id);
        $laboratorio = $compra->pedido->laboratorio;
        $medicinas = $laboratorio->medicinas;

        return view('analista.formCompraMedicina', compact('medicinas', 'compra'));
    }

    public function agregarMedicinas(Request $request, $id){
        $compra = Compra::findOrFail($id); // Busca una compra por su ID

        $request->validate([
            'medicinas' => 'required|array',
            'medicinas.*.medicina_id' => 'required|exists:medicinas,id',
            'medicinas.*.cantidad' => 'required|numeric',
        ]); // Validaciones para los campos del registro
        
        $medicinasCompra = [];
        $precioTotal = 0;

        foreach($request->medicinas as $medicina){
            $medicinaAux = Medicina::find($medicina['medicina_id']);

            $medicinasCompra[$medicina['medicina_id']] = [
                'cantidad' => $medicina['cantidad'],
                'precio' => $medicinaAux->precio_compra,
            ];

            $precioTotal += $medicinaAux->precio_compra * $medicina['cantidad'];
        }

        $compra->update(['precioPagar' => $precioTotal]);

        $compra->medicinas()->attach($medicinasCompra);

        return redirect("/compra/{$id}/medicinas");
    }
}
