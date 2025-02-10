<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';
    protected $fillable = ['pedido_id', 'precioPagar', 'observaciones', 'status', 'fechaLlegada'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    //relacion uno a muchos
    public function medicinas()
    {
        return $this->hasMany(Medicina_compra::class);
    }
}
