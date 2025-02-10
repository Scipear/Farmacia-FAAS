<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';
    protected $fillable=[
        'nombre'
    ];

    //Relacion uno a muchos
    public function empleado(){
        return $this->hasMany(cargoEmpleado::class);
    }
}
