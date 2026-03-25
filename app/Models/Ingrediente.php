<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    //
    public function platos()
{
    return $this->belongsToMany(Plato::class, 'ingrediente_plato');
}
}
