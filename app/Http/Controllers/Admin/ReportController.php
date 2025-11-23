<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $filterType = $request->input('filter_type', 'daily');
        $startDate = $request->input('start_date', Carbon::today()->toDateString());
        $endDate = $request->input('end_date', Carbon::today()->toDateString());

        $reportTitle = "Laporan Harian (" . Carbon::parse($startDate)->format('d M Y') . ")";
        $query = Order::where('status', 'paid');

        switch ($filterType) {
            case 'daily':
                $start = Carbon::parse($startDate)->startOfDay();
                $end = Carbon::parse($startDate)->endOfDay();
                $query->whereBetween('paid_at', [$start, $end]);
                $reportTitle = "Laporan Harian (" . $start->format('d M Y') . ")";
                break;
                
            case 'weekly':
                $start = Carbon::parse($startDate)->startOfWeek();
                $end = Carbon::parse($startDate)->endOfWeek();
                $query->whereBetween('paid_at', [$start, $end]);
                $reportTitle = "Laporan Mingguan (" . $start->format('d M') . " - " . $end->format('d M Y') . ")";
                break;

            case 'monthly':
                $start = Carbon::parse($startDate)->startOfMonth();
                $end = Carbon::parse($startDate)->endOfMonth();
                $query->whereBetween('paid_at', [$start, $end]);
                $reportTitle = "Laporan Bulanan (" . $start->format('F Y') . ")";
                break;

            case 'custom':
                $start = Carbon::parse($startDate)->startOfDay();
                $end = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('paid_at', [$start, $end]);
                $reportTitle = "Laporan (" . $start->format('d M Y') . " - " . $end->format('d M Y') . ")";
                break;
        }

        $orders = $query->get();

        // Statistik
        $totalSales = $orders->sum('total_amount');
        $totalCash = $orders->where('payment_method', 'cash')->sum('total_amount');
        $totalQris = $orders->where('payment_method', 'qris')->sum('total_amount');

        return view('admin.reports.index', compact(
            'orders', 
            'reportTitle', 
            'totalSales', 
            'totalCash', 
            'totalQris'
        ));
    }
}