<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Telefono_Laboratorio extends Model
{
    use HasFactory;
    protected $table = 'telefonos_laboratorios';
    protected $fillable = [
        'numero',
    ];

    //Relacion muchos a uno
    public function laboratorio(){
        return $this->belongsTo(Laboratorio::class());
    }
}
