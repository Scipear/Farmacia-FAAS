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
        $empleado = Empleado::findOrFail($id);
        
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
            'status' => 'required',
            'cargo' => 'required|exists:cargos,id',
            'sucursal' => 'required|exists:sucursales,id',
        ]); // Validaciones para los campos del registro

        $empleado = Empleado::create($request->only(['cedula', 'nombre', 'apellido', 'correo', 'direccion', 'status']));

        if($request->has('cargo')){
            $this->asignarCargo($request->cargo, $empleado);
        }
    
        if($request->has('sucursal')){
            $this->asignarSucursal($request->sucursal, $empleado);
        }
    
        return response()->json($empleado, 200); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de un empleado
    public function actualizarEmpleado(Request $request, $id){

        $empleado = Empleado::findOrFail($id); // Busca a un empleado por su ID

        $request->validate([
            'cedula' => "required|unique:empleados,cedula,{$id}|max:8",
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => "required|unique:empleados,correo,{$id}",
            'direccion' => 'required',
            'status' => 'required',
            'cargo' => 'required|exists:cargos,id',
            'sucursal' => 'required|exists:sucursales,id',
        ]);

        $cargoActual = $empleado->cargos()->whereNull('cargo_empleado.fechaFin')->first();
        
        if($cargoActual && ($cargoActual->id !== $request->cargo)){
            $empleado->cargos()->updateExistingPivot($cargoActual->id, ['fechaFin' => now()]);
            
            $this->asignarCargo($request->cargo, $empleado);
        }
        
        $sucursalActual = $empleado->sucursales()->whereNull('empleado_sucursal.fecha_salida')->first();

        if($sucursalActual && ($sucursalActual->id !== $request->sucursal)){
            $empleado->sucursales()->updateExistingPivot($sucursalActual->id, ['fecha_salida' => now()]);
            
            $this->asignarSucursal($request->sucursal, $empleado);
        }

        $empleado->update($request->only(['cedula', 'nombre', 'apellido', 'correo', 'direccion', 'status']));

        return response()->json($empleado, 200);
    }

    // Crear aqui funcion para cuando se despide o renuncia un empleado

    
    // Elimina un empleado de la tabla
    public function eliminarEmpleado($id){
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        
        return response()->json([], 204);
    }

    public function asignarCargo($cargo_id, $empleado){
        $empleado->cargos()->sync([$cargo_id]);
    }

    public function asignarSucursal($sucursal_id, $empleado){
        $empleado->sucursales()->sync([$sucursal_id]);
    }
}
