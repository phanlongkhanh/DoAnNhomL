<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post')->insert([
            'id' => 1,
            'id_list_post' => 1,
            'name' => 'Quần Áo Có Ẩm Mốc Khi Thời Tiết Ẩm Ướt Không',
            'description' => 'Ẩm Ướt, Mốc Meo, Hôi Thúi.',
            'image' => 'aothun.jpg',
            'content' => 'Áo Bốc Mùi do Nhiều nguyên nhân, nguyên nhân xâu xa do
            quá trình ẩm mốc lâu người không được giữ khô ráo đúng cách.',
            'created_at' => now(),      
        ]);
    }
}
