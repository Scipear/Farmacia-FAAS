<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal_laboratorio extends Model
{
    use HasFactory;

    protected $table = 'sucursal_laboratorio';
    protected $fillable = [
        'fecha_final',
    ];

    //Relaciones

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

    public function laboratorio(){
        return $this->belongsTo(Laboratorio::class);
    }
}
