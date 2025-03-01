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

    // Crea un nuevo registro de empleado a traves de una peticion
    public function crearEmpleado(Request $request){
        $request->validate([
            'cedula' => 'required|unique:empleados|max:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|unique:empleados',
            'direccion' => 'required',
        ]); // Validaciones para los campos del registro

        $empleado = new Empleado();

        $empleado->cedula = $request->cedula;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->correo = $request->correo;
        $empleado->direccion = $request->direccion;

        $empleado->save(); // Guarda el registro en la tabla

        return response()->json($empleado, 200); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de un empleado
    public function actualizarEmpleado(Request $request, $empleado){

        $empleado = Empleado::find($empleado); // Busca a un empleado por su ID

        $request->validate([
            'cedula' => 'required|unique:empleados|max:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => "required|unique:empleados,correo,{$empleado->correo}",
            'direccion' => 'required',
        ]);

        $empleado->cedula = $request->cedula;
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->correo = $request->correo;
        $empleado->direccion = $request->direccion;

        return response()->json($empleado, 200);
    }

    // Elimina un empleado de la tabla
    public function eliminarEmpleado($empleado){
        $empleado = Empleado::find($empleado);
        $empleado->delete();

        return response()->json([], 204);
    }
}
