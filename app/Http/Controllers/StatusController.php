<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\User_status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = User_status::all();
        return response()->json(['statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_name' => 'required',
        ]);

        $status = User_status::create($request->all());
        return response()->json(['message' => 'Status created succesfully!', 'status' => $status]);
    }

    public function show($id)
    {
        $status = User_status::find($id);
        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }
        return response()->json(['status' => $status]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_name' => 'required',
        ]);

        $status = User_status::find($id);
        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }
        $status->update($request->all());
        return response()->json(['message' => 'Status updated succesfully!', 'status' => $status]);
    }

    public function destroy($id)
    {
        $status = User_status::find($id);
        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }
        $status->delete();
        return response()->json(['message' => 'Status deleted succesfully!']);
    }
}