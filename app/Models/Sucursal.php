<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursales';
    protected $fillable = ['nombre', 'direccion', 'correo', 'estado', 'ciudad', 'zona', 'status'];


    //relaciones uno a muchos
    
    public function telefonos()
    {
        return $this->hasMany(TelefonoSucursal::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
