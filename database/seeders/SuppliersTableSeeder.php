<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            'id' => 1,
            'name' => 'NEM',
            'image' => 'NEM.png',
            'description' => 'NEM là thương hiệu thời trang Việt Nam mang nét thanh lịch, sang trọng',
            'phone' => '02462909098',
            'email' => 'NEM@gmail.com',
            'created_at' => now(),
        ]);

        DB::table('suppliers')->insert([
            'id' => 2,
            'name' => 'ICONDENIM ',
            'image' => 'ICONDENIM.png',
            'description' => ' ICONDENIM là các thương hiệu quần áo giới trẻ Việt Nam',
            'phone' => '02873066060',
            'email' => 'ICONDENIM@gmail.com',
            'created_at' => now(),
        ]);

        DB::table('suppliers')->insert([
            'id' => 3,
            'name' => 'Canifa',
            'image' => 'Canifa.png',
            'description' => 'Canifa là thương hiệu thời trang dành cho cả gia đình',
            'phone' => '1800 6061',
            'email' => 'Canifa@gmail.com',
            'created_at' => now(),
        ]);

        DB::table('suppliers')->insert([
            'id' => 4,
            'name' => 'IVY Moda',
            'image' => 'Moda.png',
            'description' => 'Bạn có thể tìm thấy đa dạng phong cách thời trang tại IVY Moda ',
            'phone' => '0868570768',
            'email' => 'IVYModa@gmail.com',
            'created_at' => now(),
        ]);
    }
}
