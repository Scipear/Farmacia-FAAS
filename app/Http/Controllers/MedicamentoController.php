<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    //Obtener medicamentos de la tabla

    public function mostrarMedicamento()
    {
        $medicamento = Medicamento::all();

        return response()->json($medicamento, 200);
    }

    public function obtenerMedicamento($id)
    {
        $medicamento = Medicamento::find($id);

        return response()->json($medicamento, 200);
    }

    // Crear un nuevo Registro

    public function crearMedicamento(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $medicamento = Medicamento::created($request->all());

        return response()->json($medicamento, 200);
    }

    // Actualiza los datos 
    public function actualizarMedicamento(Request $request, $id)
    {

        $medicamento = Medicamento::find($id); // Busca x por su ID

        $request->validate([
            'nombre' => 'required'
        ]);

        $medicamento->update($request->all());

        return response()->json($medicamento, 200);
    }

    // Eliminar un registro
    public function eliminarMedicamento($id)
    {

        $medicamento = Medicamento::find($id);
        $medicamento->delete();

        return response()->json([], 204);
    }
}
