<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicamento extends Model
{
    use HasFactory;
    protected $table = 'medicamentos';
    protected $fillable = [
        'nombre',
    ];

    //Relaciones uno a muchos
    public function med_productos(){
        return $this->hasMany(Medicamento_Producto::class());
    }

    //Alargar a medida que se vaya creando mas tablas y relaciones en la base de datos
}
