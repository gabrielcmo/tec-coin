<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'name' => 'Admin'
        ]);

        DB::table('user_types')->insert([
            'name' => 'Comprador'
        ]);

        DB::table('user_types')->insert([
            'name' => 'Cantina'
        ]);
        DB::table('user_types')->insert([
            'name' => 'Xerox'
        ]);
        DB::table('user_types')->insert([
            'name' => 'Lojinha'
        ]);
    }
}
