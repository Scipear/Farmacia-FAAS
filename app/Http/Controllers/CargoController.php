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
        return view('admin.cargo', compact('cargos'));
    }

    //mostrar un cargo en específico
    public function mostrarCargo($cargo)
    {
        $cargo = Cargo::findOrFail($cargo);
        return $cargo;
    }

    public function buscarCargo(Request $request){
        $query = $request->input('query');

        $cargos = Cargo::where('nombre', 'LIKE', '%' . $query . '%')->get();

        return view('admin.cargo', compact('cargos'));
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
        $cargo = Cargo::findOrFail($cargo);
        return view('cargos.edit', compact('cargo'));
    }

    //actualizar un cargo
    public function actualizarCargo(Request $request, $cargo)
    {
        $request->validate([
            'nombre' => 'required|unique:cargos'
        ]);

        $cargo = Cargo::findOrFail($cargo);
        $cargo->nombre = $request->input('nombre');
        $cargo->save(); // Guarda el registro en la tabla
        return redirect('/cargos');
    }

    //eliminar un cargo
    public function eliminarCargo($cargo)
    {
        $cargo = Cargo::findOrFail($cargo);
        $cargo->delete();
        return redirect('/cargos');
    }

    //devuelve todos los empleados que están asociados a un cargo
    public function empleadosPorCargo($empleadoId){
        $cargo = Cargo::findOrFail($empleadoId);
        return $cargo->empleados;
    }
}
