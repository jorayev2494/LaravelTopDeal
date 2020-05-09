<?php

namespace App\Http\Requests\Cabinet;

use Illuminate\Foundation\Http\FormRequest;

class PersonalUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard("api")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // "avatar"                => "nullable|file|mimes:jpg,jpeg,png",
            "first_name"            => "required|string|max:250|alpha",
            "last_name"             => "required|string|max:250|alpha",
            "email"                 => "nullable|email|unique:users,email," . auth()->guard("api")->id(),
            "phone"                 => "nullable|string|max:250",
            "dob"                   => "nullable|date",
            "gender"                => "nullable|in:male,female,other",
            "website"               => "nullable|url",
            "fax"                   => "nullable|string",
            "company"               => "nullable|string",
            "location"              => "required|array",
                "location.city"                 => "nullable|string",
                "location.state"                => "nullable|string",
                "location.post_code"            => "nullable|string",
                "location.add_line_1"           => "nullable|string",
                "location.add_line_2"           => "nullable|string",
            // "social_links"          => "required|array",
            //     "social_links.instagram"        => "nullable|string",
            //     "social_links.facebook"         => "nullable|string",
            //     "social_links.twitter"          => "nullable|string",
            //     "social_links.github"           => "nullable|string",
            //     "social_links.codepen"          => "nullable|string",
            //     "social_links.slack"            => "nullable|string",
            "role"                  => "required|array",
            "role.id"                           => "required|exists:roles,id",
            "role.slug"                         => "required|exists:roles,slug",
            "country"               => "required|array",
            "country.slug"                      => "required|exists:countries,slug",
        ];
    }
}
