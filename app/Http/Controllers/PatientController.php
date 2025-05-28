<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return response()->json(['patients' => $patients]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_num' => 'required',
        ]);

        $patient = Patient::create($request->all());
        return response()->json(['message' => 'Patient created succesfully!', 'patient' => $patient]);
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        return response()->json(['patient' => $patient]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_num' => 'required',
        ]);

        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        $patient->update($request->all());
        return response()->json(['message' => 'Patient updated succesfully!', 'patient' => $patient]);
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        $patient->delete();
        return response()->json(['message' => 'Patient deleted succesfully!']);
    }
}