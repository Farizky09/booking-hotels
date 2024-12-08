<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin ganteng',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1'),
                'role' => 1,

            ],
            [
                'name' => 'Farizky',
                'email' => 'farizky@gmail.com',
                'password' => Hash::make('1'),
                'role' => 0,

            ]

        ]);
    }
}
