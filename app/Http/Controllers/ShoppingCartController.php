<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShoppingCartRequest;
use App\Http\Requests\UpdateShoppingCartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Product;
use Illuminate\Database\QueryException;


class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart()->first();
            $items = $cart->items()->with('product')->get();
        } else {
            $cart = $request->session()->get('cart', array());
            $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');

            $items = array();
            foreach ($cart as $product_id => $quantity) {
                array_push($items, (object) [
                    'quantity' => $quantity,
                    'product' => $products[$product_id]
                ]);
            }
        }

        $final_sum = 0;
        foreach($items as $item) {
            $final_sum += $item->product->price * $item->quantity;
        }
        return view('shop.cart', ['items' => $items, 'final_sum' => $final_sum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShoppingCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoppingCartRequest $request)
    {
        $request->validate(['product-id' => 'required|integer|min:1']);
        $product = (int)$request->get('product-id');
        
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart()->first();
            try {
                $cart->items()->create([
                    'quantity' => 1,
                    'product_id' => $product
                ]);
            } catch (QueryException $e) {
                return back()->with('status', true);
            }
        } else {
            $cart = $request->session()->get('cart', array());
            $cart[$product] = 1;
            $request->session()->put('cart', $cart);
        }

        return back()->with('status', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingCartRequest  $request
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['howMuch' => 'required|integer|min:1']);
        $quantity = (int)$request->get('howMuch');

        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart()->first();
            $product = $cart->items()->where('product_id', $id);
            $product->update(['quantity' => $quantity]);
        } else {
            $cart = $request->session()->get('cart', array());
            $cart[$id] = $quantity;
            $request->session()->put('cart', $cart);
        }

        return redirect('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = $id;
        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart()->first();
            $product = $cart->items()->where('product_id', $id);
            $product->delete();
        } else {
            $cart = $request->session()->get('cart', array());
            unset($cart[$product]);
            $request->session()->put('cart', $cart);
        }
        
        return redirect('cart');
    }
}
