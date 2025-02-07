<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratorio extends Model
{
    use HasFactory;
    protected $table = 'laboratorios';
    protected $fillable = [
        'nombre', 
        'direccion', 
        'correo'];
    
    // Relaciones uno a muchos
    public function med_productos(){
        return $this->hasMany(Medicamento::class());
    }

    public function telefonos(){
        return $this->hasMany(Telefono_Laboratorio::class());
    }

    //Alargar a medida que se vaya creando mas tablas y relaciones en la base de datos
}
