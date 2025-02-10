<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicamento_Producto extends Model
{
    use HasFactory;

    protected $table = 'medicamentoProducto';
    protected $fillable = [
        'descripcion',
        'precio_venta',
        'precio_compra',
    ];

    //Relaciones muchos a uno

    public function laboratorio(){
        return $this->belongsTo(Laboratorio::class);
    }

    public function medicamento(){
        return $this->belongsTo(Medicamento::class);
    }

    public function presentacion(){
        return $this->belongsTo(Presentacion::class);
    }


    //Relacion Muchos a muchos

    public function monodrogas(){
    return $this->belongsToMany(Monodroga::class);
    }

    public function accionTerapeutica(){
    return $this->belongsToMany(AccionTerapeutica::class);
    }
}
