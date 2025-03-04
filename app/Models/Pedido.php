<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $fillable = ['sucursal_id', 'empleado_id', 'laboratorio_id', 'fecha_emitida', 'precioTotal', 'tipoPago', 'status', 'observaciones'];
    public $timestamps = false;


    
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
    
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
    
    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

    //Relacion muchos a muchos
    public function medicinas()
    {
        return $this->belongsToMany(Medicina::class)->using(Medicina_compra::class)->withPivot('cantidad', 'precio');
    }
    
    //relacion uno a uno
    public function compras()
    {
        return $this->hasOne(Compra::class);
    }
}
