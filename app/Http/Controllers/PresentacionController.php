<?php

namespace App\Http\Controllers;

use App\Models\Presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    // Muestra todas las presentaciones
    public function index(){
        $presentaciones = Presentacion::all();

        return view('farmaceutico.presentacion', compact('presentaciones'));
    }

    // Muestra una presentacion en especifico
    public function mostrarPresentacion($presentacion){
        $presentacion = Presentacion::find($presentacion);
        
        return view('farmaceutico.editFormPre', compact('presentacion'));
    }

    public function buscarPresentacion(Request $request){
        $query = $request->input('query');

        $presentaciones = Presentacion::where('tipo', 'LIKE', '%' . $query . '%')->get();

        return view('farmaceutico.presentacion', compact('presentaciones'));
    }

    // Crea un nuevo registro de presentacion a traves de una peticion
    public function guardarPresentacion(Request $request){
        // Validaciones para los campos del registro
        $request->validate([
            'tipo' => 'required',
            'cantidad' => 'required',
            'medida' => 'required',
            'unidades' => 'required',
        ]);

        $presentacion = new Presentacion();

        $presentacion->tipo = $request->tipo;
        $presentacion->cantidad = $request->cantidad;
        $presentacion->medida = $request->medida;
        $presentacion->unidades = $request->unidades;
        $presentacion->save(); // Guarda el registro en la tabla

        return redirect('/farmaceutico/presentacion');
    }

    // Actualizar presentacion
    public function actualizarPresentacion(Request $request, $presentacion){
        // Validaciones para los campos del registro
        $request->validate([
            'tipo' => 'required',
            'cantidad' => 'required',
            'medida' => 'required',
            'unidades' => 'required',
        ]);

        $presentacion = Presentacion::find($presentacion);

        $presentacion->tipo = $request->tipo;
        $presentacion->cantidad = $request->cantidad;
        $presentacion->medida = $request->medida;
        $presentacion->unidades = $request->unidades;
        $presentacion->save(); // Guarda el registro en la tabla

        return redirect('/farmaceutico/presentacion');
    }

    // Eliminar presentacion
    public function eliminarPresentacion($presentacion){
        $presentacion = Presentacion::find($presentacion);
        $presentacion->delete(); // Elimina el registro de la tabla

        return redirect('/farmaceutico/presentacion');
    }

    //obtener todas las medicinas asociadas a una presentación
    public function medicinasPorPresentacion($medicinaId){
        $presentacion = Presentacion::where('medicina_id', $medicinaId)->get();
        return $presentacion->medicinas;
    }

}
