<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Bankseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([

            'Bank_name' => 'rashed Rabby',
            'Bank_phone'=> '01572158027',
            'Bank_add' => 'Gulshan',
            'Created_By' => 'rashed3075',
            'Created_date'=>'22-01-2023',
            'created_at' =>'2022-11-05 08:15:00',
            'updated_at' =>'2022-11-05 08:15:00'


        ]);
    }
}
