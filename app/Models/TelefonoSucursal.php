<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoSucursal extends Model
{
    use HasFactory;

    protected $table = 'telefonosSucursales';
    protected $fillable = ['numero', 'sucursales_id', 'tipo'];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}