<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function mostrarLaboratorios()
    {
        $laboratios = Laboratorio::all();
        return response()->json($laboratios, 200);
    }

    public function obtenerLaboratorioID($id)
    {
        $laboratorio = Laboratorio::find($id);

        return response()->json($laboratorio, 200);
    }

    // Crea un nuevo registro de laboratorio a traves de una peticion
    public function crearLaboratorio(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'correo' => 'required|unique:laboratorios',

        ]); // Validaciones para los campos del registro


        $laboratorio = Laboratorio::create($request->only(['nombre', 'ciudad', 'direccion', 'correo']));


        return response()->json($laboratorio, 200); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de un labpratorio
    public function actualizarLaboratorio(Request $request, $id)
    {

        $laboratorio = Laboratorio::find($id); // Busca a un labpratorio por su ID

        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'correo' => "required|unique:laboratorios,correo,{$laboratorio->id}",
        ]);

        $laboratorio->update($request->all());

        return response()->json($laboratorio, 200);
    }

    public function eliminarLaboratorio($id){
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->delete();
        
        return response()->json([], 204);
    }
}
