<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index() {
        return view('admin.orders.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.amount' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $total = 0;
        
            $order = Order::create([
                'user_id' => $request->input('user_id'), // viene desde el formulario
                'total' => 0,
                'state' => 'pendiente',
                'date' => now(),
            ]);

            foreach ($request->products as $item) {
                $product = Product::find($item['id']);

                if ($product->stock < $item['amount']) {
                    throw new \Exception("Stock insuficiente para el producto {$product->name}");
                }

                $subtotal = $product->price * $item['amount'];
                $order->products()->attach($product->id, [
                    'amount' => $item['amount'],
                    'price' => $product->price,
                ]);

                // Restar el stock
                $product->decrement('stock', $item['amount']);
                $total += $subtotal;
            }

            $order->update(['total' => $total]);

            DB::commit();

            return response()->json(['message' => 'Pedido creado correctamente'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
