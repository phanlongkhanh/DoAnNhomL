<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CartTableSeeder::class,
            CategoryTableSeeder::class,
            ProductTableSeeder::class,
            ProductTypeTableSeeder::class,
            PaymentTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
            TranSportTableSeeder::class,
            SuppliersTableSeeder::class,
            PostTableSeeder::class,
            ListPostTableSeeder::class,
        ]);
    
    }
}
