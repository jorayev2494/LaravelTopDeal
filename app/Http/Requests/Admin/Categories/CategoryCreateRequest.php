<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryCreateRequest extends FormRequest
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
        return [
            "slug"              => "required|alpha_dash|max:50",                // unique:categories,slug|
            "parent_id"         => "nullable|integer|exists:categories,id",
            "is_active"         => "required|boolean",
            "trans"             => "array",
            "trans.en"          => "required|string|max:50",
            "trans.ru"          => "required|string|max:50",
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // protected function failedValidation(Validator $validator)
    // {
    //     $errors = (new ValidationException($validator))->errors();

    //     throw new HttpResponseException(
    //         response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
    //     );

    //     // throw (new ValidationException($validator))
    //     //             ->errorBag($this->errorBag)
    //     //             ->redirectTo($this->getRedirectUrl());
    // }
}
