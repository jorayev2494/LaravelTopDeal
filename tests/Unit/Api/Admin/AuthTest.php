<?php

namespace Tests\Unit\Api\Admin;

use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserRegister()
    {

        $avatar = '/storage/users/avatars/ltBtNWs8SXQQBLBL9maDnHLss3w1vXDTW74z62eX.jpeg';

        $data = [
            "avatar"                    => $avatar,
            "name"                      => "Name",
            "last_name"                 => "LastName",
            "email"                     => "emadil@email.com",
            "phone"                     => "84484345",
            "password"                  => "476674",
            "password_confirmation"     => "476674",
            "fax"                       => "fax fax fax fax fax",
            "gender"                    => "male",
            "country_id"                => 1
        ];
        
        $response = $this->postJson("/api/register", $data)->assertStatus(200);
        // Assert Token
        $response->assertJsonStructure(["token"]);
        // Get Our Test User
        $lastUser = User::where("email", $data["email"])->first();
        // Try Equals Email
        $this->assertEquals($lastUser->email, $data["email"]);
        $this->assertSame($lastUser->name, $data["name"]);
    }
}
