<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina_pedido extends Model
{
    use HasFactory;
    
    protected $table = 'medicina_pedido';
    protected $fillable = ['medicina_id', 'pedido_id', 'cantidad', 'precio'];

    public function medicina()
    {
        return $this->belongsTo(Medicina::class);
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
