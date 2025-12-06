<?php

namespace App\Services;

use App\Models\Cliente;
use App\Models\CodigoVerificacion;
use Carbon\Carbon;

class CodigoService 
{
    public function generarCodigo($correo)
    {
        $cliente = Cliente::where('correo', $correo)->first();

        if (!$cliente) {
            return ['error' => 'Correo no está registrado'];
        }

        $codigo = rand(1000, 9999);

        $registro = CodigoVerificacion::create([
            'cliente_id' => $cliente->id,
            'codigo' => $codigo,
            'fecha_caducidad' => Carbon::now()->addMinutes(5)
        ]);

        return [
            'id' => $cliente->id,
            'codigo' => $codigo
        ];
    }

    public function validarCodigo($cliente_id, $codigo)
    {
        $registro = CodigoVerificacion::where('cliente_id', $cliente_id)
            ->where('codigo', $codigo)
            ->first();

        if (!$registro) {
            return ['minutos' => -1];
        }

        $minutos = Carbon::now()->diffInMinutes($registro->fecha_caducidad, false);

        return ['minutos' => $minutos];
    }
}
