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
        $monodrogas = Monodroga::all();

        return view('farmaceutico.monodroga', compact('monodrogas'));
    }

    public function obtenerMonodroga($id)
    {
        $monodroga = Monodroga::findOrFail($id);

        return view('farmaceutico.editFormMon', compact('monodroga'));
    }

    public function buscarMonodroga(Request $request){
        $query = $request->input('query');

        $monodrogas = Monodroga::where('nombre', 'LIKE', '%' . $query . '%')->get();

        return view('farmaceutico.monodroga', compact('monodrogas'));
    }

    // Crear un nuevo Registro

    public function crearMonodroga(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $monodroga = Monodroga::create($request->all());

        return redirect('/farmaceutico/monodroga');
    }

    // Actualiza los datos 
    public function actualizarMonodroga(Request $request, $id)
    {
        $monodroga = Monodroga::find($id); // Busca x por su ID

        $request->validate([
            'nombre' => 'required'
        ]);

        $monodroga->update($request->all());

        return redirect('/farmaceutico/monodroga');
    }

    // Eliminar un registro
    public function eliminarMonodroga($id)
    {

        $modroga = Monodroga::find($id);
        $modroga->delete();

        return redirect('/farmaceutico/monodroga');
    }
}
