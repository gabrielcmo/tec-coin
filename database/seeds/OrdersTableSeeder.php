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
        // Cantina

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '1',
            'status_id' => '1',
            'value' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '1',
            'status_id' => '2',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '1',
            'status_id' => '3',
            'value' => '10',
            'created_at' => date('Y-m-d', strtotime(' +2 day')),
            'updated_at' => date('Y-m-d', strtotime(' +2 day'))
        ]);


        // Xerox

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '2',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '3',
            'value' => '10',
            'created_at' => date('Y-m-d', strtotime(' +2 day')),
            'updated_at' => date('Y-m-d', strtotime(' +2 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '2',
            'status_id' => '1',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);


        // Lojinha
        
        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '3',
            'status_id' => '1',
            'value' => '20',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '3',
            'status_id' => '2',
            'value' => '30',
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);

        DB::table('orders')->insert([
            'product_id' => '1',
            'buyer_id' => '1',
            'seller_id' => '3',
            'status_id' => '3',
            'value' => '10',
            'created_at' => date('Y-m-d', strtotime(' +2 day')),
            'updated_at' => date('Y-m-d', strtotime(' +2 day'))
        ]);
    }
}