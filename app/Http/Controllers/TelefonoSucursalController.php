<?php

namespace App\Http\Controllers;

use App\Models\TelefonoSucursal;
use Illuminate\Http\Request;

class TelefonoSucursalController extends Controller
{
    //Muestra todos los tlf de las sucursales
    public function index(){
        $telefonos = TelefonoSucursal::all();
        return view('telefonos.index', compact('telefonos'));
    }

    //Muestra el tlf de una sucursal en especifico
    public function mostrarTelefono($telefono){
        $telefono = TelefonoSucursal::find($telefono);
        return $telefono;
    }

    //Muestra el formulario para crear un nuevo tlf
    public function crearTelefono(){
        return view('telefonos.create');
    }

    //guarda un nuevo registro de tlf a traves de una peticion
    public function guardarTelefono(Request $request){
        // Validaciones para los campos del registro
        $request->validate([
            'numero' => 'required',
            'sucursal_id' => 'required',
            'tipo' => 'required'
        ]);

        $telefono = new TelefonoSucursal();

        $telefono->telefono = $request->telefono;
        $telefono->sucursal_id = $request->sucursal_id;
        $telefono->save(); // Guarda el registro en la tabla

        return redirect()->route('/telefonos');
    }

    //Editar tlf
    public function editarTelefono($telefono){
        $telefono = TelefonoSucursal::find($telefono);

        return view('telefonos.edit', compact('telefono'));
    }

    //actualizar tlf
    public function actualizarTelefono(Request $request, $telefono){
        // Validaciones para los campos del registro
        $request->validate([
            'numero' => 'required',
            'sucursal_id' => 'required',
            'tipo' => 'required'
        ]);

        $telefono = TelefonoSucursal::find($telefono);

        $telefono->numero = $request->numero;
        $telefono->sucursal_id = $request->sucursal_id;
        $telefono->save(); // Guarda el registro en la tabla

        return redirect()->route('/telefonos');
    }

    //Eliminar tlf
    public function eliminarTelefono($telefono){
        $telefono = TelefonoSucursal::find($telefono);
        $telefono->delete();

        return redirect()->route('/telefonos');
    }
}