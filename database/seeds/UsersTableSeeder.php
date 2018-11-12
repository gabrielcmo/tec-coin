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
            'name' => 'user',
            'email' => 'user@user.com',
            'role' => 1,
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'seller',
            'email' => 'seller@seller.com',
            'role' => 2,
            'password' => bcrypt('123456'),
        ]);
    }
}