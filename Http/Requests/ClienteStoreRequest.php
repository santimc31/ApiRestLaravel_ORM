<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombres' => 'required|string|max:30',
            'correo' => 'required|email|unique:clientes,correo',
            'passwordd' => 'required|string|max:20'
        ];
    }
}
