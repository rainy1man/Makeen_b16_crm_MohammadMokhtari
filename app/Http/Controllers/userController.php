<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\editUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users.index', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createUserRequest $request)
    {

        // $request->validate([
        //     'name' => ['required'],
        //     'codeMelli' => ['required', 'integer'],
        // ]);

        DB::table('users')->insert([
            "name" => $request->name,
            "codeMelli" => $request->codeMelli,
            "phoneNumber" => $request->phoneNumber,
            "birthDate" => $request->birthDate,
            "gender" => $request->gender,
            "email" => $request->email,
            "password" => $request->password,
        ]);
        return redirect('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('users.edit', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editUserRequest $request, string $id)
    {
        DB::table('users')->where('id', $id)->update([
            "name" => $request->name,
            "codeMelli" => $request->codeMelli,
            "phoneNumber" => $request->phoneNumber,
            "birthDate" => $request->birthDate,
            "gender" => $request->gender,
            "email" => $request->email,
        ]);
        return redirect('/users/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users/index');
    }
}
