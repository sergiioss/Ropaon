<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Sergio",
            'addres' => "C/ La Felicidad, 11",
            'email' => "sergio@sergio.com",
            'password' => bcrypt('Sergio1$'),
            'photo' => "https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png"

        ]);

        DB::table('users')->insert([
            'name' => "Dani",
            'addres' => "C/ Principal, 5",
            'email' => "dani@dani.com",
            'password' => bcrypt('Sergio1$'),
            'photo' => "https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png"
        ]);
    }
}
