<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_types')->insert([
            'id' => 1,
            'name' => 'Quần Thể Thao',
            'description' => 'Quần Dành Cho Người hay vận động thường xuyên trong các buổi tập luyện',
            'created_at' => now(),      
        ]);

        DB::table('product_types')->insert([
            'id' => 2,
            'name' => 'Áo Thể Thao',
            'description' => 'Áo Dành Cho Người hay vận động thường xuyên trong các buổi tập luyện',   
            'created_at' => now(),          
        ]);

        DB::table('product_types')->insert([
            'id' => 3,
            'name' => 'Quần Jean',
            'description' => 'Quần Thời Trang Cao Cấp 2024 Mới Update',        
            'created_at' => now(),     
        ]);

        DB::table('product_types')->insert([
            'id' => 4,
            'name' => 'Áo Khoác Da Bò',
            'description' => 'Áo Khoác Làm Từ Da Bò Cao Cấp',    
            'created_at' => now(),    
        ]);
    }
}
