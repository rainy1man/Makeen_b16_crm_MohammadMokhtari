<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        if (!$id) {
            $profiles = Profile::with(['city:id,city_name', 'province:id,province_name', 'user:id,first_name,last_name,phone_number,email,team_id'])->orderBy('id', 'desc')->paginate(10);
            return response()->json($profiles);
        } else {
            $profile = Profile::find($id);
            return response()->json($profile);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('avatar')->store('public/avatars');
        $profile = Profile::create($request->merge([
            "avatar" => $path
        ])->toArray());
        return response()->json($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profile = Profile::find($id)->update($request->toArray());
        return response()->json($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::destroy($id);
        return response()->json($profile);
    }
}
