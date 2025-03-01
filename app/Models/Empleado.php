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
<<<<<<< HEAD

    public function cargos(){
=======
    public function  cargos(){
        return $this->belongsToMany(Cargo::class);
    }
>>>>>>> 7cfbad940fbdf790d23f0dd49a1907e8c87312be

    public function sucursales(){
        return $this->belongsToMany(Sucursal::class, 'empleado_sucursal');
    }
}
