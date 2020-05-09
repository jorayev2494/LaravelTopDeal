<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create One Admin
        $number = rand(1, 9);
        factory(Admin::class)->create([
            "email"     => "admin@mail.com",
            "avatar"    => "/storage/images/profile/user-uploads/user-0$number.jpg"
        ]);

        // Create Admins
        for ($i = 1; $i < 13; $i++) {
            
            $numbers = ($i > 9) ? $i : "0{$i}";
            $emailNumbers = intval($numbers);
            
            factory(Admin::class)->create([
                "email" => "admin{$emailNumbers}@mail.com",
                "avatar" => "/storage/images/profile/user-uploads/user-$numbers.jpg"
            ]);
        }
    }
}
