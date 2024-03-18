<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = DB::table('articles')->get();
        $categories = DB::table('categories')->get();
        return view('articles.index', ["articles" => $articles], ["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('articles.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('articles')->insert([
            "title" => $request->title,
            "category" => $request->category,
            "textPost" => $request->textPost,
        ]);
        return redirect('/articles/index');
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
        $article = DB::table('articles')->where('id', $id)->first();
        return view('articles.edit', ["article" => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('articles')->where('id', $id)->update([
            "title" => $request->title,
            "category" => $request->category,
            "textPost" => $request->textPost,
        ]);
        return redirect('/articles/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('articles')->where('id', $id)->delete();
        return redirect('/articles/index');
    }
}
