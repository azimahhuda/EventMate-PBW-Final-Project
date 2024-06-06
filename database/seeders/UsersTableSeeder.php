<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Azii',
            'email' => 'Aziii@gmail.com',
            'password' => Hash::make('654321')
        ]);
        DB::table('users')->insert([
            'name' => 'Firja',
            'email' => 'firjafny0101@gmail.com',
            'password' => Hash::make('654321')
        ]);
    }
}
