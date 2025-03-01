<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursales';
    protected $fillable = ['nombre', 'direccion', 'correo', 'estado', 'ciudad', 'zona', 'status'];
    public $timestamps = false;


    //relaciones uno a muchos
    
    public function telefonos()
    {
        return $this->hasMany(TelefonoSucursal::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

    // relaciones muchos a muchos

    public function empleados(){
        return $this->belongsToMany(Empleado::class, 'empleado_sucursal');
    }

    public function laboratorios(){
        return $this->belongsToMany(Laboratorio::class, 'sucurcal_laboratorio');
    }

    public function medicinas(){
        return $this->belongsToMany(Medicina::class, 'medicina_sucursal');
    }
}
