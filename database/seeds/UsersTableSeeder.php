<?php

use App\User;
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
        $user = User::create([
            'name' => 'Wail Bouterbiat',
            'email' => 'wail@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->restaurants()->create([
            'name' => 'Ammi brahim',
            'location' => 'elhofra, elharrache, alger'
        ]);

        $user->restaurants()->create([
            'name' => 'Familya',
            'location' => 'beb eloued, alger'
        ]);

        $user->restaurants()->create([
            'name' => 'Alafra7',
            'location' => 'oued smmar, alger'
        ]);
    }
}

