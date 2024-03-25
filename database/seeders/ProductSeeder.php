<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Red Rose Bouquet',
                'description' => 'A beautiful bouquet of red roses perfect for expressing love and passion.',
                'price' => 39.99,
                'quantity' => 50,
                'imgUrl' => 'https://images.unsplash.com/photo-1503428593586-e225b39bddfe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'White Lily Arrangement',
                'description' => 'An elegant arrangement of white lilies symbolizing purity and tranquility.',
                'price' => 49.99,
                'quantity' => 30,
                'imgUrl' => 'https://images.unsplash.com/photo-1506160554-27e68d116494',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mixed Tulip Bouquet',
                'description' => 'A colorful bouquet of mixed tulips to brighten any occasion.',
                'price' => 29.99,
                'quantity' => 40,
                'imgUrl' => 'https://images.unsplash.com/photo-1528890538311-42a94e28db1f',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        

        DB::table('products')->insert($products);
    }
}
