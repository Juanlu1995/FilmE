<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest {
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
     * @return array
     */
    public function rules() {
        $rules = array();

        $rules['name'] = $this->validateName();
        $rules['lastName'] = $this->validateLastName();
        $rules['username'] = $this->validateUsername();
        $rules['email'] = $this->validateEmail();

        return $rules;
    }

    /**
     * @return array de todos los mensajes
     */
    public function messages() {
        $messagesName = $this->messagesName();
        $messagesLastName = $this->messagesLastName();
        $messagesUsername = $this->messagesUsername();
        $messagesEmail = $this->messagesEmail();
        $mensajes = array_merge(
            $messagesName,
            $messagesLastName,
            $messagesUsername,
            $messagesEmail
        );
        return $mensajes;

    }

    /**
     * @return array de los mensajes de error del nombre
     */
    protected function messagesName() {
        $messages = array();
        $messages["name.required"] = 'El nombre es requerido';
        $messages["name.regex"] = 'El nombre sólo acepta letras y espacios';
        $messages["name.max"] = 'Supera el máximo';
        return $messages;
    }

    /**
     * @return array de los mensajes de error del apellido
     */
    protected function messagesLastName() {
        $messages = array();
        $messages["lastName.required"] = 'El apellido es requerido';
        $messages["lastName.regex"] = 'El apellido sólo acepta letras y espacios';
        $messages["lastName.max"] = 'Supera el máximo';
        return $messages;
    }

    /**
     * @return array de los mensajes de error del username
     */
    protected function messagesUsername() {
        $messages = array();
        $messages["username.required"] = 'El nombre de usuario es requerido';
        $messages["username.alpha_dash"] = 'El nombre de usuario sólo acepta letras, números y signos de puntuación';
        $messages["username.max"] = 'Supera el máximo';
        $messages["username.unique"] = 'El nombre de usuario no está disponible';
        return $messages;
    }

    /**
     * @return array de los mensajes de erorr del email
     */
    protected function messagesEMail() {
        $messages = array();
        $messages["email.required"] = 'El email es requerido';
        $messages["email.email"] = 'No es un email válido';
        $messages["email.max"] = 'Supera el máximo';
        $messages["email.unique"] = 'El email no está disponible';
        return $messages;
    }


    /**
     * here, we are stablishing the validation rules
     *
     * @return string rules of valdations
     */
    protected function validateName() {
        return 'required|regex:/^[\pL\s\-]+$/u|max:255';
    }

    protected function validateLastName() {
        return 'required|regex:/^[\pL\s\-]+$/u|max:255';
    }

    protected function validateUsername() {
        return 'required|alpha_dash|max:255|unique:users';
    }

    protected function validateEmail() {
        return 'required|email|max:255|unique:users';
    }
}
