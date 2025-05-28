<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return response()->json(['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'roles_name' => 'required',
        ]);

        $role = Role::create($request->all());
        return response()->json(['message' => 'Role created succesfully!', 'role' => $role]);
    }

    public function show($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        return response()->json(['role' => $role]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'roles_name' => 'required',
        ]);

        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        $role->update($request->all());
        return response()->json(['message' => 'Role updated succesfully!', 'role' => $role]);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        $role->delete();
        return response()->json(['message' => 'Role deleted succesfully!']);
    }
}