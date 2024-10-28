<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;


class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carts')->insert([
           'id_product' => 1,
            'name' => 'Sản phẩm A',
            'amount' => 2,
            'image' => 'aothun.jpg',
            'total_price' => 100000,  
        ]);

    }
}
