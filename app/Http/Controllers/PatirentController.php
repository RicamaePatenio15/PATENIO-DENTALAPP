<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // Show all patients
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    // Store a new patient
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:patients,email',
            'phone_num' => 'required|string|max:15',
        ]);

        $patient = Patient::create($validated);
        return response()->json($patient, 201);
    }

    // Show a specific patient
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json($patient);
    }

    // Update a patient
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:100',
            'last_name' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:patients,email,' . $patient->patient_id . ',patient_id',
            'phone_num' => 'sometimes|string|max:15',
        ]);

        $patient->update($validated);
        return response()->json($patient);
    }

    // Delete a patient
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return response()->json(['message' => 'Patient deleted']);
    }
}
