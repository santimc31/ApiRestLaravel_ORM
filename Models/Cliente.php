<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombres', 'correo', 'passwordd'
    ];

    public function codigos()
    {
        return $this->hasMany(CodigoVerificacion::class, 'cliente_id');
    }
}
