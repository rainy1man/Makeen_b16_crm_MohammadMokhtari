<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $province_id)
    {
        $cities = City::where('province_id', $province_id)->get();
        return response()->json($cities);
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

