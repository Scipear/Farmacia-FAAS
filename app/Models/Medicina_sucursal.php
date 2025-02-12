<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina_sucursal extends Model
{
    use HasFactory;

    protected $table = 'medicina_sucursal';
    protected $fillable = [
        'cantidad',
        'observacion',
    ];

    // Relaciones

    public function medicinas(){
        return $this->belongsTo(Medicina::class);
    }

    public function sucursales(){
        return $this->belongsTo(Sucursal::class);
    }
}
