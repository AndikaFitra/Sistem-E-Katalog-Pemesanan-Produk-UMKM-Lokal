<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

// INI YANG DIPERBAIKI:
// Nama class HARUS SAMA DENGAN NAMA FILE (DashboardController.php)
class DashboardController extends Controller
{
    public function index()
    {
        // Dashboard Superadmin HANYA berisi data akun
        $totalAdmins = User::where('role', 'admin')->count();
        $pendingApprovals = User::where('role', 'admin')->where('is_approved', false)->count();

        // Data penjualan dihapus dari sini

        // Kirim HANYA data admin ke view
        return view('superadmin.dashboard', compact('totalAdmins', 'pendingApprovals'));
    }
}