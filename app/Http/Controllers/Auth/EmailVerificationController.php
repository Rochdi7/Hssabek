<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResendVerificationRequest;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function showVerificationNotice()
    {
        // Redirect to dashboard if already verified
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            return redirect(route('dashboard'));
        }

        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect(route('dashboard'))->with('status', 'Email verified successfully!');
    }

    public function resend(ResendVerificationRequest $request)
    {
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            return redirect(route('dashboard'));
        }

        auth()->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Verification link sent! Check your email.');
    }
}
