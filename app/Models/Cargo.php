<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';
    protected $fillable=[
        'nombre'
    ];
    public $timestamps = false;

    //Relacion Muchos a muchos 

    public function empleados(){
        return $this->belongsToMany(Empleado::class, 'cargo_empleado', 'cargo_id', 'empleado_id')->withPivot('fechaInicio', 'fechaFin');
    }
}
