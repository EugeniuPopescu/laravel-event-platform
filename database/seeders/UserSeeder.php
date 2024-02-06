<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker, $num_utenti): void
    {
        // utente admin
        // $newUser = new User();
        // $newUser->name = "EugenP";
        // $newUser->email = "ep@gmail.com";
        // $newUser->password = Hash::make("password"); // password uguale casuale
        // $newUser->save();

        // utenti random
        for ($i = 0; $i < $num_utenti; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make("password"); // password uguale casuale
            $newUser->save();
        }
    }
}
