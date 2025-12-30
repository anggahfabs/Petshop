<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::latest()->get();
        return view('admin.appointments.index', compact('appointments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'pet_name' => 'required|string',
            'pet_type' => 'nullable|string',
            'appointment_date' => 'required|date',
            'note' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        Appointment::create($data);

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment created successfully');
    }

    // Status update only or full edit? Full edit is safer.
    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'note' => 'nullable|string', // Admin might want to add internal notes or edit existing
        ]);

        $appointment->update($data);

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment status updated');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success', 'Appointment deleted');
    }
}
