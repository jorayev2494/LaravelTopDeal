<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->route("category");
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
}
