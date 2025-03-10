<?php

namespace App\Http\Controllers;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    // Muestra todas las sucursales
    public function index(){
        $sucursales = Sucursal::all();
        
        return view('admin.sucursales', compact('sucursales'));
    }

    // Muestra una sucursal en especifico
    public function mostrarSucursal($sucursal){
        $sucursal = Sucursal::findOrFail($sucursal);
        
        return view('admin.editFormSuc', compact('sucursal'));
    }

    public function buscarSucursal(Request $request){
        $query = $request->input('query');

        $sucursales = Sucursal::where('nombre', 'LIKE', '%' . $query . '%')->get();

        return view('admin.sucursales', compact('sucursales'));
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
            'status' => 'required',
            'telefonos' => 'required|array',
            'telefonos.0.tipo' => 'required',
            'telefonos.0.numero' => 'required',

        ]);

        $sucursal = new Sucursal();

        $sucursal->nombre = $request->nombre;
        $sucursal->ciudad = $request->ciudad;
        $sucursal->estado = $request->estado;
        $sucursal->zona = $request->zona;
        $sucursal->correo = $request->correo;
        $sucursal->direccion = $request->direccion;
        $sucursal->status = $request->status;
        $sucursal->save();

        if($request->has('telefonos')){
            foreach($request->telefonos as $telefono){
                if($telefono['tipo'] && $telefono['numero']){
                    $sucursal->telefonos()->create([
                        'sucursal_id' => $sucursal->id,
                        'tipo' => $telefono['tipo'],
                        'numero' => $telefono['numero']
                    ]);
                }
            }
        }

        return redirect('/admin/sucursales');
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
            'status' => 'required',
            'telefonos' => 'required|array',
            'telefonos.0.tipo' => 'required',
            'telefonos.0.numero' => 'required',

        ]);

        $sucursal->nombre = $request->nombre;
        $sucursal->ciudad = $request->ciudad;
        $sucursal->estado = $request->estado;
        $sucursal->zona = $request->zona;
        $sucursal->correo = $request->correo;
        $sucursal->direccion = $request->direccion;
        $sucursal->status = $request->status;

        $sucursal->save();

        $sucursal->telefonos()->delete();

        if($request->has('telefonos')){
            foreach($request->telefonos as $telefono){
                if($telefono['tipo'] && $telefono['numero']){
                    $sucursal->telefonos()->create([
                        'sucursal_id' => $sucursal->id,
                        'tipo' => $telefono['tipo'],
                        'numero' => $telefono['numero']
                    ]);
                }
            }
        }

        return redirect('/admin/sucursales'); // Redirige a la vista de la sucursal actualizada
    }

    // Elimina una sucursal de la tabla 
    public function eliminarSucursal($sucursal){
        $sucursal = Sucursal::find($sucursal);
        $sucursal->delete();

        return redirect('/admin/sucursales');
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

        
