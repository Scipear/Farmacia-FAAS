<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoEmpleado extends Model
{
    use HasFactory;

    protected $table = 'telefonosEmpleados';
    protected $fillable =[
        'empleado_id',
        'tipo',
        'numero'
    ];
    public $timestamps = false;

    //Relacion Muchos a uno

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

}
