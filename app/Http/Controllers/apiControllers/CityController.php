<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $cities = City::orderBy('id', 'desc')->paginate(10);
            return response()->json($cities);
        } else {
            $city = City::find($id);
            return response()->json($city);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $city = City::create($request->toArray());
        return response()->json($city);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $city = City::find($id)->update($request->toArray());
        return response()->json($city);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::destroy($id);
        return response()->json($city);
    }
}

