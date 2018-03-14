<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

class CreateReviewAJAXRequest extends CreateReviewRequest
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
        return parent::rules();
    }

    public function messages()
    {
        return parent::messages();
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'title' => $errors->get('title'),
            'content' => $errors->get('content'),
            'rating' => $errors->get('rating'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
