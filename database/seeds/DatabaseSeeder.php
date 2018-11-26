<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTypesTableSeeder::class,
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
            BuyersTableSeeder::class,
            ProductTypesTableSeeder::class,
            ProductTableSeeder::class,
            SellersTableSeeder::class,
            DepositsTableSeeder::class,
            OrderStatusTableSeeder::class,
            OrdersTableSeeder::class
        ]);
    }
}
