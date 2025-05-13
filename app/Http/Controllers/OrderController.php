<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index() {
        $orders = Order::with(['user', 'products'])
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order) {
        $order->load(['user', 'products']);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pendiente,confirmado,enviado,entregado,cancelado'
        ]);

        // Si se cancela la orden, reestablecer stock
        if($request->status === 'cancelado') {
            foreach($order->products as $product) {
                $product->increment('stock', $product->pivot->amount);
            }
        }

        $order->update(['state' => $validated['status']]);

        return redirect()->back()->with('success', 'Estado actualizado correctamente');
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
                'user_id' => $request->input('user_id'), 
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
