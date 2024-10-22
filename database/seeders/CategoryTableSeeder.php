<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'user_id' => 1,
            'name' => 'Ao Thun',
            'description' => 'Ao Thun Cao Cap',
            'image' => 'public/image/hinhanh.png',
        ]);

        DB::table('categories')->insert([
            'user_id' => 2,
            'name' => 'Giay The Thao',
            'description' => 'Giay The Thao Cao Cap',
            'image' => 'public/image/hinhanh.png',
        ]);
    }
}
