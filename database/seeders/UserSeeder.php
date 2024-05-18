<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'Naim Hossain',
            'email' => 'superadmin@gmail.com',
            'isadmin' => '2',
            'password' => bcrypt('123456789')
        ]);
    User::create([
        'name' => 'Nadim Hossain',
        'email' => 'admin@gmail.com',
        'isadmin' => '1',
        'password' => bcrypt('123456789')
    ]);

    User::create([
        'name' => 'Nadia',
        'email' => 'regularuser@gmail.com',
        'isadmin' => '0',
        'password' => bcrypt('123456789')
    ]);
}

    }
