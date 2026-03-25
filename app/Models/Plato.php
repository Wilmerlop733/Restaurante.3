<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'ingrediente_plato', 'plato_id', 'ingrediente_id')
                    ->withPivot('cantidad_usada'); // Vital para que el controlador vea el número a restar
    }
}