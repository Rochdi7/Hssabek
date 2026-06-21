@extends('emails.layout')

@section('title', 'Bienvenue à notre newsletter')

@section('body')
    <h3>Bienvenue parmi nos abonnés !</h3>

    <p>Merci de vous être inscrit à la newsletter de <strong>{{ config('app.name', 'Hssabek') }}</strong>.</p>

    <p>Vous recevrez désormais nos dernières actualités, conseils et mises à jour directement dans votre boîte mail :</p>

    <ul style="color: #555; line-height: 2;">
        <li>Les nouvelles fonctionnalités et améliorations</li>
        <li>Des conseils pour optimiser votre facturation</li>
        <li>Les offres et promotions exclusives</li>
    </ul>

    <p style="text-align: center; margin: 24px 0;">
        <a href="{{ url('/') }}" class="btn">Visiter notre site</a>
    </p>

    <p>Si vous n'avez pas demandé cette inscription, vous pouvez simplement ignorer cet email.</p>

    <p>Cordialement,<br>L'équipe {{ config('app.name', 'Hssabek') }}</p>
@endsection
