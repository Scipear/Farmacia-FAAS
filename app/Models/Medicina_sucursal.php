<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina_sucursal extends Model
{
    use HasFactory;

    protected $table = 'medicina_sucursal';
    protected $fillable = [
        'medicina_id',
        'sucursal_id',
        'cantidad',
        'observacion',
    ];
    public $timestamps = false;

    // Relaciones

    public function medicina(){
        return $this->belongsTo(Medicina::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }
}
