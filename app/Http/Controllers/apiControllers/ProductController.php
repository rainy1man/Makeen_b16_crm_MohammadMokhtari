<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequests\CreateProductRequest;
use App\Http\Requests\ProductRequests\EditProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $id = null)
    {
        if ($request->user()->can('product.read')) {
            if (!$id) {
                $products = Product::with(['brand', 'category:id,title', 'warranties', 'labels'])->orderBy('id', 'desc')->paginate(10);
                return response()->json($products);
            } else {
                $product = Product::with(['brand', 'category:id,title', 'warranties', 'labels'])->find($id);
                return response()->json($product);
            }
        } else {
            return $this->unauthorized_response();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->image_path != null) {
            $path = $request->file('image_path')->store('public/product_images');
            $product = Product::create($request->merge([
                "image_path" => $path
            ])->toArray());
        } else {
            $product = Product::create($request->toArray());
        }
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
