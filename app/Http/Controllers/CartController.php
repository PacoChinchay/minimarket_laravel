<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('store.cart', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Stock insuficiente');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $request->quantity,
                "image" => $product->image,
                "stock" => $product->stock
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('store.cart')->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if ($request->quantity <= $cart[$id]['stock']) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return back()->with('success', 'Carrito actualizado');
        }

        return back()->with('error', 'Cantidad excede el stock disponible');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return back()->with('success', 'Producto eliminado del carrito');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('store.cart')->with('error', 'El carrito está vacío');
        }

        try {
            DB::beginTransaction();

            $orderData = [
                'user_id' => Auth::id(),
                'total' => 0,
                'state' => 'pendiente',
                'date' => now()
            ];

            $order = Order::create($orderData);
            $total = 0;

            foreach ($cart as $item) {
                $product = Product::find($item['id']);

                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Stock insuficiente para {$product->name}");
                }

                $order->products()->attach($product->id, [
                    'amount' => $item['quantity'],
                    'price' => $product->price
                ]);

                $product->decrement('stock', $item['quantity']);
                $total += $product->price * $item['quantity'];
            }

            $order->update(['total' => $total]);
            session()->forget('cart');

            DB::commit();

            return redirect()->route('store.index')->with('success', 'Pedido realizado con éxito');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
