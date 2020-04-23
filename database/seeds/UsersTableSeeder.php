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
        for ($i = 1; $i < 13; $i++) { 
            $numbers = ($i > 9) ? $i : "0{$i}";
            factory(User::class)->create([
                "email"  => "user{$i}@mail.com",
                "avatar" => "/storage/images/profile/user-uploads/user-$numbers.jpg"
            ]);
        }
    }
}
