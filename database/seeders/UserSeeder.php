<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'password' => bcrypt('password'),
            'phone' => '+4089 532 346',
            'address' => 'Romania, strada Laravel nr 80',
            'role' => 'admin'
        ]);

        User::factory(100)->create();
    }
}
