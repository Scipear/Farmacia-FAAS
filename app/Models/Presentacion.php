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
    public $timestamps = false;

    //Relacion uno a muchos
    public function medicinas(){
        return $this->hasMany(Medicina::class(), 'medicina_id');
    }
}
