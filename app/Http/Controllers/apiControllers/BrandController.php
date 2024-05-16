<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\BerandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $brands = Brand::orderBy('id', 'desc')->paginate(10);
            return BerandResource::collection( $brands );
        } else {
            $brand = Brand::find($id);
            return BerandResource::make( $brand );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = Brand::create($request->toArray());
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id)->update($request->toArray());
        return response()->json($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::destroy($id);
        return response()->json($brand);
    }
}
