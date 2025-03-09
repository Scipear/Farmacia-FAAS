<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AccionTerapeutica;
use App\Models\Medicamento;
use App\Models\Monodroga;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    //Obtener medicamentos de la tabla

    public function mostrarMedicamento()
    {
        $medicamentos = Medicamento::all();

        return view('farmaceutico.medicamento', compact('medicamentos'));
    }

    public function obtenerMedicamento($id)
    {
        $medicamento = Medicamento::find($id);
        $monodrogas = Monodroga::all();
        $acciones = AccionTerapeutica::all();

        return view('farmaceutico.editFormMedicamento', compact('medicamento', 'monodrogas', 'acciones'));
    }

    public function buscarMedicamento(Request $request){
        $query = $request->input('query');

        $medicamentos = Medicamento::where('nombre', 'LIKE', '%' . $query . '%')->get();

        return view('farmaceutico.medicamento', compact('medicamentos'));
    }

    public function formMedicamento(){
        $monodrogas = Monodroga::all();
        $acciones = AccionTerapeutica::all();

        return view('farmaceutico.formMedicamento', compact('monodrogas', 'acciones'));
    }

    // Crear un nuevo Registro
    public function crearMedicamento(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:medicamentos',
            'monodrogas' => 'required|array',
            'monodrogas.*.monodroga_id' => 'required|exists:monodrogas,id',
            'acciones' => 'required|array',
            'acciones.*.accion_id' => 'required|exists:accionTerapeutica,id',
        ]);

        
        $medicamento = Medicamento::create($request->only(['nombre']));
        
        if($request->has('monodrogas')){
            foreach($request->monodrogas as $monodroga){
                $this->asignarMonodrogas($monodroga, $medicamento);
            }
        }

        if($request->has('acciones')){
            foreach($request->acciones as $accion){
                $this->asignarAccionTerapeutica($accion, $medicamento);
            }
        }

        return redirect('/farmaceutico/medicamento');
    }

    // Actualiza los datos 
    public function actualizarMedicamento(Request $request, $id)
    {

        $medicamento = Medicamento::find($id); // Busca x por su ID

        $request->validate([
            'nombre' => "required|unique:medicamentos,nombre,{$id}",
            'monodrogas' => 'required|array',
            'monodrogas.*.monodroga_id' => 'required|exists:monodrogas,id',
            'acciones' => 'required|array',
            'acciones.*.accion_id' => 'required|exists:accionTerapeutica,id',
        ]);

        $medicamento->update($request->only(['nombre']));

        if($request->has('monodrogas')){
            $medicamento->monodrogas()->detach();
            
            foreach($request->monodrogas as $monodroga){
                $this->asignarMonodrogas($monodroga, $medicamento);
            }
        }

        if($request->has('acciones')){
            $medicamento->accionTerapeutica()->detach();
            foreach($request->acciones as $accion){
                $this->asignarAccionTerapeutica($accion, $medicamento);
            }
        }

        return redirect('/farmaceutico/medicamento');
    }

    // Eliminar un registro
    public function eliminarMedicamento($id)
    {

        $medicamento = Medicamento::find($id);
        $medicamento->delete();

        return redirect('/farmaceutico/medicamento');
    }

    //Asignaler acciones terapeuticas a un medicamento 

    public function asignarAccionTerapeutica($accionTerapeutica_Id, $medicamento)
    {
        $medicamento->accionTerapeutica()->attach([$accionTerapeutica_Id]);
    }


    //Asignaler monodrogas a un medicamento 

    public function asignarMonodrogas($monodroga_Id, $medicamento)
    {
        $medicamento->monodrogas()->attach([$monodroga_Id]);
    }

    //funcion para obtener las acciones terapeuticas de un medicamento 

    public function AccionTPorMedicamento($medicamentoId)
    {
        $medicamento = Medicamento::where('medicamento_id', $medicamentoId)->get();

        return $medicamento->accionTerapeutica;
    }

    //funcion para obtener todas monodrogas de un medicamento 

    public function MonodrogasPorMedicamento($medicamentoId)
    {
        $medicamento = Medicamento::where('medicamento_id', $medicamentoId)->get();

        return $medicamento->monodrgas;
    }

    //funcion para obtener todas las medicinas de un medicamento 

    public function MedicinasPorMedicamento($medicamentoId)
    {
        $medicamento = Medicamento::where('medicamento_id', $medicamentoId)->get();

        return $medicamento->medicina;
    }
}
