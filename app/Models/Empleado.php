<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'correo',
        'direccion'
    ];
    public $timestamps = false;

    //Relacion uno a Muchos

    public function telefonos(){
        return $this->hasMany(TelefonoEmpleado::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

    // Relacion Muchos a muchos
    public function cargos(){
        return $this->belongsToMany(Cargo::class)->using(Cargo_empleado::class)->withPivot('fechaInicio', 'fechaFin');
    }

    public function sucursales(){
        return $this->belongsToMany(Sucursal::class)->using(Empleado_sucursal::class)->withPivot('fecha_inicio', 'fecha_salida');
    }
}
