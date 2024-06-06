<?php

namespace App\Http\Controllers\apiControllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{

    // Login user
    public function login(Request $request)
    {
        $user = User::where('phone_number', $request->phone_number)->first();

        if (!$user) {
            return $this->response404();
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json('pass not found');
        }
        $token = $user->createToken($request->phone_number)->plainTextToken;
        return response()->json(["token" => $token]);
    }

    // Logout user
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->json("logout");
    }


     // Retrieve a list of all roles
     public function role_index(Request $request)
     {
         $roles = Role::all();
         return $this->success_response($roles);
     }

     // Retrieve a list of all permissions
     public function permission_index(Request $request)
     {
         $roles = Permission::all();
         return $this->success_response($roles);
     }

     // Create a new role
     public function store(Request $request)
     {
         $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
         return $this->success_response($role);
     }

     // Update an existing role
     public function update(Request $request, string $id)
     {
         $role = Role::find($id)->update(['name' => $request->name]);
         return $this->success_response($role);
     }

     // Delete a role
     public function destroy(string $id)
     {
         Role::destroy($id);
         return $this->delete_response();
     }

     // Update the permissions associated with a role
     public function update_role_permissions(Request $request, string $id)
     {
         $role = Role::find($id);
         $role->permissions()->sync($request->permissions);
         return $this->success_response($role);
     }

     // Retrieve a list of a user permissions
     public function show_user_roles(Request $request, string $id)
     {
         $user = User::find($id);
         $roles = $user->getRoleNames();
         return $this->success_response($roles);
     }

     // Update the roles associated with a user
     public function update_user_roles(Request $request, string $id)
     {
         $user = User::find($id);
         $user->roles()->sync($request->roles);
         $roles = $user->getRoleNames();
         return $this->success_response($roles);
     }

     // Retrieve a list of a user permissions
     public function show_user_permissions(Request $request, string $id)
     {
         $user = User::find($id);
         $permissions = $user->getPermissionNames();
         return $this->success_response($permissions);
     }

     // Update the permissions directly associated with a user
     public function update_user_permissions(Request $request, string $id)
     {
         $user = User::find($id);
         $user->permissions()->sync($request->permissions);
         $permissions = $user->getPermissionNames();
         return $this->success_response($permissions);
     }

}
