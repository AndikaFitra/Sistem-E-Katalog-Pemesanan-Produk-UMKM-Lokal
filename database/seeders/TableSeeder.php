<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- BARU: Import DB Facade
use Carbon\Carbon; // <-- BARU: Untuk mengisi timestamps

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Opsional: Hapus data lama (jika Anda tidak menggunakan migrate:fresh)
        // DB::table('tables')->truncate(); 

        $now = Carbon::now();
        $tables = [];

        // Meja Kecil (M01 sampai M10)
        for ($i = 1; $i <= 10; $i++) {
            $tables[] = [
                'table_number' => 'M' . str_pad($i, 2, '0', STR_PAD_LEFT), 
                'status' => 'available',
                'created_at' => $now, // Wajib diisi saat menggunakan Query Builder
                'updated_at' => $now, // Wajib diisi saat menggunakan Query Builder
            ];
        }
        
        // Meja Besar/Khusus (VIP01)
        $tables[] = [
            'table_number' => 'VIP01',
            'status' => 'available',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        // Contoh meja yang terisi (M11)
        $tables[] = [
            'table_number' => 'M11',
            'status' => 'occupied',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        // Memasukkan semua data sekaligus (batch insert)
        DB::table('tables')->insert($tables);
    }
}