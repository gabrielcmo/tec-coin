<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            'description' => 'Cantina'
        ]);

        DB::table('product_types')->insert([
            'description' => 'Xerox'
        ]);

        DB::table('product_types')->insert([
            'description' => 'Lojinha'
        ]);
    }
}
