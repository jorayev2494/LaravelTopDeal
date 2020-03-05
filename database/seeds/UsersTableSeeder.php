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
        // factory(User::class, "admin")->create();

        // Add Users
        factory(User::class, 50)->create();
    }
}
