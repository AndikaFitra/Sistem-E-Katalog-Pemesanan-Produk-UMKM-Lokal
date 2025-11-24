<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    // ... (property dan definition() tetap sama, kecuali default role kita ubah ke 'customer')

    public function definition(): array
    {
        return [
            // ... (kolom standar)
            'role' => 'customer', // Default: Customer (belum tentu di-approve)
            'is_approved' => false,
            'remember_token' => Str::random(10),
        ];
    }

    // --- STATES DENGAN LOGIC PERSETUJUAN ---
    
    /**
     * State untuk Superadmin (Approved)
     */
    public function superadmin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'superadmin',
            'is_approved' => true, // <-- PENTING
        ]);
    }

    /**
     * State untuk Admin Biasa (Approved)
     */
    public function approvedAdmin(): static // <-- NAMA STATE INI HARUS ADA!
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
            'is_approved' => true, // <-- PENTING
        ]);
    }
    
    /**
     * State untuk Admin yang Mendaftar dan Belum Di-approve
     */
    public function pendingAdmin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
            'is_approved' => false, // <-- PENTING
        ]);
    }
}