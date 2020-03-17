<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add Create Admin
        factory(User::class)->create([
            "login"     => "admin",
            "email"     => "admin@admin.com",
            "name"      => "Admin",
            "last_name" => "Adminov",
            "role_id"   => 1
        ]);

        // Add Users
        factory(User::class, 30)->create();
    }
}
