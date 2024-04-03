<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequests\CreateArticleRequest;
use App\Http\Requests\ArticleRequests\EditArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::join('categories', 'categories.id', '=', 'articles.category_id')
            ->select('articles.*', 'categories.categoryName', 'categories.description')
            ->orderBy('id', 'desc')
            ->paginate(5);
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
    public function store(CreateArticleRequest $request)
    {
        $article = Article::create($request->toArray());
        return response()->json($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $article)
    {
        $article = Article::find($article);
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
    public function update(EditArticleRequest $request, string $article)
    {
        $article = Article::where('id', $article)->update($request->toArray());
        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $article)
    {
        $article = Article::destroy($article);
        return response()->json($article);
    }
}
