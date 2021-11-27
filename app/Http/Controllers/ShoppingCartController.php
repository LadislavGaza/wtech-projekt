<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShoppingCartRequest;
use App\Http\Requests\UpdateShoppingCartRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Product;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', array());

        $items = Product::whereIn('id', array_keys($cart))->get();

        $final_sum = 0;
        foreach($items as $item){
            $final_sum += $item->price * $cart[$item->id];
        }

        return view('shop.cart', ['items' => $items, 'quantity' => $cart, 'final_sum' => $final_sum]);
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
        $product = $request->get('product-id');
        
        if (Auth::check()) {
            $user = Auth::user();
            // $user->cart()->items()->create();
        }

        $cart = $request->session()->get('cart', array());
        $cart[$product] = 1;
        $request->session()->put('cart', $cart);

        return back();
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
        $cart = $request->session()->get('cart', array());
        $quantity = $request->get('howMuch');
        $cart[$id] = $quantity;
        $request->session()->put('cart', $cart);

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
        
        $cart = $request->session()->get('cart', array());
        unset($cart[$product]);
        $request->session()->put('cart', $cart);
        
        return redirect('cart');
    }
}
