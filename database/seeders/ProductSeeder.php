<?php

namespace Database\Seeders;

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
            ['name' => 'Nirmala', 'price' => 103.00, 'description' => '"Where we first met."', 'image' => 'nirmala.png'],
            ['name' => 'Srikandi', 'price' => 103.00, 'description' => '"When I put my ego aside."', 'image' => 'srikandi.png'],
            ['name' => 'Jiwa', 'price' => 103.00, 'description' => '"Where our stories start with a glass of iced matcha latte with oatmilk."', 'image' => 'jiwa.jpeg'],
            ['name' => 'Dewi', 'price' => 103.00, 'description' => '"When I entered your life."', 'image' => 'dewi.png'],
            ['name' => 'Stella', 'price' => 103.00, 'description' => '"Where we bond under the sea of stars."', 'image' => 'stella.jpeg'],
            ['name' => 'Whimsy', 'price' => 103.00, 'description' => '"Where I started to see you in my dreams."', 'image' => 'whimsy.png'],
            ['name' => 'Ophelia', 'price' => 103.00, 'description' => '"When a music reminds me of you."', 'image' => 'ophelia.png'],
            ['name' => 'Astrid', 'price' => 103.00, 'description' => '"Where we talk under the night sky."', 'image' => 'astrid.jpeg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}