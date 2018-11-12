<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 50)->create()->each(function ($product) {
            $product->posts()->save(factory(App\Post::class)->make());
        });
    }
}
