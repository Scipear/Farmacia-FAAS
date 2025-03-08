<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccionTerapeutica extends Model
{
    use HasFactory;

    protected $table = 'accionTerapeutica';
    protected $fillable = ['nombre'];
    public $timestamps = false;


    //Relacion Muchos a muchos

    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class);
    }
}
