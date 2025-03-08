<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\TelefonoEmpleado;
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

    public function obtenerTelefonosdeEmpleado($id){
        $telefonos = TelefonoEmpleado::where('empleado_id', $id)->get();
        
        return response()->json($telefonos, 200);
    }

    // Crea un nuevo registro de empleado a traves de una peticion
    public function crearEmpleado(Request $request){
        $request->validate([
            'cedula' => 'required|unique:empleados|max:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|unique:empleados',
            'direccion' => 'required',
            'telefonos' => 'required|array',
            'telefonos.*.tipo' => 'required',
            'telefonos.*.numero' => 'required',
            'cargo' => 'required|exists:cargos,id', // id del cargo que va a ejercer el empleado
            'sucursal' => 'required|exists:sucursales,id', // id de la sucursal en la que va a trabajar el empleado
        ]); // Validaciones para los campos del registro


        $empleado = Empleado::create($request->only(['cedula', 'nombre', 'apellido', 
        'correo', 'direccion'])); // Guarda en la tabla de empleados unicamente los datos que van en dicha tabla

        if($request->has('cargo')){
            $this->asignarCargo($request->cargo, $empleado);
        }
    
        if($request->has('sucursal')){
            $this->asignarSucursal($request->sucursal, $empleado);
        }

        if($request->has('telefonos')){
            foreach($request->telefonos as $telefono){
                $empleado->telefonos()->create([
                    'empleado_id' => $empleado->id,
                    'tipo' => $telefono['tipo'],
                    'numero' => $telefono['numero']
                ]);
            }
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
        
        if($cargoActual && ((int)$cargoActual->id !== (int)$request->cargo)){
            $empleado->cargos()->updateExistingPivot($cargoActual->id, ['fechaFin' => now()]);
            
            $empleado->cargos()->attach([$request->cargo]);
        } /* Un empleado solo puede tener un cargo a la vez (Supongo) por lo que si al actualizar
        un empleado viene con un nuevo cargo se edita ese registro en la tabla cargo_empleado colocando
        una fecha de fin y se le asigna el nuevo cargo al empleado */
        
        $sucursalActual = $empleado->sucursales()->whereNull('empleado_sucursal.fecha_salida')->first();

        if($sucursalActual && ((int)$sucursalActual->id !== (int)$request->sucursal)){
            $empleado->sucursales()->updateExistingPivot($sucursalActual->id, ['fecha_salida' => now()]);
            
            $empleado->sucursales()->attach([$request->sucursal]);
        } /* Un empleado solo puede trabajar en una sucursal a la vez por lo que si al actualizar
        un empleado viene con una nueva sucursal realiza el mismo proceso que con el cargo */

        
        $empleado->update($request->only(['cedula', 'nombre', 'apellido', 
        'correo', 'direccion', 'status']));

        return response()->json($empleado, 200);
    }

    public function desasignarEmpleado(Request $request, $id){
        $empleado = Empleado::findOrFail($id);
        
        $request->validate([
            'status' =>'required',
        ]);

        $empleado->update(['status' => $request->status]);
        $cargoActual = $empleado->cargos()->whereNull('cargo_empleado.fechaFin')->first();
        $sucursalActual = $empleado->sucursales()->whereNull('empleado_sucursal.fecha_salida')->first();

        if($cargoActual && $sucursalActual){
            $empleado->cargos()->updateExistingPivot($cargoActual->id, ['fechaFin' => now()]);
            $empleado->sucursales()->updateExistingPivot($sucursalActual->id, ['fecha_salida' => now()]);
        }

        return response()->json($empleado, 200);
    }

    // Elimina un empleado de la tabla
    public function eliminarEmpleado($id){
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        
        return response()->json([], 204);
    }

    // Crear funcion para mostrar la ficha de un trabajador

    public function asignarCargo($cargo_id, $empleado){
        $empleado->cargos()->sync([$cargo_id]);
    }

    public function asignarSucursal($sucursal_id, $empleado){
        $empleado->sucursales()->sync([$sucursal_id]);
    }
}
