<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'user_id' => '1',
                'name' => 'Shirt',
                'description' => 'A type of upper garment intended for the upper part of the body.',
                'is_active' => '1'
            ],
            [
                'user_id' => '1',
                'name' => 'Pant',
                'description' => 'A type of garment worn from the waist to the ankles.',
                'is_active' => '1'
            ],
            [
                'user_id' => '1',
                'name' => 'Jeans',
                'description' => 'A type of pants made from denim or dungaree cloth.',
                'is_active' => '1'
            ],
        ];

        Category::insert($categories);
    }
}
