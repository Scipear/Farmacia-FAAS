<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoEmpleado extends Model
{
    use HasFactory;

    protected $table = 'cargoEmpleado';
    protected $fillable = ['cargos_id', 'empleados_id', 'fechaInicio', 'fechaFin'];

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'cargos_id');
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'empleados_id');
    }
}
