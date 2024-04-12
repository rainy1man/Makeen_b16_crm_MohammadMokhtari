<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequests\CreateArticleRequest;
use App\Http\Requests\ArticleRequests\EditArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = DB::table('articles')
        ->join('categories', 'articles.category_id', '=', 'categories.id')
        ->select('articles.*', 'categories.categoryName')
        ->get();
        return view('articles.index', ["articles" => $articles]);
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
    public function store(CreateArticleRequest $request)
    {
        DB::table('articles')->insert([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "textPost" => $request->textPost,
        ]);
        return redirect()->route('articles.index');
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
        $categories = DB::table('categories')->get();
        $article = DB::table('articles')->where('id', $id)->first();
        return view('articles.edit', ["article" => $article, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditArticleRequest $request, string $id)
    {
        DB::table('articles')->where('id', $id)->update([
            "title" => $request->title,
            "category_id" => $request->category_id,
            "textPost" => $request->textPost,
        ]);
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('articles')->where('id', $id)->delete();
        return redirect()->route('articles.index');
    }
}
