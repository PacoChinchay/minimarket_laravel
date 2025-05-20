<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $start = Carbon::now()->startOfMonth();
        $end   = Carbon::now()->endOfMonth();

        $totalUsers     = User::count();
        $activeProducts = Product::where('stock', '>', 0)->count();
        $monthlyOrders  = Order::whereBetween('created_at', [$start, $end])->count();
        $revenue        = Order::whereBetween('created_at', [$start, $end])->sum('total');

        $cogs = DB::table('order_products')
            ->join('orders',   'order_products.order_id',   '=', 'orders.id')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->whereBetween('orders.created_at', [$start, $end])
            ->sum(DB::raw('order_products.amount * products.buy'));

        $grossProfit = $revenue - $cogs;
        $netProfit   = $grossProfit; 

        $latestOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeProducts',
            'monthlyOrders',
            'revenue',
            'cogs',
            'grossProfit',
            'netProfit',
            'latestOrders'
        ));
    }
}
