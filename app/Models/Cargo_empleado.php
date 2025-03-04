<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo_empleado extends Model
{
    use HasFactory;

    protected $table = 'cargo_empleado';
    protected $fillable= [
        'cargo_id',
        'empleado_id',
        'fechaFin',
    ];
    public $timestamps = false;

    // Relaciones

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }
}
