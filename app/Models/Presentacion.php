<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentacion extends Model
{
    use HasFactory;
    protected $table = 'presentaciones';
    protected $fillable = [
        'tipo',
        'cantidad',
        'medida',
        'unidades',
    ];

    //Relacion uno a muchos
    public function med_productos(){
        return $this->hasMany(Medicamento_Producto::class());
    }
}
