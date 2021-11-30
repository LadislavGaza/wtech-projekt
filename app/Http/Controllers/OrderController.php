<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\DeliveryPlace;

class OrderController extends Controller
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

        return view('shop.order', [
            'items' => $items, 
            'final_sum' => $final_sum, 
            'places' => DeliveryPlace::all()
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}