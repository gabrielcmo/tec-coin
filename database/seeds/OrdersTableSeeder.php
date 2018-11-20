<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '1',
            'status_id' => '1',
            'value' => '20'
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '1',
            'status_id' => '2',
            'value' => '30'
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '1',
            'status_id' => '3',
            'value' => '10'
        ]);
    }
}
