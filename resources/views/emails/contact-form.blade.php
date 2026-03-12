@extends('emails.layout')

@section('title', 'Nouveau message de contact')

@section('body')
    <h3>Nouveau message de contact</h3>

    <p>Vous avez reçu un nouveau message via le formulaire de contact :</p>

    <div class="highlight">
        <p><strong>Nom :</strong> {{ $contactData['name'] }}</p>
        <p><strong>Email :</strong> {{ $contactData['email'] }}</p>
        <p><strong>Sujet :</strong>
            @switch($contactData['subject'])
                @case('question') Question générale @break
                @case('support') Support technique @break
                @case('billing') Facturation & Abonnement @break
                @case('partnership') Partenariat @break
                @default Autre
            @endswitch
        </p>
    </div>

    <p><strong>Message :</strong></p>
    <p>{{ $contactData['message'] }}</p>

    <hr style="border: none; border-top: 1px solid #eee; margin: 24px 0;">
    <p style="font-size: 12px; color: #999;">Vous pouvez répondre directement à cet email pour contacter l'expéditeur.</p>
@endsection
