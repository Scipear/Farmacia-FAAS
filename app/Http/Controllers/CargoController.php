<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    //mostrar la lista completa de cargos
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargos.index', compact('cargos'));
    }

    //mostrar un cargo en específico
    public function mostrarCargo($cargo)
    {
        $cargo = Cargo::find($cargo);
        return $cargo;
    }

    //vista para crear un nuevo cargo
    public function crearCargo()
    {
        return view('cargos.create');
    }

    //guardar un nuevo cargo
    public function guardarCargo(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:cargos'
        ]);

        $cargo = new Cargo();
        $cargo->nombre = $request->input('nombre');
        $cargo->save(); // Guarda el registro en la tabla
        return redirect('/cargos');
    }

    //vista para editar un cargo
    public function editarCargo($cargo)
    {
        $cargo = Cargo::find($cargo);
        return view('cargos.edit', compact('cargo'));
    }

    //actualizar un cargo
    public function actualizarCargo(Request $request, $cargo)
    {
        $request->validate([
            'nombre' => 'required|unique:cargos'
        ]);

        $cargo = Cargo::find($cargo);
        $cargo->nombre = $request->input('nombre');
        $cargo->save(); // Guarda el registro en la tabla
        return redirect('/cargos');
    }

    //eliminar un cargo
    public function eliminarCargo($cargo)
    {
        $cargo = Cargo::find($cargo);
        $cargo->delete();
        return redirect('/cargos');
    }
}
