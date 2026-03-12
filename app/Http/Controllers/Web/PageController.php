<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ContactRequest;
use App\Models\Billing\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('web.pages.home');
    }

    public function pricing(): View
    {
        $plans = Plan::where('is_active', true)
            ->orderBy('price')
            ->get();

        return view('web.pages.pricing', compact('plans'));
    }

    public function features(): View
    {
        return view('web.pages.features');
    }

    public function contact(): View
    {
        return view('web.pages.contact');
    }

    public function contactSend(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Log::info('Contact form submission', [
            'name'    => $data['name'],
            'email'   => $data['email'],
            'subject' => $data['subject'],
        ]);

        Mail::to(config('mail.from.address'))->send(new \App\Mail\ContactFormMail($data));

        return redirect()
            ->route('contact')
            ->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
    }

    public function terms(): View
    {
        return view('web.pages.terms');
    }

    public function privacy(): View
    {
        return view('web.pages.privacy');
    }

    public function legal(): View
    {
        return view('web.pages.legal');
    }
}
