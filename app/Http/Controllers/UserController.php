<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Get all users
    public function getUser()
    {
        $users = User::with('role', 'status')->get();
        return response()->json($users);
    }

    // Add new user
    public function addUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_num' => 'required|string',
            'password' => 'required|string|min:8',
            'role_id' => 'sometimes|exists:roles,id',
            'status_id' => 'sometimes|exists:user_statuses,id',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_num' => $request->phone_num,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id ?? 2,     // Default role_id to 2
            'status_id' => $request->status_id ?? 1, // Default status_id to 1
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    // Edit user by id
    public function editUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);

        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'email', Rule::unique('users')->ignore($user->id)],
            'phone_num' => 'sometimes|string',
            'password' => 'sometimes|string|min:8',
            'role_id' => 'sometimes|exists:roles,id',
            'status_id' => 'sometimes|exists:user_statuses,id',
        ]);

        $user->fill($request->except('password'));

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    // Delete user by id
    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
