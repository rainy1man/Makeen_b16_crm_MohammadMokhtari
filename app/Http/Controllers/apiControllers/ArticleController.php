<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = DB::table('articles')->orderBy('id', 'desc')->paginate(5);
        return response()->json($articles);
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
        $article = DB::table('articles')->insert($request->toArray());
        return response()->json($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $article)
    {
        $article = DB::table('articles')->where('id', $article)->first();
        return response()->json($article);
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
    public function update(Request $request, string $article)
    {
        $article = DB::table('articles')->where('id', $article)->update($request->toArray());
        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $article)
    {
        $article = DB::table('articles')->where('id', $article)->delete();
        return response()->json($article);
    }
}
