<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monodroga extends Model
{
    use HasFactory;

    protected $table = 'monodrogas';
    protected $fillable = ['nombre'];
    public $timestamps = false;


    //Relacion Muchos a muchos

    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class, 'medicamento_monodroga', 'monodroga_id', 'medicamento_id');
    }
}
