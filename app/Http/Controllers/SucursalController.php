<?php

namespace App\Http\Controllers;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    // Muestra todas las sucursales
    public function index(){
        $sucursales = Sucursal::all();
        
        return view('sucursales.index', compact('sucursales'));
    }

    // Muestra una sucursal en especifico
    public function mostrarSucursal($sucursal){
        $sucursal = Sucursal::find($sucursal);
        return $sucursal;
    }

    //vista para crear una nueva sucursal
    public function crearSucursal(){
        return view('sucursales.create');
    }

    // Crea un nuevo registro de sucursal a traves de una peticion
    public function guardarSucursal(Request $request){
        // Validaciones para los campos del registro
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'zona' => 'required',
            'correo' => 'required|unique:sucursales', // Verifica que el correo sea unico
            'direccion' => 'required',
            //'telefono' => 'required',
            'status' => 'required',
        ]);

        $sucursal = new Sucursal();

        $sucursal->nombre = $request->nombre;
        $sucursal->ciudad = $request->ciudad;
        $sucursal->estado = $request->estado;
        $sucursal->zona = $request->zona;
        $sucursal->correo = $request->correo;
        $sucursal->direccion = $request->direccion;
        //$sucursal->telefono = $request->telefono;
        $sucursal->status = $request->status;
        $sucursal->save(); // Guarda el registro en la tabla

        return redirect()->route('/sucursales');
    }

    public function editarSucursal($sucursal){
        $sucursal = Sucursal::find($sucursal);

        return view('sucursales.edit', compact('sucursal'));
    }

    // Actualiza los datos de una sucursal
    public function actualizarSucursal(Request $request, $sucursal){
        $sucursal = Sucursal::find($sucursal); // Busca a una sucursal por su ID

        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'zona' => 'required',
            'correo' => "required|unique:sucursales,correo,{$sucursal->id}",
            'direccion' => 'required',
            //'telefono' => 'required',
            'status' => 'required',
        ]);

        $sucursal->nombre = $request->nombre;
        $sucursal->ciudad = $request->ciudad;
        $sucursal->estado = $request->estado;
        $sucursal->zona = $request->zona;
        $sucursal->correo = $request->correo;
        $sucursal->direccion = $request->direccion;
        //$sucursal->telefono = $request->telefono;
        $sucursal->status = $request->status;

        $sucursal->save();

        return redirect()->route("/sucursales/{$sucursal->id}"); // Redirige a la vista de la sucursal actualizada
    }

    // Elimina una sucursal de la tabla 
    public function eliminarSucursal($sucursal){
        $sucursal = Sucursal::find($sucursal);
        $sucursal->delete();

        return redirect()->route('/sucursales');
    }

    public function asignarLaboratorio($laboratorio_id, $sucursal){
        $sucursal->laboratorios()->sync([$laboratorio_id]);
    }

    //funcion para obtener los pedidos de una sucursal
    public function pedidosPorSucursal($sucursalId){
        $sucursal = Sucursal::where('sucursal_id', $sucursalId)->get();
        return $sucursal->pedidos;
    }

    //funcion para obtener los empleados de una sucursal
    public function empleadosPorSucursal($sucursalId){
        $sucursal = Sucursal::where('sucursal_id', $sucursalId)->get();
        return $sucursal->empleados;
    }

    //funcion para obtener los laboratorios de una sucursal
    public function laboratoriosPorSucursal($sucursalId){
        $sucursal = Sucursal::where('sucursal_id', $sucursalId)->get();
        return $sucursal->laboratorios;
    }

    //funcion para obtener las medicionas de una sucursal
    public function medicinasPorSucursal($sucursalId){
        $sucursal = Sucursal::where('sucursal_id', $sucursalId)->get();
        return $sucursal->medicinas;
    }

    //funcion para obtener los tlf de una sucursal
    public function telefonosPorSucursal($sucursalId){
        $sucursal = Sucursal::where('sucursal_id', $sucursalId)->get();
        return $sucursal->telefonos;
    }
}

        
