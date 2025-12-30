<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $contactInfos = Contact::where('is_active', true)->get();
        return view('pages.contact.index', compact('contactInfos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        ContactMessage::create($data);

        return redirect()->route('contact.index')->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
