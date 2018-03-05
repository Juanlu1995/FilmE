<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFilmRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * Las unicas reglas son para el nombre, que es requerido y con una máximo de 255 carácteres
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => [
                'required', 'max:255'
            ]
        ];
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages() {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'name.required' => 'El nombre es el único campo requerido',
            'name.max' => 'El nombre no puede contener más de 255 caracteres'
        ];
    }
}
