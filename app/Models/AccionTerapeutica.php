<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccionTerapeutica extends Model
{
    use HasFactory;

    protected $tabe = 'accionTerapeutica';
    protected $fillable = ['nombre'];


    //Relacion Muchos a muchos

    public function medicamentos(){
    return $this->belongsToMany(Medicamento::class);
    }


}
