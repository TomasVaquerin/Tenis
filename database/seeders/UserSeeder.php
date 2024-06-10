<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.es',
                'password' => bcrypt('Admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'user',
                'email' => 'user@user.es',
                'password' => bcrypt('User'),
                'role' => 'user',
            ],
        ]);
    }
}
