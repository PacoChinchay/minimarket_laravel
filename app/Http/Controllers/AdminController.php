<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'activeProducts' => Product::where('stock', '>', 0)->count(),
            'monthlyOrders' => Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
            'revenue' => Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('total'),
            'latestOrders' => Order::with('user')->latest()->take(5)->get()
        ]);
    }
}
