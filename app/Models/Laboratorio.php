<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratorio extends Model
{
    use HasFactory;
    protected $table = 'laboratorios';
    protected $fillable = [
        'nombre',
        'ciudad',
        'direccion', 
        'correo'
    ];
    public $timestamps = false;
    
    // Relaciones uno a muchos
    public function medicinas(){
        return $this->hasMany(Medicina::class);
    }

    public function telefonos(){
        return $this->hasMany(TelefonoLaboratorio::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

    //Relaciones muchos a muchos

    public function sucursales(){
        return $this->belongsToMany(Sucursal::class, 'sucursal_laboratorio', 'laboratorio_id', 'sucursal_id')->withPivot('fecha_inicio', 'fecha_final');
    }
}
