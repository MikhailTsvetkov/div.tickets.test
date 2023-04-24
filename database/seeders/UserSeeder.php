<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@doe.com',
                'password' => Hash::make('1234'),
                'is_admin' => 0,
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@doe.com',
                'password' => Hash::make('5678'),
                'is_admin' => 1,
            ],
        ]);
    }
}
