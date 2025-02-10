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

    //Relacion uno a Muchos

    public function telefonos(){
    return $this->hasMany(TelefonoEmpleado::class());
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class());
    }

    public function cargo(){
        return $this->hasMany(CargoEmpleado::class());
    }
}
