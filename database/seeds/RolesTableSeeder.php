<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            "moderator",
            "user"
        ];

        foreach ($roles as $key => $role) {
            factory(Role::class)->create(["slug" => $role]);
        }

    }
}
