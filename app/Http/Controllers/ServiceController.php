<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // GET: List all services
    public function get()
    {
        return response()->json(Service::all());
    }

    // POST: Add a new service
    public function add(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
        ]);

        $service = Service::create($validated);
        return response()->json($service, 201);
    }

    // PUT: Update an existing service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
        ]);

        $service->update($validated);
        return response()->json($service);
    }

    // DELETE: Delete a service
    public function delete($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully']);
    }
}
