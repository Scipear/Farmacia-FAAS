<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina extends Model
{
    use HasFactory;

    protected $table = 'medicinas';


    public function compras(){
        return $this->belongsToMany(Compra::class, 'medicina_compra');
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }

}

