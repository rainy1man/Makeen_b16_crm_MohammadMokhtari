<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(5);
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
    public function store(Request $request)
    {
        $category = DB::table('categories')->insert($request->toArray());
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {
        $category = DB::table('categories')->where('id', $category)->first();
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
    public function update(Request $request, string $category)
    {
        $category = DB::table('categories')->where('id', $category)->update($request->toArray());
       return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category)
    {
        $category = DB::table('categories')->where('id', $category)->delete();
        return response()->json($category);
    }
}
