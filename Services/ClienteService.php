<?php

namespace App\Services;

use App\Models\Cliente;

class ClienteService 
{
    
    public function login($correo, $password)
    {
        $cliente = Cliente::where('correo', $correo)
            ->where('passwordd', $password)
            ->first();

        if (!$cliente) {
            return null;
        }

        return $cliente;
    }

    
    public function store(array $data)
    {
        return Cliente::create($data);
    }


    public function update($id, array $data)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) return null;

        $cliente->update($data);

        return $cliente;
    }
}
