<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Get all appointments
    public function getAppointments()
    {
        $appointments = Appointment::with('patient', 'dentist', 'user', 'service')->get();
        return response()->json($appointments);
    }

    // Add new appointment
    public function addAppointment(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,patient_id',
            'dentist_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        $appointment = Appointment::create($request->all());

        return response()->json(['message' => 'Appointment created successfully', 'appointment' => $appointment], 201);
    }

    // Update appointment
    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $request->validate([
            'patient_id' => 'sometimes|exists:patients,patient_id',
            'dentist_id' => 'sometimes|exists:users,id',
            'user_id' => 'sometimes|exists:users,id',
            'service_id' => 'sometimes|exists:services,id',
            'date' => 'sometimes|date',
            'time' => 'sometimes|string',
        ]);

        $appointment->update($request->all());

        return response()->json(['message' => 'Appointment updated successfully', 'appointment' => $appointment]);
    }

    // Delete appointment
    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
