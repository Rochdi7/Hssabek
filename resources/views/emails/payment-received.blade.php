@extends('emails.layout')

@section('title', 'Paiement reçu')

@section('body')
    <h3>Confirmation de paiement</h3>

    <p>Bonjour,</p>

    <p>Nous vous confirmons la bonne réception de votre paiement :</p>

    <div class="highlight">
        <p><strong>Référence :</strong> {{ $payment->number ?? $payment->reference ?? '—' }}</p>
        <p><strong>Montant :</strong> {{ number_format($payment->amount, 2, ',', ' ') }} {{ $currency }}</p>
        <p><strong>Date :</strong> {{ $payment->payment_date?->format('d/m/Y') ?? now()->format('d/m/Y') }}</p>
        <p><strong>Méthode :</strong> {{ $payment->payment_method ?? '—' }}</p>
    </div>

    <p>Merci pour votre confiance.</p>

    <p>Cordialement,<br><strong>{{ $tenantName }}</strong></p>
@endsection
