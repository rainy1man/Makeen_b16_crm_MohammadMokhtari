<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequests\CreateProductRequest;
use App\Http\Requests\ProductRequests\EditProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $products = Product::with(['brand', 'category:id,title', 'warranties', 'labels'])->orderBy('id', 'desc')->paginate(10);
            return response()->json($products);
        } else {
            $product = Product::with(['brand', 'category:id,title', 'warranties', 'labels'])->find($id);
            return response()->json($product);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->toArray());
        $product->warranties()->attach($request->warranty_ids);
        $product->labels()->attach($request->label_ids);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::where('id', $id)->update($request->toArray());
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::destroy($id);
        return response()->json($product);
    }
}
