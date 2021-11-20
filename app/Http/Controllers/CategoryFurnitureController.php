<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryFurnitureRequest;
use App\Http\Requests\UpdateCategoryFurnitureRequest;
use App\Models\CategoryFurniture;

class CategoryFurnitureController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryFurnitureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryFurnitureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryFurniture  $categoryFurniture
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryFurniture $categoryFurniture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryFurniture  $categoryFurniture
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryFurniture $categoryFurniture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryFurnitureRequest  $request
     * @param  \App\Models\CategoryFurniture  $categoryFurniture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryFurnitureRequest $request, CategoryFurniture $categoryFurniture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryFurniture  $categoryFurniture
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryFurniture $categoryFurniture)
    {
        //
    }
}
