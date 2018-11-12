<?php

use Illuminate\Database\Seeder;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_type')->insert([
            'description' => 'Cantina'
        ]);

        DB::table('product_type')->insert([
            'description' => 'Xerox'
        ]);

        DB::table('product_type')->insert([
            'description' => 'Lojinha'
        ]);
    }
}
