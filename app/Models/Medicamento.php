<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $table = 'medicamentos';
    protected $fillable = [
        'nombre',
    ];
    public $timestamps = false;

    // Relaciones uno a muchos
    public function medicina(){
        return $this->hasMany(Medicina::class);
    }

    // Relaciones muchos a muchos
    public function monodrogas(){
        return $this->belongsToMany(Monodroga::class, 'medicamento_monodroga', 'medicamento_id', 'monodroga_id');
    }
    
    public function accionTerapeutica(){
        return $this->belongsToMany(AccionTerapeutica::class, 'accion_medicamento', 'medicamento_id', 'accion_id');
    }

}

