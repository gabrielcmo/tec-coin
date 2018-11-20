<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'user_type_id' => 1,
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'comprador',
            'email' => 'comprador@comprador.com',
            'user_type_id' => 2,
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'cantina',
            'email' => 'cantina@cantina.com',
            'user_type_id' => 3,
            'password' => bcrypt('123456')
        ]);
        
        DB::table('users')->insert([
            'name' => 'xerox',
            'email' => 'xerox@xerox.com',
            'user_type_id' => 3,
            'password' => bcrypt('123456')
        ]);
            

        DB::table('users')->insert([
            'name' => 'lojinha',
            'email' => 'lojinha@lojinha.com',
            'user_type_id' => 3,
            'password' => bcrypt('123456')
        ]);
    }
}