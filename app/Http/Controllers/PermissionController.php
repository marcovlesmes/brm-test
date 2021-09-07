<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function PHPSTORM_META\map;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();

        return view('permissions.index', compact('roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Update permissions
        $roles = Role::get();
        $role1_permissions = [];
        $role2_permissions = [];
        
        collect($request->all())->each(function ($value, $key) use (&$role1_permissions, &$role2_permissions) {
            if (strstr($key, 'Rol1')) {
                $role1_permissions[] = str_replace('_', '.', str_replace('Rol1_', '', $key));
            } elseif (strstr($key, 'Rol2')) {
                $role2_permissions[] = str_replace('_', '.', str_replace('Rol2_', '', $key));
            }
        });

        $roles[0]->syncPermissions($role1_permissions);
        $roles[1]->syncPermissions($role2_permissions);

        $user = Auth::user();
        $user->syncRoles([$request->role]);
        return redirect()->route('index');
    }

}
