<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelefonoEmpleado;

class TelefonoEmpleadoController extends Controller
{
    public function mostrarTelefonosEmpleados(){
        $telefonos = TelefonoEmpleado::all();

        return response()->json($telefonos, 200);
    }

    public function obtenerTelefonoEmpleadoID($id){
        $telefonos = TelefonoEmpleado::findOrFail($id);
        
        return response()->json($telefonos, 200);
    }

    public function crearTelefonoEmpleado(Request $request){
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'numero' => 'required',
            'tipo' => 'required',
        ]);

        $telefono = TelefonoEmpleado::create($request->all());

        return response()->json($telefono, 200);
    }

    public function actualizarTelefonoEmpleado(Request $request, $id){
        $telefono = TelefonoEmpleado::findOrFail($id);

        $request->validate([
            'numero' => 'required',
            'tipo' => 'required',
        ]);

        $telefono->update($request->all());

        return response()->json($telefono, 200);
    }

    public function eliminarTelefonoEmpleado($id){
        $telefono = TelefonoEmpleado::findOrFail($id);
        $telefono->delete();
        
        return response()->json([], 204);
    }
}
