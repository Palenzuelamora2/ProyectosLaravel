<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite que cualquier usuario autenticado acceda
    }
    //IMPORTANTE QUE QUITEMOS LO QUE NO QUEREMOS VALIDAR EN EL UPDATE YA QUE SI NO NO ACTUALIZA
    //IMPORTANTE PONER BIEN EL TIPO DE VARIABLE QUE SEA E INTRODUCIR AQUI TODAS LAS VALIDACIONES PARA EDITAR COMO EN EL TELEFONO ETC ETC
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'profesion' => 'nullable|string',
            'telefono' => ['nullable', 'regex:/^\+?[0-9]{1,4}?[0-9]{6,14}$/'],
            'sobre_mi' => 'nullable|string',
            'sitio_web' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'github' => 'nullable|string',
        ];
    }
}
