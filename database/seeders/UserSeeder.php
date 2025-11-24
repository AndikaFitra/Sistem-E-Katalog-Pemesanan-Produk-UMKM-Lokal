<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Superadmin (is_approved = 1)
        User::factory()->superadmin()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@resto.com',
            'password' => Hash::make('password'),
        ]);

        // 2. Akun Admin Kasir (is_approved = 1)
        User::factory()->approvedAdmin()->create([
            'name' => 'Admin Kasir',
            'email' => 'admin@resto.com',
            'password' => Hash::make('password'),
        ]);
        
        // 3. Akun Staff Dapur (is_approved = 0 / Pending)
        User::factory()->pendingAdmin()->create([ 
            'name' => 'Staff Dapur Pending',
            'email' => 'dapur@resto.com',
            'password' => Hash::make('password'),
        ]);
    }
}