<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends RegisterUserRequest {
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

        if ($this->exists('name')) {
            $rules['name'] = $this->validateName();
        }

        if ($this->exists('lastName')) {
            $rules['lastName'] = $this->validateLastName();
        }

        if ($this->exists('email')) {
            $rules['email'] = $this->validateEmail();
        }

        if ($this->exists('avatar')) {
            $rules['avatar'] = $this->validateAvatar();
        }

        if ($this->exists('phone')) {
            $rules['phone'] = $this->validatePhone();
        }

        if ($this->exists('website')) {
            $rules['website'] = $this->validateWebsite();
        }

        if ($this->exists('password')) {
            $rules['password'] = $this->validatePassword();
        }

        if ($this->exists('current_password')) {
            $rules['current_password'] = $this->validateCurrentPassword();
        }

        return $rules;
    }


    protected function validateName() {
        return 'nullable|regex:/^[\pL\s\-]+$/u|max:255';
    }

    protected function validateLastName() {
        return 'nullable|regex:/^[\pL\s\-]+$/u|max:255';
    }

    protected function validateEmail() {
        return 'nullable|email|max:255|unique:users';
    }

    protected function validateAvatar() {
        return 'nullable|mimes:jpeg,jpg,png';
    }

    protected function validatePhone() {
        return [
            'nullable',
            'regex:/(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/   '
            ];
    }

    protected function validateWebsite() {
        return 'nullable|url';
    }

    protected function validateCurrentPassword() {
        return 'required|string|min:6';
    }

    protected function validatePassword() {
        return 'required|string|min:6|confirmed';
    }


    public function messages() {

        $messagesAvatar = $this->messagesAvatar();
        $messagesPhone = $this->messagesPhone();
        $messagesWebsite = $this->messagesWebsite();
        $messagesCurrentPassword = $this->messagesCurrentPassword();
        $messagesPassword = $this->messagesPassword();
        $messagesName = $this->messagesName();
        $messagesLastName = $this->messagesLastName();
        $messagesEmail = $this->messagesEMail();

        return $messages = array_merge(
            $messagesAvatar,
            $messagesPhone,
            $messagesWebsite,
            $messagesCurrentPassword,
            $messagesPassword,
            $messagesName,
            $messagesLastName,
            $messagesEmail
        );
    }

    protected function messagesAvatar() {
        $messages = [];
        $messages["avatar.mimes"] = 'El avatar no tiene un formato válido.';
        return $messages;
    }

    protected function messagesPhone() {
        $messages = [];

        $messages["phone.regex"] = "El número no tiene un formato válido";
        return $messages;

    }

    protected function messagesWebsite() {
        $messages = [];

        $messages["website.url"] = "La página web no tiene un formato válido";
        return $messages;

    }

    private function messagesCurrentPassword() {
        $messages = [];

        $messages['current_password.required'] = 'El campo es requerido';
        $messages['current_password.string'] = 'El campo tiene que ser una cadena de texto';
        $messages['current_password.min'] = 'El campo tiene que tener mínimo 6 carácteres';

        return $messages;
    }


    private function messagesPassword() {
        $messages = [];

        $messages['password.required'] = 'El campo es requerido';
        $messages['password.string'] = 'El campo tiene que ser una cadena de texto';
        $messages['password.min'] = 'El campo tiene que tener mínimo 6 carácteres';
        $messages['password.confirmed'] = 'Las contraseñas no coinciden';

        return $messages;
    }


    protected function messagesName() {
        $messages = array();
        $messages["name.regex"] = 'El nombre sólo acepta letras y espacios';
        $messages["name.max"] = 'Supera el máximo';
        return $messages;
    }

    protected function messagesLastName() {
        $messages = array();
        $messages["lastName.regex"] = 'El apellido sólo acepta letras y espacios';
        $messages["lastName.max"] = 'Supera el máximo';
        return $messages;
    }

    protected function messagesEMail() {
        $messages = array();
        $messages["email.email"] = 'No es un email válido';
        $messages["email.max"] = 'Supera el máximo';
        $messages["email.unique"] = 'El email no está disponible';
        return $messages;
    }
}
