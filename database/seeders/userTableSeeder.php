<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
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
            'address' => 'tangail',
           'phone' =>'0123456789',
            'password' => bcrypt('admin@gmail.com'),
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
