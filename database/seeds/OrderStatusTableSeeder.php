<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'description' => 'Ordered'
        ]);

        DB::table('order_status')->insert([
            'description' => 'Accepted'
        ]);

        DB::table('order_status')->insert([
            'description' => 'Canceled'
        ]);
    }
}