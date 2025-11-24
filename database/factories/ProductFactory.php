<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str; 

class ProductFactory extends Factory
{
    /**
     * Daftar data produk statis yang akan diulang
     * Diubah menjadi public static agar bisa diakses oleh ProductSeeder.
     */
    public static array $realProducts = [
        // --- 1. MAKANAN UTAMA (3 PRODUK) ---
        [
            'name' => 'Nasi Goreng Spesial',
            'desc' => 'Nasi goreng dengan bumbu rempah dan telur mata sapi.',
            'price' => 25000,
            'image' => 'products/nasi-goreng-spesial.jpg',
            'category' => 'Makanan Utama',
        ],
        [
            'name' => 'Mie Goreng Biasa',
            'desc' => 'Mie kuning yang dimasak dengan bumbu kecap manis, sayuran, dan irisan bakso.',
            'price' => 18000,
            'image' => 'products/mie-goreng.jpg',
            'category' => 'Makanan Utama',
        ],
        [
            'name' => 'Nasi Putih',
            'desc' => 'Satu porsi nasi putih hangat.',
            'price' => 5000,
            'image' => 'products/nasi-putih.jpg',
            'category' => 'Makanan Utama',
        ],
        
        // --- 2. LAUK PAUK (3 PRODUK) ---
        [
            'name' => 'Ayam Geprek Sambal Matah',
            'desc' => 'Ayam goreng renyah dengan sambal matah pedas.',
            'price' => 20000,
            'image' => 'products/ayam-geprek.jpg',
            'category' => 'Lauk Pauk',
        ],
        [
            'name' => 'Telur Dadar Crispy',
            'desc' => 'Telur dadar tebal yang digoreng garing.',
            'price' => 8000,
            'image' => 'products/telur-dadar.jpg',
            'category' => 'Lauk Pauk',
        ],
        [
            'name' => 'Ikan Nila Goreng',
            'desc' => 'Satu ekor ikan nila segar digoreng hingga kering dan renyah.',
            'price' => 22000,
            'image' => 'products/ikan-nila.jpg',
            'category' => 'Lauk Pauk',
        ],
        
        // --- 3. SAYUR & KUAH (3 PRODUK) ---
        [
            'name' => 'Sayur Asem Jakarta',
            'desc' => 'Kuah asam manis pedas berisi jagung, melinjo, dan kacang panjang.',
            'price' => 15000,
            'image' => 'products/sayur-asem.jpg',
            'category' => 'Sayur & Kuah',
        ],
        [
            'name' => 'Sop Buntut',
            'desc' => 'Potongan buntut sapi dengan kuah bening yang kaya rempah.',
            'price' => 35000,
            'image' => 'products/sop-buntut.jpg',
            'category' => 'Sayur & Kuah',
        ],
        [
            'name' => 'Tumis Kangkung Terasi',
            'desc' => 'Kangkung segar yang ditumis cepat dengan bumbu terasi.',
            'price' => 12000,
            'image' => 'products/tumis-kangkung.jpg',
            'category' => 'Sayur & Kuah',
        ],

        // --- 4. MINUMAN (3 PRODUK) ---
        [
            'name' => 'Es Teh Manis',
            'desc' => 'Teh segar yang manis dengan es batu.',
            'price' => 5000,
            'image' => 'products/es-teh.jpg',
            'category' => 'Minuman',
        ],
        [
            'name' => 'Kopi Panas Hitam',
            'desc' => 'Kopi murni tanpa gula, disajikan panas.',
            'price' => 7000,
            'image' => 'products/kopi-panas.jpg',
            'category' => 'Minuman',
        ],
        [
            'name' => 'Es Jeruk Peras',
            'desc' => 'Jeruk asli yang diperas, manis, dan segar dengan es.',
            'price' => 10000,
            'image' => 'products/es-jeruk.jpg',
            'category' => 'Minuman',
        ],
        
        // --- 5. CAMILAN/TAMBAHAN (3 PRODUK) ---
        [
            'name' => 'Kerupuk Putih',
            'desc' => 'Kerupuk bawang besar, renyah, dan gurih.',
            'price' => 2000,
            'image' => 'products/kerupuk-putih.jpg',
            'category' => 'Camilan/Tambahan',
        ],
        [
            'name' => 'Tahu Isi Pedas',
            'desc' => 'Tahu yang diisi sayuran pedas, digoreng renyah.',
            'price' => 5000,
            'image' => 'products/tahu-isi.jpg',
            'category' => 'Camilan/Tambahan',
        ],
        [
            'name' => 'Sambal Terasi',
            'desc' => 'Satu porsi sambal terasi matang yang pedas dan wangi.',
            'price' => 7000,
            'image' => 'products/sambal-terasi.jpg',
            'category' => 'Camilan/Tambahan',
        ],
    ];

    public function definition(): array
    {
        // Default definition (digunakan saat tidak ada state)
        return [
            'category_id' => Category::inRandomOrder()->first()->id, 
            'name' => fake()->word(),
            'slug' => 'default-slug',
            'description' => null,
            'price' => 0,
            'is_available' => true,
            'image_url' => null,
        ];
    }
    
    public function stateProduct(array $data): Factory
    {
        $name = $data['name'];
        $category = Category::where('name', $data['category'])->first();

        // Fallback jika Category belum dibuat
        if (!$category) {
            $category = Category::factory()->create(['name' => $data['category'], 'slug' => Str::slug($data['category'])]);
        }

        return $this->state(fn (array $attributes) => [
            'category_id' => $category->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $data['desc'],
            'price' => $data['price'],
            'is_available' => true,
            'image_url' => $data['image'],
        ]);
    }
}