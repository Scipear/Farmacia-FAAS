<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';
    protected $fillable = ['pedido_id', 'precioPagar', 'observaciones', 'status', 'fechaLlegada'];
    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function medicinas()
    {
        return $this->belongsToMany(Medicina::class, 'medicina_compra', 'compra_id', 'medicina_id')->withPivot('cantidad', 'precio');
    }
    
}
