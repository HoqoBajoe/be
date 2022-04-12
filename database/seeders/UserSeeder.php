<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'nama' => 'Super Admin',
            'email' => 'sa@mail.com',
            'password' => bcrypt('123456'),
            'role' => 'super-admin'
        ]);
        User::create([
            'nama' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin'
        ]);
        User::create([
            'nama' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('123456'),
            'role' => 'user'
        ]);
    }
}
