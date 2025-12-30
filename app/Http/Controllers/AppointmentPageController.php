<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentPageController extends Controller
{
    public function index()
    {
        return view('pages.appointments.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'nullable|string|max:100',
            'appointment_date' => 'required|date|after:now',
            'note' => 'nullable|string',
        ]);

        $data['status'] = 'pending';

        Appointment::create($data);

        return redirect()->route('appointments.index')->with('success', 'Appointment request submitted! We will contact you shortly to confirm.');
    }
}
