<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['idplato', 'nombre_cliente', 'precio_unitario', 'cantidad', 'total'];

    public function plato()
    {
        return $this->belongsTo(Plato::class, 'idplato');
    }
}
