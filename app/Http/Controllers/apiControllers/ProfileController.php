<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequests\CreateProfileRequest;
use App\Http\Requests\ProfileRequests\EditProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {
        $profiles = new Profile();
        $profiles = $profiles->with([
            'city:id,city_name',
            'province:id,province_name',
            'user:id,first_name,last_name,phone_number,email,team_id',
            'media'
        ]);
        if (!$id) {
            $profiles = $profiles->orderBy('id', 'desc')->paginate(25);
            return response()->json($profiles);
        } else {
            $profile = $profiles->find($id);
            return response()->json($profile);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProfileRequest $request)
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
    public function update(EditProfileRequest $request, string $id)
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
