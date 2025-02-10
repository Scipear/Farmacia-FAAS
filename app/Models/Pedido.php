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
    
    
    //relacion uno a muchos
    public function medicinas()
    {
        return $this->hasMany(Medicina_pedido::class);
    }
    
    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
}
