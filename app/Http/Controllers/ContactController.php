<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    // Display the contact form
    public function showForm()
    {
        return view('contact');  // Return the contact view
    }

    // Handle the contact form submission
    public function submitForm(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Get the contact form email from the config
        $contactEmail = config('mail.contact_form_email');  // Get email from config

        // Ensure there is a valid email address set
        if (!$contactEmail) {
            return back()->with('error', 'The recipient email is not set.')->withInput();
        }

        try {
            // Send the email to the contact form recipient
            Mail::to($contactEmail)
                ->send(new ContactFormMail($validated)); // Pass validated data to the mailable

            // Redirect back with a success message
            return back()->with('success', 'Thank you for contacting us!');
        } catch (\Exception $e) {
            // Handle failure to send email
            return back()->with('error', 'There was an error sending your message. Please try again. ' . $e->getMessage())->withInput();
        }
    }
}
