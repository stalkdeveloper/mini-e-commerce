<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'user_id' => '1',
                'name' => 'Formal Shirt',
                'description' => 'A formal dress shirt suitable for business attire.',
                'image' => 'image_url.jpg',
                'price' => 49.99,
                'is_available' => '1',
                'size' => 'L',
            ],
            [
                'category_id' => 2,
                'user_id' => '1',
                'name' => 'Casual Jeans',
                'description' => 'Comfortable jeans for casual wear.',
                'image' => 'image_url.jpg',
                'price' => 39.99,
                'is_available' => '1',
                'size' => 'L',
            ],
            [
                'category_id' => 3,
                'user_id' => '1',
                'name' => 'Slim Fit Jeans',
                'description' => 'Slim fit jeans suitable for trendy looks.',
                'image' => 'image_url.jpg',
                'price' => 54.99,
                'is_available' => '1',
                'size' => 'M',
            ],
        ];

        Product::insert($products);
    }
}
