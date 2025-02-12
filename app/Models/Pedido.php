<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $fillable = ['sucursal_id', 'empleado_id', 'laboratorio_id', 'fecha_emitida', 'precioTotal', 'tipoPago', 'status', 'observaciones'];


    
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

    public function medicinas()
    {
        return $this->belongsToMany(Medicina::class);
    }
    
    //relacion uno a uno
    public function compras()
    {
        return $this->hasOne(Compra::class);
    }
}
