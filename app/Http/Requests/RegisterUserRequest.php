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

//    @todo mensajes personalizados


    /**
     * here, we are stablishing the validation rules
     *
     * @return string rules of valdations
     */
    protected function validateName() {
        return 'required|alpha|max:255';
    }

    protected function validateLastName(){
           return 'required|alpha|max:255';
    }

    protected function validateUsername(){
        return 'required|alpha_dash|max:255|unique:users';
    }

    protected function validateEmail(){
        return 'required|string|email|max:255|unique:users';
    }
}
