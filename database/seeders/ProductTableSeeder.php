<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Áo Thun Nam Cá Tính',
                'price' => 200000,
                'description' => 'Áo thun với chất liệu vải siêu thấm hút mùi hôi tạo cảm giác thoải mái cho người mặc',
                'discount' => 0,
                'image' => 'aothun.jpg',
                'id_category' => 1, 
                'id_producttype' => 2,
                'checkactive' => true,
                'amount' => 100,
                'id' => 1,
            ],
            [
                'name' => 'Quần Jane',
                'price' => 250000,
                'description' => 'Mô tả quần Jane',
                'discount' => 0,
                'image' => 'quan.jpg', // Thay đổi hình ảnh nếu cần
                'id_category' => 2,
                'id_producttype' => 3, // Thay đổi loại sản phẩm nếu cần
                'checkactive' => true,
                'amount' => 75,
                'id' => 3,
            ],
            [
                'name' => 'Áo Khoác Jane',
                'price' => 400000,
                'description' => 'Mô tả áo khoác Jane',
                'discount' => 0,
                'image' => 'jane.jpg', // Thay đổi hình ảnh nếu cần
                'id_category' => 1,
                'id_producttype' => 4, // Thay đổi loại sản phẩm nếu cần
                'checkactive' => true,
                'amount' => 50,
                'id' => 4,
            ],
            [
                'name' => 'Quần Thể Thao',
                'price' => 180000,
                'description' => 'Mô tả quần thể thao',
                'discount' => 0,
                'image' => 'quanthethao.jpg', // Thay đổi hình ảnh nếu cần
                'id_category' => 3,
                'id_producttype' => 1, // Thay đổi loại sản phẩm nếu cần
                'checkactive' => true,
                'amount' => 100,
                'id' => 5,
            ],
        ]);
    }
}
