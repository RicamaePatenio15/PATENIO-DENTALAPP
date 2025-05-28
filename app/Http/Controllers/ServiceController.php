<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return response()->json(['services' => $services]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dentist_id' => 'required',
            'service_name' => 'required',
        ]);

        $service = Service::create($request->all());
        return response()->json(['message' => 'Service created succesfully!', 'service' => $service]);
    }

    public function show($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }
        return response()->json(['service' => $service]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dentist_id' => 'required',
            'service_name' => 'required',
        ]);

        $service = Service::find($id);
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }
        $service->update($request->all());
        return response()->json(['message' => 'Service updated succesfully!', 'service' => $service]);
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }
        $service->delete();
        return response()->json(['message' => 'Service deleted succesfully!']);
    }
}