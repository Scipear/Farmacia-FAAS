<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Obtiene todos los empleados de la tabla
    public function mostrarEmpleados(){
        $empleados = Empleado::all();

        return response()->json($empleados, 200);
    }

    public function obtenerEmpleadoID($id){
        $empleado = Empleado::find($id);
        
        return response()->json($empleado, 200);
    }

    // Crea un nuevo registro de empleado a traves de una peticion
    public function crearEmpleado(Request $request){
        $request->validate([
            'cedula' => 'required|unique:empleados|max:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|unique:empleados',
            'direccion' => 'required',
            'cargo' => 'required|exists:cargos,id',
            'sucursal' => 'required|exists:sucursales,id',
        ]); // Validaciones para los campos del registro

        $empleado = Empleado::create($request->only(['cedula', 'nombre', 'apellido', 'correo', 'direccion']));

        if($request->has('cargo')){
            asignarCargo($request->cargo, $empleado);
        }
    
        if($request->has('sucursal')){
            asignarSucursal($request->sucursal, $empleado);
        }
    
        return response()->json($empleado, 200); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de un empleado
    public function actualizarEmpleado(Request $request, $id){

        $empleado = Empleado::find($id); // Busca a un empleado por su ID

        $request->validate([
            'cedula' => 'required|unique:empleados|max:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => "required|unique:empleados,correo,{$empleado->correo}",
            'direccion' => 'required',
        ]);

        $empleado->update($request->all());

        return response()->json($empleado, 200);
    }


    public function asignarCargo($cargo_id, Empleado $empleado){
        $empleado->cargos()->attach([$request->cargo_id]);
    }

    public function asignarSucursal($sucursal_id, Empleado $empleado){
        $empleado->sucursales()->attach([$request->sucursal_id]);
    }

    // Elimina un empleado de la tabla
    public function eliminarEmpleado($id){
        $empleado = Empleado::find($id);
        $empleado->delete();

        return response()->json([], 204);
    }
}
