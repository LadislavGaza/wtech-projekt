<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\DeliveryPlace;
use App\Models\ShoppingOption;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = null;
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
            'transport_options' => ShoppingOption::where('type', 'transport')->get(),
            'payment_options' => ShoppingOption::where('type', 'payment')->get(),
            'user' => $user
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
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'street' => 'required',
            'city' => 'required',
            'psc' => 'required|digits:5',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',

            'company' => 'nullable',
            'ico' => 'nullable',
            'dic' => 'nullable',
            'ic-dph' => 'nullable',
        ]);

        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart()->first();
            $items = $cart->items()->with('product')->get();
            
            $user->firstname = $request->name; 
            $user->surname = $request->surname; 
            $user->street = $request->street; 
            $user->city = $request->city;
            $user->postal_code = $request->psc;
            $user->phone = $request->phone;
            $type_of_order = $request->get('org');

            if ($type_of_order == 'company'){
                $user->is_company = true;
                $user->company_name = $request->company;
                $user->ico = $request->ico;
                $user->dic = $request->dic;
                $user->ic_dph = $request->ic_dph;
            }
            else {
                $user->is_company = false;
            }
            $user->save();
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
            
            $order = $request->session()->get('order', array());
            $order['firstname'] = $request->name;
            $order['surname'] = $request->surname; 
            $order['street'] = $request->street; 
            $order['city'] = $request->city;
            $order['postal_code'] = $request->psc;
            $order['phone'] = $request->phone;
            $type_of_order = $request->get('org');
            if ($type_of_order == 'company'){
                $order['is_company'] = true;
                $order['company_name'] = $request->company;
                $order['ico'] = $request->ico;
                $order['dic'] = $request->dic;
                $order['ic_dph'] = $request->ic_dph;
            }
            else {
                $order['is_company'] = false;
            }
            $request->session()->put('order', $order);
        }

        $final_sum = 0;
        foreach($items as $item) {
            $final_sum += $item->product->price * $item->quantity;
        }

        $type_of_transport = $request->get('transport');
        $transport = ShoppingOption::where('key', $type_of_transport)->first();
        $final_sum += $transport->price;

        $type_of_payment = $request->get('payment');
        $payment = ShoppingOption::where('key', $type_of_payment)->first();
        $final_sum += $payment->price;

        $delivery_place = $request->get('selection');

        return view('shop.order_summary', [
            'transport' => $transport,
            'payment' => $payment,
            'delivery_place' => DeliveryPlace::find($delivery_place),
            'items' => $items,
            'final_sum' => $final_sum
        ]);
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
