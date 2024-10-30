<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'id_user' => 1,
                'id_product' => 1,
                'id_transport' => 1,
                'status' => 'Đã tiếp nhận',
                'amount' => 2,
                'intomoney' => 500000,
                'id_pay' => 1,
                'created_at' => now(),
            ],
            [
                'id_user' => 2,
                'id_product' => 2,
                'id_transport' => 2,
                'status' => 'Đang giao',
                'amount' => 1,
                'intomoney' => 250000,
                'id_pay' => 2,
                'created_at' => now(),
            ],
            [
                'id_user' => 3,
                'id_product' => 3,
                'id_transport' => 3,
                'status' => 'Hoàn thành',
                'amount' => 5,
                'intomoney' => 1250000,
                'id_pay' => 1,
                'created_at' => now(),
            ],
            [
                'id_user' => 4,
                'id_product' => 4,
                'id_transport' => 4,
                'status' => 'Đã hủy',
                'amount' => 3,
                'intomoney' => 750000,
                'id_pay' => 2,
                'created_at' => now(),
            ]
        ]);
    }
}
