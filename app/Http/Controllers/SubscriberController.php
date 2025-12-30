<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ], [
            'email.unique' => 'You are already subscribed to our newsletter!'
        ]);

        Subscriber::create([
            'email' => $request->email
        ]);

        return back()->with('success_newsletter', 'Thank you for subscribing to our newsletter!');
    }
}
