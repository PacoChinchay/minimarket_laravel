<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function daschboard() {
        return view('admin.dashboard', [
            'totalUser' => User::count(),
            'totalProducts' => Product::count(),
            'monthlyOrders' => Order::whereMonth('created_at', now()->month)->count()
        ]);
    }
}
