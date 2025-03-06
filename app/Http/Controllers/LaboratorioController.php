<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use app\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function mostrarLaboratorios()
    {
        $laboratios = Laboratorio::all();
        return response()->json($laboratios, 200);
    }
}
