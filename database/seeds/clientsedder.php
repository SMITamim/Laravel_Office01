<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class clientsedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([

            'Client_name' => 'rashed Rabby',
            'Client_phone'=> '01572158027',
            'Client_add' => 'Gulshan',
            'Created_By' => 'rashed3075',
            'Created_date'=>'22-01-2023',
            'created_at' =>'2022-11-05 08:15:00',
            'updated_at' =>'2022-11-05 08:15:00'


        ]);
    }
}
