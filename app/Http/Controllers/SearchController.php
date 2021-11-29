<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $term = $request->query('search', '');
        $products = Product::where('name', 'ilike', '%'.$term.'%');

        $sort = $request->query('sort', 'default');
        if ($sort == 'cheap') {
            $products = $products->orderBy('price', 'asc');
        } else if ($sort == 'expensive') {
            $products = $products->orderBy('price', 'desc');
        } else if ($sort == 'discount') {
            $products = $products->orderBy('discount', 'desc');
        } else if ($sort == 'newest') {
            $products = $products->orderBy('year', 'desc');
        }

        if ($request->has('price-from')) {
            $products = $products->where('price', '>=', $request->query('price-from'));
        } 
        if ($request->has('price-to')) {
            $products = $products->where('price', '<=', $request->query('price-to'));
        }

        $filter = new Category;
        $filters = $filter->filters();
        $filter_names = $filter->filter_names();

        return view('shop.products', [
            'room' => (object) ['name' => 'Výsledky pre: "'. $term .'"', 'key' => 'search'],
            'products' => $products->paginate(9), 
            'active_sort' => $sort,
            'filters' => $filters,
            'filter_names' => $filter_names,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        parse_str($params['url-params'], $old_params);
        $params = Arr::except($params, ['url-params', '_token']);
        $old_params = Arr::except($old_params, array_keys($params));
        $params = array_merge($params, $old_params);

        return redirect(strtok(url()->previous(), '?') . '?' . http_build_query($params));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $recommendations = (
            Product::inRandomOrder()
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get()
        );

        // print_r($product);

        return view('shop.product', [
            'room' => 'search',
            'product' => $product,
            'recommendations' => $recommendations
        ]);
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
