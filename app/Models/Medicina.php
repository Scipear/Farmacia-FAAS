<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicina extends Model
{
    use HasFactory;

    protected $table = 'medicinas';
    protected $fillable = [
        'laboratorio_id',
        'medicamento_id',
        'presentacion_id',
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
        return $this->belongsTo(Presentacion::class, 'presentacion_id');
    }


    //Relacion Muchos a muchos
    public function compras(){
        return $this->belongsToMany(Compra::class)->using(Medicina_compra::class)->withPivot('cantidad', 'precio');
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class)->using(Medicina_pedido::class)->withPivot('cantidad', 'precio');
    }

    public function sucursales(){
        return $this->belongsToMany(Sucursal::class)->using(Medicina_sucursal::class)->withPivot('cantidad', 'observacion');
    }
}
