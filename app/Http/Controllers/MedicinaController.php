<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medicina;
use App\Models\Medicina_sucursal;
use Illuminate\Http\Request;

class MedicinaController extends Controller
{
    public function mostrarMedicinas(){
        $medicinas = Medicina::all();

        return response()->json($medicinas, 200);
    }

    public function obtenerMedicinaID($id){
        $medicina = Medicina::findOrFail($id);
        
        return response()->json($medicina, 200);
    }

    public function obtenerSucursales($id){
        $sucursales = Medicina_sucursal::where([
            ['medicina_id', $id],
            ['cantidad', '>', 0],
        ])->get();

        return response()->json($sucursales, 200);
    }

    // Crea un nuevo registro de medicina a traves de una peticion
    public function crearMedicina(Request $request){
        $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'presentacion_id' => 'required|exists:presentaciones,id',
            'descripcion' => 'required',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
        ]); // Validaciones para los campos del registro

        $medicina = Medicina::create($request->all());

        return response()->json($medicina, 200); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de una medicina
    public function actualizarMedicina(Request $request, $id){

        $medicina = Medicina::findOrFail($id); // Busca una medicina por su ID

        $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'presentacion_id' => 'required|exists:presentaciones,id',
            'descripcion' => 'required',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            //'sucursal_id' => 'required|exists:sucursales,id',
            //'cantidad' => 'required|numeric',
            //'observacion' => 'nullable',
        ]);

        $medicina->update($request->only(['laboratorio_id', 'medicamento_id', 'presentacion_id', 'descripcion', 'precio_compra', 'precio_venta']));

        //if($request->has('sucursal_id')){
        //    $mSucursal = $request->only(['sucursal_id', 'cantidad', 'observacion']);

        //    $this->asignarSucursal($mSucursal, $medicina);
        //}

        return response()->json($medicina, 200);
    }

    public function agregarSucursal(Request $request, $id){
        $medicina = Medicina::findOrFail($id);

        $request->validate([
            'sucursal_id' =>'required|exists:sucursales,id',
            'cantidad' =>'required|numeric',
            'observacion' => 'nullable',
        ]);

        $synced = [
            $request->sucursal_id => [
                'cantidad' => $request->cantidad,
                'observacion' => $request->observacion,
            ],
        ];

        $medicina->sucursales()->sync($synced);
    }

    // Elimina una medicina de la tabla
    public function eliminarMedicina($id){
        $medicina = Medicina::findOrFail($id);
        $medicina->delete();

        return response()->json([], 204);
    }
}
