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

        $msg_search = 'Výsledky pre hľadanie: "'. $term .'"';
        if ($term == '')
            $msg_search = 'Zobrazuje sa celý katalóg nábytku';

        $category_room = (object) ['name' => $msg_search, 'key' => 'search'];

        $filter = $request->all();
        $criteria = Category::whereIn('key', array_keys($filter))->get();

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
            'products' => $products->paginate(9), 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $previous = strtok(url()->previous(), '?');

        if ($request->has('filter') || $request->has('sort')) {
            $params = $request->all();
            parse_str($params['url-params'], $old_params);
            $params = Arr::except($params, ['url-params', '_token']);
            $old_params = Arr::except($old_params, array_keys($params));
            $params = array_merge($params, $old_params);

            return redirect($previous . '?' . http_build_query($params));

        } else if ($request->has('cancel')) {
            $params = $request->all();
            parse_str($params['url-params'], $old_params);

            if (array_key_exists('search', $old_params))
                return redirect($previous . '?' . http_build_query([
                    'search' => $old_params['search']
                ]));
    
            return redirect($previous);
        }
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
