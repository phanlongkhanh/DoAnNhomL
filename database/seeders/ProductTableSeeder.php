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
                'name' => 'Sản phẩm A',
                'price' => 200000,
                'description' => 'Mô tả sản phẩm A',
                'discount' => 0,
                'image' => 'aothun.jpg',
                'id_category' => 1, // Thay đổi theo danh mục thực tế
                'id_producttype' => 1, // Thay đổi theo loại sản phẩm thực tế
                'checkactive' => true,
                'amount' => 100,
                'id' => 1, // ID người bán hàng
            ],
            [
                'name' => 'Sản phẩm B',
                'price' => 300000,
                'description' => 'Mô tả sản phẩm B',
                'discount' => 50000,
                'image' => 'aothun.jpg',
                'id_category' => 1, // Thay đổi theo danh mục thực tế
                'id_producttype' => 2, // Thay đổi theo loại sản phẩm thực tế
                'checkactive' => true,
                'amount' => 50,
                'id' => 2, // ID người bán hàng
            ],
            // Bạn có thể thêm nhiều sản phẩm khác ở đây
        ]);
    }
}
