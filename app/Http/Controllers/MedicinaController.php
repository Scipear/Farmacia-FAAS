<?php

namespace App\Http\Controllers;

use App\Models\Medicina;
use Illuminate\Http\Request;

class MedicinaController extends Controller
{
    // Obtiene todos los monodrgas de la tabla
    public function mostrarMedicinas()
    {
        $medicinas = Medicina::all();

        return response()->json($medicinas, 200);
    }

    public function obtenerMedicinaID($id)
    {
        $medicina = Medicina::find($id);

        return response()->json($medicina, 200);
    }

    // Crea un nuevo registro de medicina a traves de una peticion
    public function crearMedicina(Request $request)
    {
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
    public function actualizarMedicina(Request $request, $id)
    {

        $medicina = Medicina::find($id); // Busca una medicina por su ID

        $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'presentacion_id' => 'required|exists:presentaciones,id',
            'descripcion' => 'required',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
        ]);

        $medicina->update($request->all());

        return response()->json($medicina, 200);
    }

    // Elimina una medicina de la tabla
    public function eliminarmedicina($id)
    {
        $medicina = Medicina::find($id);
        $medicina->delete();

        return response()->json([], 204);
    }
}
