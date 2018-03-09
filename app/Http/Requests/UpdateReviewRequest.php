<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rulesTitle = $this->rulesTitle();
        $rulesRating = $this->rulesRating();
        $rulesContent = $this->rulesContent();

        $rules = [
            'title' => $rulesTitle,
            'content' => $rulesContent,
            'rating' => $rulesRating
        ];

        return $rules;
    }

    protected function rulesRating() {
        return 'nullable|integer|max:100|min:0';
    }

    protected function rulesTitle() {
        return "nullable|string|max:255";
    }


    protected function rulesContent() {
        return "nullable|string|min:200";
    }

    public function messages() {
        $menssagesTitle = $this->messagesTitle();
        $menssagesRating = $this->messagesRating();
        $menssagesContent = $this->messagesContent();

        return array_merge($menssagesTitle,$menssagesContent,$menssagesRating);
    }



    /**
     * @return array de los mensajes de eror
     */
    protected function messagesRating() {
        $messages = [];
        $messages["rating.integer"] = 'El rating debe de ser numérico.';
        $messages["rating.max"] = 'El rating debe de ser máximo 100.';
        $messages["rating.min"] = 'El rating debe de ser mínimo 0.';

        return $messages;
    }

    /**
     * @return array de los mensajes de eror
     */
    protected function messagesTitle() {
        $messages = [];
        $messages["title.string"] = "El titulo no tiene un formato válido";
        $messages["title.max"] = "El titulo no puede tener más de 255 caracteres";

        return $messages;

    }

    /**
     * @return array de los mensajes de eror
     */
    protected function messagesContent() {
        $messages = [];
        $messages["content.string"] = "El contenido no tiene un formato válido.";
        $messages["content.min"] = "El contenido no puede tener menos de 200 caracteres.";
        return $messages;

    }

}
