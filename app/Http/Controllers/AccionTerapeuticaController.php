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

        return view('farmaceutico.accion', compact('accionT'));
    }

    public function obtenerAT($id)
    {
        $accionT = AccionTerapeutica::findOrFail($id);

        return view('farmaceutico.editFormAc', compact('accionT'));
    }

    public function buscarAccion(Request $request){
        $query = $request->input('query');

        $accionT = AccionTerapeutica::where('nombre', 'LIKE', '%' . $query . '%')->get();

        return view('farmaceutico.accion', compact('accionT'));
    }

    // Crear un nuevo Registro

    public function crearAT(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $accionT = AccionTerapeutica::create($request->all());

        return redirect('/farmaceutico/accion');
    }

    // Actualiza los datos 
    public function actualizarAT(Request $request, $id)
    {

        $accionT = AccionTerapeutica::find($id); // Busca x por su ID

        $request->validate([
            'nombre' => 'required'
        ]);

        $accionT->update($request->all());

        return redirect('/farmaceutico/accion');
    }

    // Eliminar un registro
    public function eliminarAT($id)
    {

        $accionT = AccionTerapeutica::find($id);
        $accionT->delete();

        return redirect('/farmaceutico/accion');
    }
}
