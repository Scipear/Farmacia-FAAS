<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TelefonoLaboratorio;
use Illuminate\Http\Request;


class TelefonoLaboratorioController extends Controller
{
    //Obtener telefonos de la tabla

    public function mostrarTelefonosLab()
    {
        $telefonos = TelefonoLaboratorio::all();

        return response()->json($telefonos, 200);
    }

    public function obtenerTelefonoID($id)
    {
        $telefono = TelefonoLaboratorio::find($id);

        return response()->json($telefono, 200);
    }

    // Crear un nuevo Registro

    public function crearTelefono(Request $request)
    {
        $request->validate([
            'numero' => 'required|numeric'
        ]);

        $telefonoLab = TelefonoLaboratorio::created($request->all());

        return response()->json($telefonoLab, 200);
    }

    // Actualiza los datos de telefono
    public function actualizarTelefono(Request $request, $id)
    {

        $telefono = TelefonoLaboratorio::find($id); // Busca un tlf x por su ID

        $request->validate([
            'numero' => 'required|numeric'
        ]);

        $telefono->update($request->all());

        return response()->json($telefono, 200);
    }

    // Elimina una medicina de la tabla
    public function eliminarTlf($id)
    {

        $telefono = TelefonoLaboratorio::find($id);
        $telefono->delete();

        return response()->json([], 204);
    }
}
