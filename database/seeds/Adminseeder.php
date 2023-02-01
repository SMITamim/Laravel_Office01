<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

            'Admin_name' => 'rashed Rabby',
            'Admin_phone'=> '01572158027',
            'UserId' => 'Gulshan',
            'Pass' => 'rashed3075',
            'created_at' =>'2022-11-05 08:15:00',
            'updated_at' =>'2022-11-05 08:15:00'


        ]);
    }
}
