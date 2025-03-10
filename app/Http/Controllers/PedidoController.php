<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Medicina_pedido;
use App\Models\Compra;
use App\Models\Laboratorio;
use App\Models\Medicina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    // Obtiene todos los pedidos de la tabla
    public function mostrarPedidos(){
        $pedidos = Pedido::all();

        return view('analista.pedidos', compact('pedidos'));
    }

    public function obtenerPedidoID(Request $request){
        $query = $request->input('query');

        $pedidos = Pedido::where('id', 'LIKE', '%' . $query . '%')->get();
        
        return view('analista.pedidos', compact('pedidos'));
    }

    public function editarPedido($id){
        $pedido = Pedido::findOrFail($id);

        return view('analista.actualizarPedido', compact('pedido'));
    }

    public function obtenerMedicinas($id){
        $pedido = Pedido::findOrFail($id);
        $medicinas = $pedido->medicinas;

        $medicinas->each(function ($medicina) {
            $medicina->precio = $medicina->pivot->precio;
            $medicina->cantidad = $medicina->pivot->cantidad;
        });
        
        return view('analista.pedidoMedicina', compact('medicinas'));
    }

    public function formPedido(){
        $user = Auth::user();

        $empleado = $user->empleado;
        $sucursal = $empleado->sucursales->whereNull('empleado_sucursal.fecha_salida')->first();
        $laboratorios = $sucursal->laboratorios()
                        ->wherePivot('fecha_final', null)
                        ->get();

        return view('analista.formPedido', compact('sucursal', 'empleado', 'laboratorios'));
    }

    // Crea un nuevo registro de pedido a traves de una peticion
    public function crearPedido(Request $request){
        $request->validate([
            'sucursal_id' => 'required|exists:sucursales,id',
            'empleado_id' => 'required|exists:empleados,id',
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'tipoPago' => 'required',
            'observaciones' => 'nullable',
            'medicinas' => 'required|array',
            'medicinas.*.medicina_id' => 'required|exists:medicinas,id',
            'medicinas.*.cantidad' => 'required|numeric',
        ]); // Validaciones para los campos del registro

        
        $pedido = Pedido::create($request->only(['sucursal_id', 'empleado_id', 'laboratorio_id', 
        'tipoPago', 'observaciones']));
        
        $this->guardarMedicinas($request->medicinas, $pedido);

        $compra = new Compra([
            'precioPagar' => $pedido->precioTotal,
            'observaciones' => '',
        ]);

        $pedido->compra()->save($compra);

        return redirect('/analista/pedidos'); // Respuesta en formato JSON implementada por ahora
    }

    public function guardarMedicinas($medicinas, $pedido){
        $medicinasPedido = [];
        $precioTotal = 0;

        foreach($medicinas as $medicina){
            $medicinaAux = Medicina::find($medicina['medicina_id']);

            $medicinasPedido[$medicina['medicina_id']] = [
                'cantidad' => $medicina['cantidad'],
                'precio' => $medicinaAux->precio_compra,
            ];

            $precioTotal += $medicinaAux->precio_compra * $medicina['cantidad'];
        }

        $pedido->update(['precioTotal' => $precioTotal]);

        $pedido->medicinas()->attach($medicinasPedido);
    }

    // Actualiza los datos de un pedido
    public function actualizarPedido(Request $request, $id){

        $pedido = Pedido::findOrFail($id); // Busca un pedido por su ID

        $request->validate([
            'status' => 'required',
            'observaciones' => 'nullable',
        ]);

        $pedido->update(['status' => $request->status, 'observaciones' => $request->observaciones]);

        return redirect('/analista/pedidos');
    }

}
