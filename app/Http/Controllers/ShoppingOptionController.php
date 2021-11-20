<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShoppingOptionRequest;
use App\Http\Requests\UpdateShoppingOptionRequest;
use App\Models\ShoppingOption;

class ShoppingOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreShoppingOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoppingOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingOption  $shoppingOption
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingOption $shoppingOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingOption  $shoppingOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingOption $shoppingOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingOptionRequest  $request
     * @param  \App\Models\ShoppingOption  $shoppingOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoppingOptionRequest $request, ShoppingOption $shoppingOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingOption  $shoppingOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingOption $shoppingOption)
    {
        //
    }
}
