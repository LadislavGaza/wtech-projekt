<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $room)
    {
        $user_input = $request->all();
        foreach ($user_input as $key => $value) {
            $request->session()->put($key, $value);   
        }

        if ($request->has('cancel-filters')){
            $request->session()->forget('price-from');
            $request->session()->forget('price-to');
        }

        $products = Product::with('rooms')->whereHas('categories', function ($query) use($room) {
            $query->where('key', $room);
        });
            
        $sort = 'default';

        if ($request->session()->has('product-sort')) {
            $sort = $request->session()->get('product-sort');
            $sort_actions = [
                'cheap' => $products->orderBy('price', 'asc'), 
                'expensive' => $products->orderBy('price', 'desc'), 
                'discount' => $products->orderBy('discount', 'desc'),
                'newest' => $products->orderBy('year', 'desc')
            ];
            $products = $sort_actions[$sort];
        }

        if($request->session()->has('price-from')){
            $price_from = $request->session()->get('price-from');
            $products = $products->where('price', '>=', $price_from);
        }

        if($request->session()->has('price-to')){
            $price_to = $request->session()->get('price-to');
            $products = $products->where('price', '<=', $price_to);
        }

        $filter_names = [
            'era' => 'Historické obdobie',
            'material' => 'Materiál',
            'furniture' => 'Druh nábytku',
            'color' => 'Farba',
        ];

        $filters = [
            'era' => Category::where('type', 'era')->get(),
            'material' => Category::where('type', 'material')->get(),
            'furniture' => Category::where('type', 'furniture')->get(),
            'color' => Category::where('type', 'color')->get(),
        ];
                  
        return view('shop.products', [
            'room' => Category::where('type', 'room')->where('key', $room)->first(),
            'products' => $products->paginate(9), 
            'active_sort' => $sort,
            'filters' => $filters,
            'filter_names' => $filter_names
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($room, Product $product)
    {
        $recommendations = (
            Product::with('rooms')
            ->whereHas('categories', function ($query) use($room) {
                $query->where('key', $room);
            })
            ->inRandomOrder()
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get()
        );

        return view('shop.product', [
            'room' => Category::where('type', 'room')->where('key', $room)->first(),
            'product' => $product,
            'recommendations' => $recommendations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
