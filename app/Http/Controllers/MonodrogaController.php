<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Monodroga;
use Illuminate\Http\Request;

class MonodrogaController extends Controller
{
    //Obtener monodrogras de la tabla

    public function mostrarMonodroga()
    {
        $monodroga = Monodroga::all();

        return response()->json($monodroga, 200);
    }

    public function obtenerMonodroga($id)
    {
        $monodroga = Monodroga::find($id);

        return response()->json($monodroga, 200);
    }

    // Crear un nuevo Registro

    public function crearMonodroga(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $monodroga = Monodroga::created($request->all());

        return response()->json($monodroga, 200);
    }

    // Actualiza los datos 
    public function actualizarMonodroga(Request $request, $id)
    {

        $monodroga = Monodroga::find($id); // Busca x por su ID

        $request->validate([
            'nombre' => 'required'
        ]);

        $monodroga->update($request->all());

        return response()->json($monodroga, 200);
    }

    // Eliminar un registro
    public function eliminarMonodroga($id)
    {

        $modroga = Monodroga::find($id);
        $modroga->delete();

        return response()->json([], 204);
    }
}
