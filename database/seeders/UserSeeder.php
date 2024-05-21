<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_event_mate')->insert([
            'name'=>'Firja',
            'phone'=>'082361255353',
            'email'=>'firjafny0101@gmail.com',
            'created_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('user_event_mate')->insert([
            'name'=>'Azi',
            'phone'=>'082235857621',
            'email'=>'aziii@gmail.com',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        
    }
}
