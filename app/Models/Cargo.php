<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';
    protected $fillable=[
        'nombre'
    ];

    //Relacion Muchos a muchos
    public function empleado(){
        return $this->belongsToMany(empleado::class());
    }
}
