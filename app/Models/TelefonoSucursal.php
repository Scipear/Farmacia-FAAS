<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoSucursal extends Model
{
    use HasFactory;

    protected $table = 'telefonosSucursales';
    protected $fillable = ['numero', 'sucursal_id', 'tipo'];
    public $timestamps = false;

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}