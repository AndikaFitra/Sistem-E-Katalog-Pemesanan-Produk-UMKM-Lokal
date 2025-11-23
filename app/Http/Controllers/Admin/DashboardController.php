<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        // Ambil data untuk dashboard Admin
        $todaySales = Order::where('status', 'paid')->whereDate('created_at', today())->sum('total_amount');
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        
        return view('admin.dashboard', compact('todaySales', 'totalOrders', 'totalProducts'));
    }
}