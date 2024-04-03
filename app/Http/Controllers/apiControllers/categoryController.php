<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests\CreateCategoryRequest;
use App\Http\Requests\CategoryRequests\EditCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->toArray());
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {
        $category = Category::find($category);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCategoryRequest $request, string $category)
    {
        $category = Category::where('id', $category)->update($request->toArray());
       return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category)
    {
        $category = Category::destroy($category);
        return response()->json($category);
    }
}
