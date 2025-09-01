<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = ContactRequest::create($validated);

        // Envoyer un email (à configurer selon les besoins)
        // Mail::to('contact@peopledev.com')->send(new ContactFormMail($contact));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès. Nous vous contacterons bientôt.');
    }
}