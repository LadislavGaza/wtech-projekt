<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryPlaceRequest;
use App\Http\Requests\UpdateDeliveryPlaceRequest;
use App\Models\DeliveryPlace;

class DeliveryPlaceController extends Controller
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
     * @param  \App\Http\Requests\StoreDeliveryPlaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryPlaceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryPlace  $deliveryPlace
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryPlace $deliveryPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryPlace  $deliveryPlace
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryPlace $deliveryPlace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryPlaceRequest  $request
     * @param  \App\Models\DeliveryPlace  $deliveryPlace
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryPlaceRequest $request, DeliveryPlace $deliveryPlace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryPlace  $deliveryPlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryPlace $deliveryPlace)
    {
        //
    }
}
