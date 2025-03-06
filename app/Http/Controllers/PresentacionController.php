<?php

namespace App\Http\Controllers;

use App\Models\Presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    // Muestra todas las presentaciones
    public function index(){
        $presentaciones = Presentacion::all();
        return view('presentaciones.index', compact('presentaciones'));
    }

    // Muestra una presentacion en especifico
    public function mostrarPresentacion($presentacion){
        $presentacion = Presentacion::find($presentacion);
        return $presentacion;
    }

    //vista para crear una nueva presentacion
    public function crearPresentacion(){
        return view('presentaciones.create');
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

        return redirect()->route('/presentaciones');
    }
    // Editar presentacion
    public function editarPresentacion($presentacion){
        $presentacion = Presentacion::find($presentacion);

        return view('presentaciones.edit', compact('presentacion'));
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

        return redirect()->route('/presentaciones');
    }

    // Eliminar presentacion
    public function eliminarPresentacion($presentacion){
        $presentacion = Presentacion::find($presentacion);
        $presentacion->delete(); // Elimina el registro de la tabla

        return redirect()->route('/presentaciones');
    }
}
