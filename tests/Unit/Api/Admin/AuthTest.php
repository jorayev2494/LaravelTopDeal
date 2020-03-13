<?php

namespace Tests\Unit\Api\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use RefreshDatabase;

    private $token = null;

    /**
     * User Register
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

    /**
     * User Login By Email
     *
     * @return void
     */
    public function testUserLoginByEmail()
    {
        $registeredUser = factory(User::class)->create(["email" => "emadil@email.com"]);

        $response = $this->postJson("/api/login", array_merge($registeredUser->only(["email"]), [
            "password"  => User::DEFAULT_PASSWORD
        ]))->assertStatus(200);

        $response->assertJsonStructure(["token"]);

        // Save Token
        $this->token = json_decode($response->getContent(), true)["token"];

        $this->assertNotNull($this->token);
    }

    /**
     * User Login By Login
     *
     * @return void
     */
    public function testUserLoginByLogin()
    {
        $registeredUser = factory(User::class)->create(["login" => "test_login"]);

        $response = $this->postJson("/api/login", array_merge($registeredUser->only(["login"]), [
                "password"  => User::DEFAULT_PASSWORD
        ]))->assertStatus(200);

        $response->assertJsonStructure(["token"]);

        // Save Token
        $this->token = json_decode($response->getContent(), true)["token"];
        
        $this->assertNotNull($this->token);
    }


    /**
     * Get User By Token
     *
     * @return void
     */
    public function testGetUserByToken()
    {
        $registeredUser = factory(User::class)->create(["login" => "test_login"]);

        $response = $this->postJson("/api/login", array_merge($registeredUser->only(["login"]), [
            "password"  => User::DEFAULT_PASSWORD
        ]))->assertStatus(200);

        $response->assertJsonStructure(["token"]);

        // Save Token
        $this->token = json_decode($response->getContent(), true)["token"];
        
        $this->assertNotNull($this->token);

        // Get User By Token    
        $headers = [
            "Authorization" => "Bearer $this->token",
        ];

        $userResponse = $this->getJson("/api/user", $headers)->assertStatus(200);

        $userResponse->assertJsonStructure(["user"]);

        $serverUser = json_decode($userResponse->getContent(), true)["user"];

        $this->assertEquals($registeredUser->email, $serverUser["email"]);
        $this->assertSame($registeredUser->email, $serverUser["email"]);
    }

    /**
     * Logout User
     *
     * @return void
     */
    public function testUserLogout()
    {
        $registeredUser = factory(User::class)->create(["login" => "test_login"]);

        $response = $this->postJson("/api/login", array_merge($registeredUser->only(["login"]), [
            "password"  => User::DEFAULT_PASSWORD
        ]))->assertStatus(200);

        $response->assertJsonStructure(["token"]);

        // Save Token
        $this->token = json_decode($response->getContent(), true)["token"];
        
        $this->assertNotNull($this->token);

        // Get User By Token    
        $headers = [
            "Authorization" => "Bearer $this->token",
        ];

        $userResponse = $this->getJson("/api/user", $headers)->assertStatus(200);

        $userResponse->assertJsonStructure(["user"]);

        $serverUser = json_decode($userResponse->getContent(), true)["user"];

        $this->assertEquals($registeredUser->email, $serverUser["email"]);

        // Logout User
        $userLogoutResponse = $this->postJson("/api/logout", $headers)->assertStatus(200);
        // dd($userLogoutResponse->getContent());
        $userLogoutResponse->assertJsonStructure(["message"]);
        $userLogoutResponse->assertJsonFragment(["message" => "logouted"]);

        // Login
        $userResponse = $this->getJson("/api/user", $headers)->assertStatus(200);

        // dd($userResponse);

        // $userResponse->assertJsonStructure(["user"]);

        // $serverUser = json_decode($userResponse->getContent(), true)["user"];

        // $this->assertEquals($registeredUser->email, $serverUser["email"]);
        // $this->assertSame($registeredUser->email, $serverUser["email"]);
    }

    
}
