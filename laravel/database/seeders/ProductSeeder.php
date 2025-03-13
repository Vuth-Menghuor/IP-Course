<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'T1',
            'category_id' => 1,
            'pricing' => 100,
        ]);

        Product::create([
            'name' => 'T2',
            'category_id' => 2,
            'pricing' => 200,
        ]);

        Product::create([
            'name' => 'T3',
            'category_id' => 2,
            'pricing' => 300,
        ]);
    }
}
