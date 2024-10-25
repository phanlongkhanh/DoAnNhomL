<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;


class TranSportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tran_sports')->insert([
            'id' => 1,
            'name' => 'Shoppe Express',
            'image' => 'logoshoppe.png',
            'description' => 'Đơn vị vận chuyển của nhà Shoppe',
            'created_at' => now(),      
        ]);

        DB::table('tran_sports')->insert([
            'id' => 2,
            'name' => 'Garp Express',
            'image' => 'garp.png',
            'description' => 'Đơn vị vận chuyển của nhà Garp',
            'created_at' => now(),      
        ]);

        DB::table('tran_sports')->insert([
            'id' => 3,
            'name' => 'Now Express',
            'image' => 'now.png',
            'description' => 'Đơn vị vận chuyển của nhà Now',
            'created_at' => now(),      
        ]);

        DB::table('tran_sports')->insert([
            'id' => 4,
            'name' => 'Gojex',
            'image' => 'gojex.png',
            'description' => 'Đơn vị vận chuyển của nhà Gojex',
            'created_at' => now(),      
        ]);

        DB::table('tran_sports')->insert([
            'id' => 5,
            'name' => 'Bee Express',
            'image' => 'bee.png',
            'description' => 'Đơn vị vận chuyển của nhà Bee',
            'created_at' => now(),      
        ]);

        DB::table('tran_sports')->insert([
            'id' => 6,
            'name' => 'Amazon',
            'image' => 'amazon.png',
            'description' => 'Đơn vị vận chuyển của nhà Amazon',
            'created_at' => now(),      
        ]);
    }
}
