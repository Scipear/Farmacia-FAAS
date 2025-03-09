<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Laboratorio;
use App\Models\Medicamento;
use App\Models\Medicina;
use App\Models\Medicina_sucursal;
use App\Models\Presentacion;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicinaController extends Controller
{
    public function mostrarMedicinas(){
        $medicinas = Medicina::all();

        return view('farmaceutico.medicina', compact('medicinas'));
    }

    public function obtenerMedicinaID($id){
        $medicina = Medicina::findOrFail($id);

        $laboratorios = Laboratorio::all();
        $medicamentos = Medicamento::all();
        $presentaciones = Presentacion::all();
        
        return view('farmaceutico.editFormMedicina', compact('medicina', 'laboratorios', 'medicamentos', 'presentaciones'));
    }

    public function obtenerMedicinaSucursal($medicinaId, $sucursalId){
        $medicinaSucursal = Medicina_sucursal::where([
            ['medicina_id', $medicinaId],
            ['sucursal_id', $sucursalId],
        ])->first();
        
        return view('farmaceutico.editFormMedicinaSucursal', compact('medicinaSucursal'));
    }

    public function formMedicina(){
        $laboratorios = Laboratorio::all();
        $medicamentos = Medicamento::all();
        $presentaciones = Presentacion::all();

        return view('farmaceutico.formMedicina', compact('laboratorios', 'medicamentos', 'presentaciones'));
    }

    public function formMedicinaSucursal($id){
        $medicina = Medicina::findOrFail($id);
        $sucursales = Sucursal::all();

        return view('farmaceutico.formMedicinaSucursal', compact('sucursales', 'medicina'));
    }

    public function buscarMedicina(Request $request){
        $busqueda = $request->input('query');

        $medicinas = Medicina::whereHas('medicamento', function ($q) use ($busqueda) {
            $q->where('nombre', 'LIKE', '%' . $busqueda . '%');
        })->get();

        if(Auth::check()){
            $user = Auth::user();

            if($user->rol && $user->rol->nombre === 'Farmaceutico'){
                return view('farmaceutico.medicina', compact('medicinas'));
            }
        }

        $sucursales = Sucursal::all();
        $presentaciones = Presentacion::all();
        return view('resultados', compact('medicinas', 'sucursales', 'presentaciones', 'busqueda'));
    }

    public function filtrarBusqueda(Request $request, $busqueda){
        $sucursal_id = $request->input('sucursal_id');
        $presentacion_id = $request->input('presentacion_id');

        $medicinas = Medicina::query();

        if($sucursal_id && $presentacion_id){
            $medicinas->whereHas('sucursales', function ($query) use ($sucursal_id) {
                    $query->where('sucursal_id', $sucursal_id);
                    })->where('presentacion_id', $presentacion_id);
        }else if($sucursal_id){
            // Solo filtro de sucursal
            $medicinas->whereHas('sucursales', function ($query) use ($sucursal_id) {
                    $query->where('sucursal_id', $sucursal_id);
            });
        }else if($presentacion_id){
            // Solo filtro de presentación
            $medicinas->where('presentacion_id', $presentacion_id);
        }

        $medicinas = $medicinas->get();

        $sucursales = Sucursal::all();
        $presentaciones = Presentacion::all();

        return view('resultados', compact('medicinas', 'sucursales', 'presentaciones', 'busqueda'));
    }

    public function obtenerSucursales($id){
        $medicina = Medicina::findOrFail($id);

        $sucursales = Medicina_sucursal::where([
            ['medicina_id', $id],
            ['cantidad', '>', 0],
        ])->get();

        return view('farmaceutico.medicinaSucursales', compact('medicina', 'sucursales'));
    }

    // Crea un nuevo registro de medicina a traves de una peticion
    public function crearMedicina(Request $request){
        $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'presentacion_id' => 'required|exists:presentaciones,id',
            'descripcion' => 'required',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
        ]); // Validaciones para los campos del registro

        $medicina = Medicina::create($request->all());

        return redirect('/farmaceutico/medicina'); // Respuesta en formato JSON implementada por ahora
    }

    // Actualiza los datos de una medicina
    public function actualizarMedicina(Request $request, $id){

        $medicina = Medicina::findOrFail($id); // Busca una medicina por su ID

        $request->validate([
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'presentacion_id' => 'required|exists:presentaciones,id',
            'descripcion' => 'required',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            //'sucursal_id' => 'required|exists:sucursales,id',
            //'cantidad' => 'required|numeric',
            //'observacion' => 'nullable',
        ]);

        $medicina->update($request->only(['laboratorio_id', 'medicamento_id', 'presentacion_id', 'descripcion', 'precio_compra', 'precio_venta']));

        //if($request->has('sucursal_id')){
        //    $mSucursal = $request->only(['sucursal_id', 'cantidad', 'observacion']);

        //    $this->asignarSucursal($mSucursal, $medicina);
        //}

        return redirect('/farmaceutico/medicina');
    }

    public function agregarSucursal(Request $request, $id){
        $medicina = Medicina::findOrFail($id);

        $request->validate([
            'sucursal_id' =>'required|exists:sucursales,id',
            'cantidad' =>'required|numeric',
            'observacion' => 'nullable',
        ]);

        $medicina->sucursales()->attach([$request->only('sucursal_id', 'cantidad', 'observacion')]);

        return redirect("/farmaceutico/medicina/{$id}/sucursales");
    }

    public function actualizarEnSucursal(Request $request, $medicinaId, $sucursalId){
        $request->validate([
            'cantidad' =>'required|numeric',
            'observacion' => 'nullable',
        ]);

        $medicinaSucursal = Medicina_sucursal::where([
            ['medicina_id', $medicinaId],
            ['sucursal_id', $sucursalId],
        ]);

        $medicinaSucursal->update($request->only(['cantidad', 'observacion']));

        return redirect("/farmaceutico/medicina/{$medicinaId}/sucursales");
    }

    // Elimina una medicina de la tabla
    public function eliminarMedicina($id){
        $medicina = Medicina::findOrFail($id);
        $medicina->delete();

        return redirect('/farmaceutico/medicina');
    }
}
