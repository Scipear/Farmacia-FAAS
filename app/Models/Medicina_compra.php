<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina_compra extends Model
{
    use HasFactory;

    protected $table = 'medicina_compra';
    protected $fillable = ['medicina_id', 'compra_id', 'cantidad', 'precio'];

    public function medicina()
    {
        return $this->belongsTo(Medicina::class);
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
