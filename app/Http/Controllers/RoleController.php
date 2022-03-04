<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return response()->json([
            'roles' => $roles
        ]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return response()->json([
            'permissions' => $permissions
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $permissions = $request->permissions;
        $role = new Role($data);
        $role->save();
        $role->permissions()->sync($permissions);
        return response()->json([
            'role' => $role
        ]);

    }

    public function show(Role $role)
    {
        return response()->json([
            'role' => $role
        ]);
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return response()->json([
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $role->name = $data['name'];
        $role->permissions()->sync($request->permissions);
        return response()->json([
            'role' => $role,
            'permissions' => $permissions
        ]);
    }
}
