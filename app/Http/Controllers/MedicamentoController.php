<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    //Obtener medicamentos de la tabla

    public function mostrarMedicamento()
    {
        $medicamento = Medicamento::all();

        return response()->json($medicamento, 200);
    }

    public function obtenerMedicamento($id)
    {
        $medicamento = Medicamento::find($id);

        return response()->json($medicamento, 200);
    }

    // Crear un nuevo Registro

    public function crearMedicamento(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:medicamentos',
            'monodrogas' => 'required|array',
            'monodrogas.*.monodroga_id' => 'required|exists:monodrogas,id',
            'acciones' => 'required|array',
            'acciones.*.accion__id' => 'required|exists:acciones_terapeuticas,id',
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

        return response()->json($medicamento, 200);
    }

    // Actualiza los datos 
    public function actualizarMedicamento(Request $request, $id)
    {

        $medicamento = Medicamento::find($id); // Busca x por su ID

        $request->validate([
            'nombre' => 'required|unique:medicamentos'
        ]);

        $medicamento->update($request->all());

        return response()->json($medicamento, 200);
    }

    // Eliminar un registro
    public function eliminarMedicamento($id)
    {

        $medicamento = Medicamento::find($id);
        $medicamento->delete();

        return response()->json([], 204);
    }

    //Asignaler acciones terapeuticas a un medicamento 

    public function asignarAccionTerapeutica($accionTerapeutica_Id, $medicamento)
    {
        $medicamento->accionTerapeutica()->sync([$accionTerapeutica_Id]);
    }


    //Asignaler monodrogas a un medicamento 

    public function asignarMonodrogas($monodroga_Id, $medicamento)
    {
        $medicamento->monodrogas()->sync([$monodroga_Id]);
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
