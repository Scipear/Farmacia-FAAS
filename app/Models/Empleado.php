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
        'direccion',
        'status',
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
        return $this->belongsToMany(Cargo::class, 'cargo_empleado', 'empleado_id', 'cargo_id')->withPivot('fechaInicio', 'fechaFin');
    }

    public function sucursales(){
        return $this->belongsToMany(Sucursal::class, 'empleado_sucursal', 'empleado_id', 'sucursal_id')->withPivot('fecha_inicio', 'fecha_salida');
    }
}
