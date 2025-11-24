<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Table;
use App\Model\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Pastikan nama Seeder Anda SAMA PERSIS dengan nama file
            UserSeeder::class,      
            TableSeeder::class,     
            CategorySeeder::class,  
            ProductSeeder::class,   
        ]);
    }
}