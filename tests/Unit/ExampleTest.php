<?php

namespace Tests\Unit;

use App\Models\Country;
use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public function testStart()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
    //     $this->assertTrue(true);
    //     // $user = factory(Country::class)->make();
    //     $user = factory(User::class)->make();

    //     $response  = $this->json("GET", "/api/admin/users")->assertStatus(200);
    //     $response->assertJsonStructure();
    //     $response->assertJsonStructure([
    //         "status",
    //         "data" => [],
    //     ]);
    //     // dd($response->getContent());

    //     // dd($user->email, User::all()->count());
    // }

    // public function testCreateUser()
    // {
    //     $user = factory(User::class)->make();

    //     // dd($user->toArray());

        

    //     // $response = $this->postJson("/api/admin/users", $user->toArray());
    //     // dd($response->getContent());

    // }
}
