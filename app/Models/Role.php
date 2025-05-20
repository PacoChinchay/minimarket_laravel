<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const CLIENTE = 1;
    const ADMINISTRADOR = 2;
    const VENDEDOR = 3;
    const REPARTIDOR = 4;


    public function users()
    {
        return $this->hasMany(User::class);
    }
}