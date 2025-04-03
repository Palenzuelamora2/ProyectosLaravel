<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienciasRequest extends FormRequest
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
            'empresa' => ['required', 'string', 'max:255'],
            'puesto' => 'nullable|string',
            'fecha_inicio' => 'nullable|timestamp',
            'fecha_fin' => 'nullable|timestamp',
            'descripcion' => 'nullable|string',
        ];
    }
}
