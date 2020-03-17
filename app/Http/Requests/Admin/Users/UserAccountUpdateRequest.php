<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserAccountUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "avatar"    => "nullable|file",
            "login"     => "nullable|string|min:4",
            "name"      => "nullable|string|min:2",
            "last_name" => "nullable|string|min:2",
            "email"     => "nullable|email|unique:users,email",
        ];
    }
}
