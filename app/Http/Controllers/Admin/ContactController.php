<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact_settings.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('contacts', 'public');
        }

        Contact::create($data);

        return redirect()->route('admin.contact_settings.index')->with('success', 'Contact info created successfully');
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            if ($contact->logo) {
                Storage::disk('public')->delete($contact->logo);
            }
            $data['logo'] = $request->file('logo')->store('contacts', 'public');
        }

        $contact->update($data);

        return redirect()->route('admin.contact_settings.index')->with('success', 'Contact info updated successfully');
    }

    public function destroy(Contact $contact)
    {
        if ($contact->logo) {
            Storage::disk('public')->delete($contact->logo);
        }
        $contact->delete();
        return back()->with('success', 'Contact info deleted');
    }
}
