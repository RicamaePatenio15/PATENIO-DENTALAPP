<?php

namespace App\Http\Controllers;

use App\Models\Dentist;
use Illuminate\Http\Request;

class DentistController extends Controller
{
    public function index()
    {
        $dentists = Dentist::all();
        return response()->json(['dentists' => $dentists]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $dentist = Dentist::create($request->all());
        return response()->json(['message' => 'Dentist created succesfully!', 'dentist' => $dentist]);
    }

    public function show($id)
    {
        $dentist = Dentist::find($id);
        if (!$dentist) {
            return response()->json(['message' => 'Dentist not found'], 404);
        }
        return response()->json(['dentist' => $dentist]);
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
    ]);

    $dentist = Dentist::find($id);
    if (!$dentist) {
        return response()->json(['message' => 'Dentist not found'], 404);
    }
    $dentist->update($request->all());
    return response()->json(['message' => 'Dentist updated succesfully!', 'dentist' => $dentist]);
}

public function destroy($id)
{
    $dentist = Dentist::find($id);
    if (!$dentist) {
        return response()->json(['message' => 'Dentist not found'], 404);
    }
    $dentist->delete();
    return response()->json(['message' => 'Dentist deleted succesfully!']);
}
}