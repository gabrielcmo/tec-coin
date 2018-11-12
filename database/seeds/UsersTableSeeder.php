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
            'role' => 0,
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'usuario',
            'email' => 'usuario@usuario.com',
            'role' => 1,
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'cantina',
            'email' => 'cantina@cantina.com',
            'role' => 2,
            'password' => bcrypt('123456')
        ]);
        
        DB::table('users')->insert([
            'name' => 'xerox',
            'email' => 'xerox@xerox.com',
            'role' => 3,
            'password' => bcrypt('123456')
        ]);
            

        DB::table('users')->insert([
            'name' => 'lojinha',
            'email' => 'lojinha@lojinha.com',
            'role' => 4,
            'password' => bcrypt('123456')
        ]);
    }
}