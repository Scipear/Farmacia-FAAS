<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AccionTerapeutica;
use Illuminate\Http\Request;

class AccionTerapeuticaController extends Controller
{
    //Obtener Acciones terapeuticas de la tabla

    public function mostrarAT()
    {
        $accionT = AccionTerapeutica::all();

        return response()->json($accionT, 200);
    }

    public function obtenerAT($id)
    {
        $accionT = AccionTerapeutica::find($id);

        return response()->json($accionT, 200);
    }

    // Crear un nuevo Registro

    public function crearAT(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $accionT = AccionTerapeutica::created($request->all());

        return response()->json($accionT, 200);
    }

    // Actualiza los datos 
    public function actualizarAT(Request $request, $id)
    {

        $accionT = AccionTerapeutica::find($id); // Busca x por su ID

        $request->validate([
            'numero' => 'required|numeric'
        ]);

        $accionT->update($request->all());

        return response()->json($accionT, 200);
    }

    // Eliminar un registro
    public function eliminarAT($id)
    {

        $accionT = AccionTerapeutica::find($id);
        $accionT->delete();

        return response()->json([], 204);
    }
}
