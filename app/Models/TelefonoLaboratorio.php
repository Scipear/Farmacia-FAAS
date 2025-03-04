<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TelefonoLaboratorio extends Model
{
    use HasFactory;
    protected $table = 'telefonosLaboratorios';
    protected $fillable = [
        'numero',
    ];
    public $timestamps = false;

    //Relacion muchos a uno
    public function laboratorio(){
        return $this->belongsTo(Laboratorio::class);
    }
}
