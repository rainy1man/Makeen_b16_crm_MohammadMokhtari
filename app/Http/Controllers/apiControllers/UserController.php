<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\CreateUserRequest;
use App\Http\Requests\UserRequests\EditUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $user = DB::table('users')->where('phoneNumber', $request->phoneNumber)->first();

        if (!$user) {
            return response()->json('not found');
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json('pass not found');
        }
        return response()->json('ok');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'desc')->paginate(5);
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = DB::table('users')->insert($request->merge(["password" => Hash::make($request->password)])->toArray());
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user)
    {
        $user = DB::table('users')->where('id', $user)->first();
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, string $user)
    {
        $user = DB::table('users')->where('id', $user)->update($request->toArray());
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user)
    {
        $user = DB::table('users')->where('id', $user)->delete();
        return response()->json($user);
    }
}
