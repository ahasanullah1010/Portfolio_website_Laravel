<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;

use Illuminate\Http\Request;


class ContactMessageApiController extends Controller
{
    // Get all contact messages
    public function index()
    {
        return response()->json(ContactMessage::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string'
        ]);

        $contactData = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // ডাটাবেজে সংরক্ষণ
        ContactMessage::create($contactData);

        // ইমেইল পাঠানো
        Mail::to('jkkniumdahasanullah@gmail.com')->send(new ContactMessageMail($contactData));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
