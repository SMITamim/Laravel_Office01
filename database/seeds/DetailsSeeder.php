<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([

            'Client_Id' => '2',
            'Bank_Id'=> '2',
            'Amount' => '17000',
            'created_at' =>'2022-11-05 08:15:00',
            'updated_at' =>'2022-11-05 08:15:00',


        ]);
    }
}
