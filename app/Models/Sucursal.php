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
        return $this->belongsToMany(Empleado::class)->using(Empleado_sucursal::class)->withPivot('fecha_inicio', 'fecha_salida');
    }

    public function laboratorios(){
        return $this->belongsToMany(Laboratorio::class)->using(Sucursal_laboratorio::class)->withPivot('fecha_inicio', 'fecha_final');
    }

    public function medicinas(){
        return $this->belongsToMany(Medicina::class)->using(Medicina_sucursal::class)->withPivot('cantidad', 'observacion');
    }
}
