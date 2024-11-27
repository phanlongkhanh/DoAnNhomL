<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;


class ListPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('list_post')->insert([
            'id' => 1,
            'id_user' => 1,
            'name' => 'Bài Viết Sản Phẩm',
            'description' => 'không có',
            'image' => 'aothun.jpg',
            'created_at' => now(),      
        ]);
    }
}
