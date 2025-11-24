<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Menggunakan Factory untuk membuat data spesifik warung lokal
        Category::factory()->createMany([
            ['name' => 'Makanan Utama', 'slug' => 'makanan-utama', 'description' => 'Menu nasi dan hidangan utama.'],
            ['name' => 'Lauk Pauk', 'slug' => 'lauk-pauk', 'description' => 'Pilihan protein seperti ayam, ikan, dan telur.'],
            ['name' => 'Sayur & Kuah', 'slug' => 'sayur-kuah', 'description' => 'Sayuran dan hidangan berkuah segar.'],
            ['name' => 'Minuman', 'slug' => 'minuman', 'description' => 'Semua jenis minuman (panas & dingin).'], 
            ['name' => 'Camilan/Tambahan', 'slug' => 'camilan-tambahan', 'description' => 'Kerupuk, gorengan, dan pelengkap.'],
        ]);
    }
}