<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Kathleen', 'surname' => 'Jimenez', 'email' => 'kathleen.jimenez@gmail.com', 'password' => Hash::make('password')]);
        User::create(['name' => 'Gwendolyn', 'surname' => 'Myers', 'email' => 'gwendolyn.myers@gmail.com', 'password' => Hash::make('password')]);
        User::create(['name' => 'Traci', 'surname' => 'Robertson', 'email' => 'traci.robertson@gmail.com', 'password' => Hash::make('password')]);
        User::create(['name' => 'Melvin', 'surname' => 'Stewart', 'email' => 'kathleen.myers@gmail.com', 'password' => Hash::make('password')]);
    }
}
