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
     * @OA\Get(
     *     path="/api/users",
     *     summary="Display a listing of the users",
     *     @OA\Parameter(
     *         name="has_orders",
     *         in="query",
     *         description="Filter users with orders",
     *         required=false,
     *         @OA\Schema(type="boolean")
     *     ),
     *     @OA\Parameter(
     *         name="order_sum",
     *         in="query",
     *         description="Include order sum",
     *         required=false,
     *         @OA\Schema(type="boolean")
     *     ),
     *     @OA\Parameter(
     *         name="order_count",
     *         in="query",
     *         description="Include order count",
     *         required=false,
     *         @OA\Schema(type="boolean")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     security={{"api_key": {}}}
     * )
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
                return $this->response200($users);
            } else {
                $user = User::with(['orders', 'ticket', 'labels', 'userFactors', 'tasks'])->find($id);
                return $this->response200($user);
            }
        } else {
            return $this->unauthorized_response();
        }
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Store a newly created user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(response=403, description="User does not have permission"),
     *     security={{"api_key": {}}}
     * )
     */
    public function store(Request $request)
    {
        if ($request->user()->can('user.store')) {
            $user = User::create($request->merge(["password" => Hash::make($request->password)])->toArray());
            $user->labels()->attach($request->label_ids);
            $user->assignRole('user'); // default role for new users is user
            return $this->response200($user);
        } else {
            return response()->json('user does not have permission', 403);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/users/{id}",
     *     summary="Update the specified user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the user to update",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(response=403, description="User does not have permission"),
     *     security={{"api_key": {}}}
     * )
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
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     summary="Remove the specified user",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the user to delete",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(type="integer")
     *     ),
     *     @OA\Response(response=403, description="User does not have permission"),
     *     security={{"api_key": {}}}
     * )
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->user()->can('user.delete') || $request->user()->id == $id) {
            $user = User::destroy($id);
            return response()->json($user);
        } else {
            return response()->json('user does not have permission', 403);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/test",
     *     summary="Test endpoint",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function test()
    {
        return response()->json();
    }
}
