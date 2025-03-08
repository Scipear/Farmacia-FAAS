<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function mostrarLaboratorios()
    {
        $laboratorios = Laboratorio::all();
        return view('admin.laborat', compact('laboratorios'));
    }

    public function obtenerLaboratorioID($id)
    {
        $laboratorio = Laboratorio::find($id);

        return view('admin.editFormLab', compact('laboratorio'));
    }

    public function buscarLaboratorio(Request $request){
        $query = $request->input('query');

        $laboratorios = Laboratorio::where('nombre', 'LIKE', '%' . $query . '%')->get();

        return view('admin.laborat', compact('laboratorios'));
    }

    // Crea un nuevo registro de laboratorio a traves de una peticion
    public function crearLaboratorio(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'correo' => 'required|unique:laboratorios',
            'telefonos' => 'required|array',
            'telefonos.*.tipo' => 'required',
            'telefonos.*.numero' => 'required',

        ]); // Validaciones para los campos del registro


        $laboratorio = Laboratorio::create($request->only(['nombre', 'ciudad', 'direccion', 'correo']));

        if($request->has('telefonos')){
            foreach($request->telefonos as $telefono){
                $laboratorio->telefonos()->create([
                    'laboratorio_id' => $laboratorio->id,
                    'tipo' => $telefono['tipo'],
                    'numero' => $telefono['numero']
                ]);
            }
        }


        return redirect('/admin/laborat'); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de un laboratorio
    public function actualizarLaboratorio(Request $request, $id)
    {

        $laboratorio = Laboratorio::findOrFail($id); // Busca a un labpratorio por su ID

        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'correo' => "required|unique:laboratorios,correo,{$laboratorio->id}",
            'telefonos' => 'required|array',
            'telefonos.*.tipo' => 'required',
            'telefonos.*.numero' => 'required',
        ]);

        $laboratorio->update($request->only(['nombre', 'ciudad', 'direccion', 'correo']));

        $laboratorio->telefonos()->delete();

        if ($request->has('telefonos')) {
            foreach ($request->telefonos as $telefono) {
                if ($telefono['numero']) { // Añade el teléfono solo si tiene número
                    $laboratorio->telefonos()->create([
                        'tipo' => $telefono['tipo'],
                        'numero' => $telefono['numero'],
                    ]);
                }
            }
        }

        return redirect('/admin/laborat');
    }

    public function eliminarLaboratorio($id){
        $laboratorio = Laboratorio::find($id);
        $laboratorio->delete();

        return redirect('/admin/laborat');
    }

    //Funcion para obtener todas las sucursales que despachan un laboratorio

    public function surcursalesPorLaboratorio($laboratioId)
    {
        $laboratorio = Laboratorio::where('laboratorio_id', $laboratioId)->get();

        return $laboratorio->sucursal;
    }

    //Funcion para obtener todos los pedidos que se le han hecho a un laboratorio 

    public function  pedidosPorLaboratorio($laboratioId)
    {
        $laboratorio = Laboratorio::where('laboratorio_id', $laboratioId)->get();

        return $laboratorio->pedidos;
    }

    //Funcion para obtener todos los telefonos de un laboratorio 

    public function  telefonosPorLaboratorio($laboratioId)
    {
        $laboratorio = Laboratorio::where('laboratorio_id', $laboratioId)->get();

        return $laboratorio->telefonos;
    }


    //Funcion para obtener todas las medicinas que distribuye un laboratorio 

    public function  medicinasPorLaboratorio($laboratioId)
    {
        $laboratorio = Laboratorio::where('laboratorio_id', $laboratioId)->get();

        return $laboratorio->medicinas;
    }
}
