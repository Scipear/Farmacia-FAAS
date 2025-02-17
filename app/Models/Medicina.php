<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicina extends Model
{
    use HasFactory;

    protected $table = 'medicinas';
    protected $fillable = [
        'descripcion',
        'precio_venta',
        'precio_compra',
    ];
    public $timestamps = false;

    //Relaciones muchos a uno
    public function laboratorio(){
        return $this->belongsTo(Laboratorio::class);
    }

    public function medicamento(){
        return $this->belongsTo(Medicamento::class);
    }

    public function presentacion(){
        return $this->belongsTo(Presentacion::class);
    }


    //Relacion Muchos a muchos
    public function compras(){
        return $this->belongsToMany(Compra::class, 'medicina_compra');
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }

    public function sucursales(){
        return $this->belongsToMany(Sucursal::class, 'medicina_sucursal');
    }
}
