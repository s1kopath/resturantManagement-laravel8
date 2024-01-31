<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'address' => 'dhaka',
            'phone' => '0123456789',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);

        // User::create([
        //     'name' => 'Admin1',
        //     'email' => 'admin1@gmail.com',
        //     'password' => bcrypt('admin1@gmail.com'),
        //     'role' => 'admin'
        // ]);
    }
}
