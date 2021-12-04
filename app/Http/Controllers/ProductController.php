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
        $filter = $request->all();
        $criteria = Category::whereIn('key', array_keys($filter))->get();
        $category_room = Category::where('type', 'room')->where('key', $room)->first();

        $products = Product::with('categories');
        $products->whereHas('categories', function ($query) use($room) {
            $query->where('type', 'room')->where('key', $room);
        });

        $filter = new Category;
        $filters = $filter->filters();
        $filter_names = $filter->filter_names();
        $filters_checked = array();

        foreach($criteria as $c) {
            $products->whereHas('categories', function($query) use ($c){
                $query->where('key', $c->key);
            });
            $filters_checked[$c->key] = 'checked';
        }
        
        if ($request->has('price-from')) {
            $products = $products->where('price', '>=', $request->query('price-from'));
        } 
        if ($request->has('price-to')) {
            $products = $products->where('price', '<=', $request->query('price-to'));
        }

        $sort = $request->query('sort', 'default');
        if ($sort  == 'cheap') {
            $products = $products->orderBy('price', 'asc');
        } else if ($sort == 'expensive') {
            $products = $products->orderBy('price', 'desc');
        } else if ($sort == 'discount') {
            $products = $products->orderBy('discount', 'desc');
        } else if ($sort == 'newest') {
            $products = $products->orderBy('year', 'desc');
        }

        return view('shop.products', [
            'room' => $category_room,
            'products' => $products->where('quantity', '>', 0)->paginate(9), 
            'active_sort' => $sort,
            'filters' => $filters,
            'filter_names' => $filter_names,
            'filters_checked' => $filters_checked,
            'query' => request()->except('page')
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
