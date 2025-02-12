<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_sucursal extends Model
{
    use HasFactory;

    protected $table = 'empleado_sucursal';
    protected $fillable= [
        'fecha_final',
    ];

    // Relaciones

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }
}
