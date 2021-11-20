<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShoppingItemRequest;
use App\Http\Requests\UpdateShoppingItemRequest;
use App\Models\ShoppingItem;

class ShoppingItemController extends Controller
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
     * @param  \App\Http\Requests\StoreShoppingItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoppingItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingItem  $shoppingItem
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingItem $shoppingItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingItem  $shoppingItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingItem $shoppingItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingItemRequest  $request
     * @param  \App\Models\ShoppingItem  $shoppingItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoppingItemRequest $request, ShoppingItem $shoppingItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingItem  $shoppingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingItem $shoppingItem)
    {
        //
    }
}
