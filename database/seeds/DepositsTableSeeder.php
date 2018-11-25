<?php

use Illuminate\Database\Seeder;

class DepositsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deposits')->insert([
            'buyer_id' => '1',
            'admin_id' => '1',
            'description' => 'Tirou MB em todas as matérias',
            'value' => '15',
            "date" => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('deposits')->insert([
            'buyer_id' => '1',
            'admin_id' => '1',
            'description' => 'Tirou MB em todas as matérias',
            'value' => '20',
            "date" => now(),
            'created_at' => date('Y-m-d', strtotime(' +1 day')),
            'updated_at' => date('Y-m-d', strtotime(' +1 day'))
        ]);


        DB::table('deposits')->insert([
            'buyer_id' => '1',
            'admin_id' => '1',
            'description' => 'Tirou MB em todas as matérias',
            'value' => '20',
            "date" => now(),
            'created_at' => date('Y-m-d', strtotime(' +2 day')),
            'updated_at' => date('Y-m-d', strtotime(' +2 day'))
        ]);


        DB::table('deposits')->insert([
            'buyer_id' => '1',
            'admin_id' => '1',
            'description' => 'Tirou MB em todas as matérias',
            'value' => '30',
            "date" => now(),
            'created_at' => date('Y-m-d', strtotime(' +3 day')),
            'updated_at' => date('Y-m-d', strtotime(' +3 day'))
        ]);
    }
}
