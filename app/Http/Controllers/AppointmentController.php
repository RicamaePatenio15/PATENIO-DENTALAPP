<?php

// app/Http/Controllers/AppointmentController.php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json(['appointments' => $appointments]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'dentist_id' => 'required',
            'user_id' => 'required',
            'service_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $appointment = Appointment::create($request->all());
        return response()->json(['message' => 'Appointment created succesfully!', 'appointment' => $appointment]);
    }

    public function show($id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
        return response()->json(['appointment' => $appointment]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required',
            'dentist_id' => 'required',
            'user_id' => 'required',
            'service_id' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
        $appointment->update($request->all());
        return response()->json(['message' => 'Appointment updated succesfully!', 'appointment' => $appointment]);
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted succesfully!']);
    }
}
