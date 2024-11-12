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
            'user_id' => 2,
            'name' => 'Áo thun thể thao',
            'description' => 'Áo thun dành cho người thường xuyên vận động nhiều, thấm mồ hôi tốt',
            'image' => 'aothun.jpg',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'user_id' => 2,
            'name' => 'Quần jane Cao Cấp',
            'description' => 'Quần được thiết kế tinh tế, mang lại cảm giác thoải mái cho người sủ dụng',
            'image' => 'quanthethao.jpg',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'user_id' => 2,
            'name' => 'Quần thể thao',
            'description' => 'Quần được thiết kế tinh tế, mang lại cảm giác thoải mái cho người sủ dụng',
            'image' => 'quan.jpg',
            'created_at' => now(),
        ]);


        DB::table('categories')->insert([
            'user_id' => 2,
            'name' => 'Áo Khoác jane',
            'description' => 'Áo được thiết kế tinh tế, mang lại cảm giác thoải mái cho người sủ dụng',
            'image' => 'jane.jpg',
            'created_at' => now(),
        ]);
    }
}
