<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AccountRequestFormRequest;
use App\Http\Requests\Web\ContactRequest;
use App\Models\Billing\Plan;
use App\Models\System\AccountRequest;
use App\Models\System\ContactMessage;
use App\Models\System\NewsletterSubscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Mail\NewsletterWelcomeMail;

class PageController extends Controller
{
    public function home(): View
    {
        return view('frontoffice.pages.home');
    }

    public function pricing(): View
    {
        $plans = Cache::remember('frontoffice_active_plans', 3600, function () {
            return Plan::where('is_active', true)
                ->orderBy('price')
                ->get();
        });

        return view('frontoffice.pages.pricing', compact('plans'));
    }

    public function features(): View
    {
        return view('frontoffice.pages.features');
    }

    public function contact(): View
    {
        return view('frontoffice.pages.contact');
    }

    public function contactSend(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        ContactMessage::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'subject'    => $data['subject'],
            'message'    => $data['message'],
            'ip_address' => $request->ip(),
        ]);

        try {
            Mail::to(config('mail.from.address'))->send(new \App\Mail\ContactFormMail($data));
        } catch (\Exception $e) {
            Log::warning('Contact form email failed to send', ['error' => $e->getMessage()]);
        }

        return redirect()
            ->route('contact')
            ->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
    }

    public function newsletterSubscribe(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ], [
            'email.required' => 'Veuillez saisir votre adresse email.',
            'email.email'    => 'Veuillez saisir une adresse email valide.',
        ]);

        $subscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if ($subscriber) {
            if ($subscriber->is_active) {
                return response()->json([
                    'message' => 'Cette adresse email est déjà inscrite à notre newsletter.',
                ]);
            }

            $subscriber->update([
                'is_active'       => true,
                'unsubscribed_at' => null,
                'ip_address'      => $request->ip(),
            ]);

            try {
                Mail::to($request->email)->send(new NewsletterWelcomeMail($request->email));
            } catch (\Exception $e) {
                Log::warning('Newsletter welcome email failed', ['error' => $e->getMessage()]);
            }

            return response()->json([
                'message' => 'Votre inscription à la newsletter a été réactivée avec succès !',
            ]);
        }

        NewsletterSubscriber::create([
            'email'      => $request->email,
            'ip_address' => $request->ip(),
        ]);

        try {
            Mail::to($request->email)->send(new NewsletterWelcomeMail($request->email));
        } catch (\Exception $e) {
            Log::warning('Newsletter welcome email failed', ['error' => $e->getMessage()]);
        }

        return response()->json([
            'message' => 'Merci ! Vous êtes maintenant inscrit à notre newsletter.',
        ]);
    }

    public function terms(): View
    {
        return view('frontoffice.pages.terms');
    }

    public function privacy(): View
    {
        return view('frontoffice.pages.privacy');
    }

    public function legal(): View
    {
        return view('frontoffice.pages.legal');
    }

    public function helpCenter(): View
    {
        return view('frontoffice.pages.help-center');
    }

    public function support(): View
    {
        return view('frontoffice.pages.support');
    }

    public function faq(): View
    {
        return view('frontoffice.pages.faq');
    }

    public function autoEntrepreneur(): View
    {
        return view('frontoffice.pages.auto-entrepreneur');
    }

    public function requestAccount(): View
    {
        return view('frontoffice.pages.request-account');
    }

    public function requestAccountSend(AccountRequestFormRequest $request): RedirectResponse
    {
        $data = $request->validated();

        AccountRequest::create([
            ...$data,
            'ip_address' => $request->ip(),
        ]);

        return redirect()
            ->route('request-account')
            ->with('success', 'Votre demande de compte a été envoyée avec succès. Nous vous contacterons dans les plus brefs délais.');
    }
}
