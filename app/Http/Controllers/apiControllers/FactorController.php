<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Factor;
use Illuminate\Http\Request;

class FactorController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $factors = Factor::with('order.user')->orderBy('id', 'desc')->paginate(10);
            return response()->json($factors);
        } else {
            $factor = Factor::find($id);
            return response()->json($factor);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factor = Factor::create($request->toArray());
        return response()->json($factor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $factor = Factor::find($id)->update($request->toArray());
        return response()->json($factor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Factor::destroy($id);
    }
}
