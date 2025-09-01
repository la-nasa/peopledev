<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers,email'
        ], [
            'email.required' => __('messages.The email field is required.'),
            'email.email' => __('messages.Please enter a valid email address.'),
            'email.unique' => __('messages.This email is already subscribed.')
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        NewsletterSubscriber::create([
            'email' => $request->email,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent')
        ]);

        return redirect()->back()
            ->with('newsletter_success', __('messages.Thank you for subscribing to our newsletter!'));
    }

    public function unsubscribe($email)
    {
        $subscriber = NewsletterSubscriber::where('email', $email)->first();

        if ($subscriber) {
            $subscriber->update(['is_active' => false]);
            return view('newsletter.unsubscribe-success');
        }

        return view('newsletter.unsubscribe-error');
    }
}
