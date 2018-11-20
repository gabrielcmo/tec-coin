<?php

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->insert([
            'user_id' => '3',
            'product_type_id' => '1'
        ]);
        
        DB::table('sellers')->insert([
            'user_id' => '4',
            'product_type_id' => '2'
        ]);
            

        DB::table('sellers')->insert([
            'user_id' => '5',
            'product_type_id' => '3'
        ]);
    }
}