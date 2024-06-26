<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests\CreateCategoryRequest;
use App\Http\Requests\CategoryRequests\EditCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('categories.index', ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        DB::table('categories')->insert([
            "categoryName" => $request->categoryName,
            "description" => $request->description,
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('categories.edit', ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCategoryRequest $request, string $id)
    {
        DB::table('categories')->where('id', $id)->update([
            "categoryName" => $request->categoryName,
            "description" => $request->description,
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('categories.index');
    }
}
