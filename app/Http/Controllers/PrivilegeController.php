<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class PrivilegeController extends Controller
{
    public function index()
    {
         $users = User::where('id', '!=', Auth::id())->get();
        return view('privileges.index', compact('users'));
    }

    public function show( $userId)
    {
         $user = User::findOrFail( $userId);
         $permissions = Permission::all();

        return view('privileges.show', compact('user', 'permissions'));
    }



    public function updatePrivileges(Request  $request,  $userId)
    {
         $user = User::findOrFail( $userId);

         $selectedPermissions =  $request->permissions ?? [];

         $rolePermissions =  $user->getPermissionsViaRoles()->pluck('name')->toArray();

         $directPermissions =  $user->permissions->pluck('name')->toArray();

         $permissionsToRevoke = array_intersect( $directPermissions, array_diff( $directPermissions,  $selectedPermissions));
        Log::info('Permissions to Revoke: ' . implode(', ',  $permissionsToRevoke));

        foreach ( $permissionsToRevoke as  $permission) {
             $user->revokePermissionTo( $permission);
        }

         $permissionsToGrant = array_diff( $selectedPermissions, array_merge( $rolePermissions,  $directPermissions));
        Log::info('Permissions to Grant: ' . implode(', ',  $permissionsToGrant));

        foreach ( $permissionsToGrant as  $permission) {
             $user->givePermissionTo( $permission);
        }

        foreach ( $user->roles as  $role) {
             $rolePermissions =  $role->permissions->pluck('name')->toArray();
             $permissionsToRemove = array_diff( $rolePermissions,  $selectedPermissions);
            if (!empty( $permissionsToRemove)) {
                 $user->removeRole( $role);
            }
        }

        foreach ( $user->roles as  $role) {
             $rolePermissions =  $role->permissions->pluck('name')->toArray();
             $permissionsToAdd = array_intersect( $selectedPermissions,  $rolePermissions);
            if (!empty( $permissionsToAdd) && ! $user->hasRole( $role->name)) {
                 $user->assignRole( $role);
            }
        }

         $user->syncPermissions( $selectedPermissions);

        return redirect()->back()->with('success', 'Privileges updated successfully.');
    }
}
