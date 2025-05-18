<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; ++$i) {
            DB::table('products')->insert([
                'name' => "Product $i",
                'description' => "Description for Product $i",
                'price' => rand(100, 1000) / 10,
                'stock' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
