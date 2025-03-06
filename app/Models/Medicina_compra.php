<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina_compra extends Model
{
    use HasFactory;

    protected $table = 'medicina_compra';
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

    public function compras(){
        return $this->belongsTo(Pedido::class);
    }
}
