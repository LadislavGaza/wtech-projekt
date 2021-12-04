<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = new Product;
    
        if ($request->has('search')) {
            $term = $request->query('search');
            $products = $products->where('name', 'ilike', '%'.$term.'%');
        }

        return view('admin.stock', [
            'products' => $products->orderBy('name')->paginate(10),
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
        $category = new Category;
        $categories = $category->attributes();
        $categories_names = $category->attributes_names();
        $categories_checked = array();

        return view('admin.product', [
            'categories' => $categories,
            'categories_names' => $categories_names,
            'categories_checked' => $categories_checked
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Create new product

         $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer',
            'product_year' => 'required|integer',
            'product_width' => 'required|integer|min:0',
            'product_depth' => 'required|integer|min:0',
            'product_height' => 'required|integer|min:0',
        ]);

        $product = new Product;
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->quantity = $request->product_stock;
        $product->year = $request->product_year;
        $product->width = $request->product_width;
        $product->depth = $request->product_depth;
        $product->height = $request->product_height;
        $product->save();

        $categories = $request->all();
        $criteria = Category::whereIn('key', array_keys($categories))->get()->pluck('id');
        $product->categories()->sync($criteria);

        return redirect('admin/stock/' . $product->id . '/edit');

        //  return redirect('admin/stock/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = new Category;
        $categories = $category->attributes();
        $categories_names = $category->attributes_names();
        $categories_checked = array();

        $product = Product::find($id);
        $tags = $product->categories()->get();
        foreach($tags as $tag) {
            $categories_checked[$tag->key] = 'checked';
        }

        return view('admin.product', [
            'product' => $product,
            'categories' => $categories,
            'categories_names' => $categories_names,
            'categories_checked' => $categories_checked
        ]);
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
        // Change existing product
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer',
            'product_year' => 'required|integer',
            'product_width' => 'required|integer|min:0',
            'product_depth' => 'required|integer|min:0',
            'product_height' => 'required|integer|min:0',
        ]);

        $product = Product::find($id);
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->price = $request->product_price;
        $product->quantity = $request->product_stock;
        $product->year = $request->product_year;
        $product->width = $request->product_width;
        $product->depth = $request->product_depth;
        $product->height = $request->product_height;

        $categories = $request->all();
        $criteria = Category::whereIn('key', array_keys($categories))->get()->pluck('id');
        $product->categories()->sync($criteria);

        $product->save();
        return redirect('admin/stock/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }
}
