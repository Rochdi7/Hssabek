@extends('emails.layout')

@section('title', 'Rappel de paiement')

@section('body')
    <h3>Rappel de paiement</h3>

    <p>Bonjour,</p>

    <p>Nous vous rappelons que la facture suivante est en attente de paiement :</p>

    <div class="highlight">
        <p><strong>Facture n° :</strong> {{ $invoice->number }}</p>
        <p><strong>Montant total :</strong> {{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</p>
        <p><strong>Montant dû :</strong> {{ number_format($invoice->amount_due, 2, ',', ' ') }} {{ $currency }}</p>
        @if($invoice->due_date)
            <p><strong>Date d'échéance :</strong> {{ $invoice->due_date->format('d/m/Y') }}</p>
        @endif
        @if($daysOverdue > 0)
            <p style="color: #dc3545;"><strong>Retard :</strong> {{ $daysOverdue }} jour(s)</p>
        @endif
    </div>

    <p>Nous vous serions reconnaissants de bien vouloir procéder au règlement de cette facture dans les meilleurs délais.</p>

    <p>Si ce paiement a déjà été effectué, veuillez ignorer ce message.</p>

    <p>Cordialement,<br><strong>{{ $tenantName }}</strong></p>
@endsection
