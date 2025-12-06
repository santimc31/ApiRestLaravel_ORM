<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;
use App\Http\Requests\ClienteLoginRequest;
use App\Http\Requests\ClienteStoreRequest;
use App\Http\Requests\ClienteUpdateRequest;

class ClienteAuthController extends Controller
{
    protected $service;

    public function __construct(ClienteService $service)
    {
        $this->service = $service;
    }

    public function login(ClienteLoginRequest $request)
    {
        $cliente = $this->service->login(
            $request->correo,
            $request->passwordd
        );

        if (!$cliente) {
            return response()->json(['error' => 'Credenciales incorrectas'], 400);
        }

        return response()->json($cliente);
    }

    public function store(ClienteStoreRequest $request)
    {
        $cliente = $this->service->store($request->validated());
        return response()->json($cliente);
    }

    public function update(ClienteUpdateRequest $request, $id)
    {
        $cliente = $this->service->update($id, $request->validated());

        if (!$cliente) {
            return response()->json(['error' => 'Cliente no está registrado'], 404);
        }

        return response()->json($cliente);
    }
}
