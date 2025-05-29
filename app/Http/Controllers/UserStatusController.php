<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    public function getUserStatuses()
    {
        return response()->json(['statuses' => UserStatus::all()]);
    }

    public function addUserStatus(Request $request)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|max:255',
        ]);

        $status = UserStatus::create($validated);

        return response()->json(['message' => 'Status added successfully!', 'status' => $status]);
    }

    public function editUserStatus(Request $request, $id)
    {
        $status = UserStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found.'], 404);
        }

        $validated = $request->validate([
            'status_name' => 'required|string|max:255',
        ]);

        $status->update($validated);

        return response()->json(['message' => 'Status updated successfully!', 'status' => $status]);
    }

    public function deleteUserStatus($id)
    {
        $status = UserStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found.'], 404);
        }

        $status->delete();

        return response()->json(['message' => 'Status deleted successfully!']);
    }
}
