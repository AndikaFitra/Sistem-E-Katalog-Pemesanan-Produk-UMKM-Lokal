<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
// TIDAK ADA IMPORT UNTUK PRODUCTFACTORY DI SINI

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PERBAIKAN IMPORT: Menggunakan full namespace ProductFactory
        $products = \Database\Factories\ProductFactory::$realProducts; 

        foreach ($products as $productData) {
            // Memanggil stateProduct dari ProductFactory
            Product::factory()->stateProduct($productData)->create();
        }
    }
}