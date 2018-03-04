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

    protected function validateAvatar() {
        return 'mimes:jpeg,jpg,png';
    }

    protected function validatePhone() {
        return 'regex:/^(\+36)[0-9]{9}$/';
    }

    protected function validateWebsite() {
        return 'url';
    }

    protected function validateCurrentPassword() {
        return 'required|string|min:6';
    }

    protected function validatePassword() {
        return 'required|string|min:6|confirmed';
    }


    public function messages() {

        $menssagesAvatar = $this->menssagesAvatar();
        $menssagesPhone = $this->menssagesPhone();
        $menssagesWebsite = $this->menssagesWebsite();
        $menssagesCurrentPassword = $this->menssagesCurrentPassword();
        $menssagesPassword = $this->menssagesPassword();


        $parentMenssages = parent::messages();

        return $menssages = array_merge(
            $menssagesAvatar,
            $menssagesPhone,
            $menssagesWebsite,
            $menssagesCurrentPassword,
            $menssagesPassword,
            $parentMenssages
        );
    }

    protected function menssagesAvatar() {
        $menssages = [];
        $menssages["avatar.mimes"] = 'El avatar no tiene un formato válido.';
        return $menssages;
    }

    protected function menssagesPhone() {
        $menssages = [];

        $menssages["phone.regex"] = "El número no tiene un formato válido";
        return $menssages;

    }

    protected function menssagesWebsite() {
        $menssages = [];

        $menssages["website.url"] = "La página web no tiene un formato válido";
        return $menssages;

    }

    private function menssagesCurrentPassword() {
        $menssages = [];

        $menssages['current_password.required'] = 'El campo es requerido';
        $menssages['current_password.string'] = 'El campo tiene que ser una cadena de texto';
        $menssages['current_password.min'] = 'El campo tiene que tener mínimo 6 carácteres';

        return $menssages;
    }


    private function menssagesPassword() {
        $menssages = [];

        $menssages['password.required'] = 'El campo es requerido';
        $menssages['password.string'] = 'El campo tiene que ser una cadena de texto';
        $menssages['password.min'] = 'El campo tiene que tener mínimo 6 carácteres';
        $menssages['password.confirmed'] = 'Las contraseñas no coinciden';

        return $menssages;
    }
}
