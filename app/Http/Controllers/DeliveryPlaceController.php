<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $places = DeliveryPlace::select(['id', 'name']);
        $search = $request->query('search', '');
        if ($search != '') {
            $places->where('name', 'ilike', '%'. $search .'%');
        }
        return response()->json($places->get());
    }

}
