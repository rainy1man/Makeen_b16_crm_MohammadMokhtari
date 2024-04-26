<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $provinces = Province::orderBy('id', 'desc')->paginate(10);
            return response()->json($provinces);
        } else {
            $province = Province::find($id);
            return response()->json($province);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $province = Province::create($request->toArray());
        return response()->json($province);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $province = Province::find($id)->update($request->toArray());
        return response()->json($province);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $province = Province::destroy($id);
        return response()->json($province);
    }
}
