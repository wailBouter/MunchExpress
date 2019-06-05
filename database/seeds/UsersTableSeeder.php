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
        User::create([
            'name' => 'Wail Bouterbiat',
            'email' => 'wail@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
