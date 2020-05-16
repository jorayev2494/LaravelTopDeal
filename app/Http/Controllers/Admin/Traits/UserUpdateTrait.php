<?php

namespace App\Http\Controllers\Admin\Traits;

use App\Http\Requests\Admin\Users\UserAccountUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * User Update Trait
 */
trait UserUpdateTrait
{
    /**
     * Update User Account
     *
     * @param UserAccountUpdateRequest $request
     * @param User $user
     * @return User
     */
    public function updateAccount(Request $request, User $user) : User
    {

        \Log::info($request->all());

        # Data Validate
        $validated = $request->validate([
            "avatar"    => "nullable|file",
            "login"     => "required|string|min:4",
            "name"      => "nullable|string|min:2",
            "last_name" => "nullable|string|min:2",
            "email"     => "required|email|unique:users,email,$user->id",
            "status"    => "required|in:" . implode(",", User::ACCOUNT_STATUSES),
        ]);

        \Log::info([$request->hasFile("avatar")]);

        // Save Avatar
        $avatarPath = $user->avatar;
        if ($request->hasFile("avatar")) {
            if ($this->removeAvatar($user->avatar)) {
                $avatarPath = "/storage/" . $validated["avatar"]->store("/users/avatars", "public");
                \Log::info($validated);
            }
        }

        // Update User Properties
        $user->update(array_merge($validated, [
            "avatar" => $avatarPath
        ]));
            
        return $user;
    }


    public function updateInformation(Request $request, User $user) : User
    {
        # Data Validate
        $validated = $request->validate([
            "dob"                   => "nullable|date",
            "phone"                 => "nullable|string|min:8",
            "website"               => "nullable|url",
            "gender"                => "required|in:male,female,other",
            "contact_options"       => "required|array",

            // Address
            "location"              => "required|array",
            "location.add_line_1"   => "required|string",
            "location.add_line_2"   => "required|string",
            "location.post_code"    => "required|min:4",
            "location.city"         => "required|string",
            "location.state"        => "required|string",
            // "country_id"            => "required|exists:countries.id",
        ]);

        // Update User Information
        $user->update($validated);

        return $user;
    }


    public function updateSocial(Request $request, User $user) : User
    {
        // Socials Validate
        $validated = $request->validate([
            "social_links"              => "required|array",
            "social_links.facebook"     => "nullable|url",
            "social_links.instagram"    => "nullable|url",
            "social_links.twitter"      => "nullable|url",
            "social_links.codepen"      => "nullable|url",
            "social_links.github"       => "nullable|url",
            "social_links.slack"        => "nullable|url",
        ]);

        // $user->update($validated);
        $user->social_links = $validated["social_links"];
        $user->save();

        return $user;
    }

    /**
     * Remove Avatar
     *
     * @param string $path
     * @return boolean
     */
    private function removeAvatar($path, string $disk = "public") : bool
    {
        \Log::info([$path, Str::after($path, "/storage/"), Storage::disk($disk)->exists(Str::after($path, "storage"))]);
        if (Storage::disk($disk)->exists(Str::after($path, "storage"))) {

            return Storage::disk($disk)->delete(Str::after($path, "storage"));
        }
        // else 
            // return Storage::disk($disk)->delete($path);
        return true;
    }

}



