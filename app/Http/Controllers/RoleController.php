<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // GET: List all roles
    public function get()
    {
        return response()->json(Role::all());
    }

    // POST: Add a new role
    public function add(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|string|max:255',
        ]);

        $role = Role::create($validated);
        return response()->json($role, 201);
    }

    // PUT: Update an existing role
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'role_name' => 'required|string|max:255',
        ]);

        $role->update($validated);
        return response()->json($role);
    }

    // DELETE: Delete a role
    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Role deleted successfully']);
    }
}
