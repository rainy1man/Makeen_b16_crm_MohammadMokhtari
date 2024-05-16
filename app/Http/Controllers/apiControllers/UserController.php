<?php

namespace App\Http\Controllers\apiControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\CreateUserRequest;
use App\Http\Requests\UserRequests\EditUserRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user) {
            return response()->json('not found');
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json('pass not found');
        }
        $token = $user->createToken($request->phone_number)->plainTextToken;
        return response()->json(["token" => $token]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->json("logout");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $id = null)
    {
        if ($request->user()->can('user.read') || $request->user()->id == $id) {
            if (!$id) {
                $users = new User();
                $users = $users->with(['orders', 'ticket', 'labels', 'userFactors', 'tasks']);
                if ($request->has_orders) {
                    $users = $users->has('orders');
                }
                if ($request->order_sum) {
                    $users = $users->withSum('orders', 'totall_amount');
                }
                if ($request->order_count) {
                    $users = $users->withCount('orders');
                }
                $users = $users->orderBy('id', 'desc')->paginate(10);
                return $this->success_response($users);
            } else {
                $user = User::with(['orders', 'ticket', 'labels', 'userFactors', 'tasks'])->find($id);
                return $this->success_response($user);
            }
        } else {
            return $this->unauthorized_response();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->can('user.store')) {
            $user = User::create($request->merge(["password" => Hash::make($request->password)])->toArray());
            $user->labels()->attach($request->label_ids);
            $user->assignRole('user'); // default role for new users is user
            return response()->json($user);
        } else {
            return response()->json('user does not have permission', 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->user()->can('user.update') || $request->user()->id == $id) {
            $user = User::where('id', $id)->update($request->merge(["password" => Hash::make($request->password)])->toArray());
            return response()->json($user);
        } else {
            return response()->json('user does not have permission', 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->user()->can('user.delete') || $request->user()->id == $id) {
            $user = User::destroy($id);
            return response()->json($user);
        }
    }

    public function test()
    {
        return response()->json();
    }
}

