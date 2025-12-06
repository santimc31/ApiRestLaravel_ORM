<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CodigoService;
use App\Http\Requests\CodigoVerifyRequest;
use Carbon\Carbon;

class CodigoController extends Controller
{
    protected $service;

    public function __construct(CodigoService $service)
    {
        $this->service = $service;
    }

    public function generar(Request $request)
    {
        $request->validate(['correo' => 'required|email']);

        $resultado = $this->service->generarCodigo($request->correo);

        return response()->json($resultado);
    }

    public function validar(CodigoVerifyRequest $request)
    {
        $resultado = $this->service->validarCodigo(
            $request->cliente_id,
            $request->codigo
        );

        return response()->json($resultado);
    }
}
