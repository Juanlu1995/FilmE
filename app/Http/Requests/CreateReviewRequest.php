<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest {
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
        return 'required|integer|max:100|min:0';
    }

    protected function rulesTitle() {
        return "required|string|max:255";
    }


    protected function rulesContent() {
        return "required|string|min:200";
    }

    public function messages() {
        return parent::messages();
    }
}
