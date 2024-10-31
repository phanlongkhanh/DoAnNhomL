<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'id_pay' => 1,
                'name' => 'Thanh toán qua thẻ',
                'description' => 'Thanh toán bằng thẻ tín dụng hoặc thẻ ghi nợ.',
                'active' => true,
                'created_at' => now(),
            ],
            [
                'id_pay' => 2,
                'name' => 'Thanh toán khi nhận hàng',
                'description' => 'Khách hàng thanh toán khi nhận được hàng.',
                'active' => true,
                'created_at' => now(),
            ],
            [
                'id_pay' => 3,
                'name' => 'Thanh toán qua chuyển khoản',
                'description' => 'Sử dụng ví điện tử để thanh toán.',
                'active' => true,
                'created_at' => now(),
            ],
        ]);
    }
}
