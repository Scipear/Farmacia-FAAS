<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicina_pedido extends Model
{
    use HasFactory;

    protected $table = 'medicina_pedido';
    protected $fillable = [
        'medicina_id',
        'pedido_id',
        'cantidad',
        'precio',
    ];
    public $timestamps = false;

    // Relaciones

    public function medicinas(){
        return $this->belongsTo(Medicina::class);
    }

    public function pedidos(){
        return $this->belongsTo(Pedido::class);
    }
}
