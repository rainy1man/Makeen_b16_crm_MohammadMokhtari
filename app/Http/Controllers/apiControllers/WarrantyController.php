<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Warranty;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $warranties = Warranty::orderBy('id', 'desc')->paginate(10);
            return response()->json($warranties);
        } else {
            $warranty = Warranty::find($id);
            return response()->json($warranty);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $warranty = Warranty::create($request->toArray());
        return response()->json($warranty);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $warranty = Warranty::find($id)->update($request->toArray());
        return response()->json($warranty);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warranty = Warranty::destroy($id);
        return response()->json($warranty);
    }
}
