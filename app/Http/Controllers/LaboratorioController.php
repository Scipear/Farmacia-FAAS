<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboratorioController extends Controller
{
    public function mostrarLaboratorios()
    {
        $laboratorios = Laboratorio::all();
        
        $user = Auth::user();
        $empleado = $user->empleado;
        $sucursal = $empleado->sucursales->whereNull('empleado_sucursal.fecha_salida')->first();
        $cargo = $empleado->cargos->whereNull('cargo_sucursal.fechaFinal')->first();

        if($cargo->nombre == "Administrador General"){
            return view('admin.laborat', compact('laboratorios'));

        }else if($cargo->nombre == "Gerente"){
            return view('gerente.laboratorios', compact('laboratorios', 'sucursal'));
        }
    }

    public function obtenerLaboratorioID($id)
    {
        $laboratorio = Laboratorio::find($id);

        return view('admin.editFormLab', compact('laboratorio'));
    }

    public function buscarLaboratorio(Request $request){

        $query = $request->input('query');

        $user = Auth::user();
        $empleado = $user->empleado;
        $sucursal = $empleado->sucursales->whereNull('empleado_sucursal.fecha_salida')->first();
        $cargo = $empleado->cargos->whereNull('cargo_sucursal.fechaFinal')->first();

        $laboratorios = Laboratorio::where('nombre', 'LIKE', '%' . $query . '%')->get();

        if($cargo->nombre == "Administrador General"){
            return view('admin.laborat', compact('laboratorios'));

        }else if($cargo->nombre == "Gerente"){
            return view('gerente.laboratorios', compact('laboratorios', 'sucursal'));
            
        }
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
            'telefonos.0.tipo' => 'required',
            'telefonos.0.numero' => 'required',

        ]); // Validaciones para los campos del registro


        $laboratorio = Laboratorio::create($request->only(['nombre', 'ciudad', 'direccion', 'correo']));

        if($request->has('telefonos')){
            foreach($request->telefonos as $telefono){
                if($telefono['tipo'] && $telefono['numero']){
                    $laboratorio->telefonos()->create([
                        'laboratorio_id' => $laboratorio->id,
                        'tipo' => $telefono['tipo'],
                        'numero' => $telefono['numero']
                    ]);
                }
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
            'telefonos.0.tipo' => 'required',
            'telefonos.0.numero' => 'required',
        ]);

        $laboratorio->update($request->only(['nombre', 'ciudad', 'direccion', 'correo']));

        $laboratorio->telefonos()->delete();

        if($request->has('telefonos')){
            foreach($request->telefonos as $telefono){
                if($telefono['tipo'] && $telefono['numero']){
                    $laboratorio->telefonos()->create([
                        'laboratorio_id' => $laboratorio->id,
                        'tipo' => $telefono['tipo'],
                        'numero' => $telefono['numero']
                    ]);
                }
            }
        }

        return redirect('/admin/laborat');
    }

    public function afiliarSucursal($laboratorioId, $sucursalId){
        $laboratorio = Laboratorio::findOrFail($laboratorioId);
        $laboratorio->sucursales()->attach($sucursalId);

        return redirect()->back();
    }

    public function desafiliarSucursal($laboratorioId, $sucursalId){
        $laboratorio = Laboratorio::findOrFail($laboratorioId);
        $laboratorio->sucursales()->updateExistingPivot($sucursalId, ['fecha_final' => now()]);

        return redirect()->back();
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

    public function  medicinasPorLaboratorio($laboratorioId)
    {
        $laboratorio = Laboratorio::findOrFail($laboratorioId);

        $medicinas = $laboratorio->medicinas->map(function ($medicina) {
            $medicina->load(['medicamento', 'presentacion']); // Cargar las relaciones
            $medicina->nombre_completo = $medicina->medicamento->nombre . ' ' . $medicina->presentacion->unidades . ' ' . $medicina->presentacion->tipo . ' ' . $medicina->presentacion->cantidad . ' ' . $medicina->presentacion->medida;
            return $medicina;
        });

        return response()->json($medicinas);
    }
}
