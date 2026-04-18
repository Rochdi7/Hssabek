@extends('emails.layout')

@section('title', 'Bienvenue')

@section('body')
    <h3>Bienvenue, {{ $user->name }} !</h3>

    <p>Votre compte sur <strong>{{ $tenant->name }}</strong> a été créé avec succès.</p>

    <p>Vous pouvez maintenant accéder à votre espace de gestion pour :</p>

    <ul style="color: #555; line-height: 2;">
        <li>Créer et envoyer des factures professionnelles</li>
        <li>Gérer vos clients et fournisseurs</li>
        <li>Suivre vos paiements et finances</li>
        <li>Générer des rapports détaillés</li>
    </ul>

    <p style="text-align: center; margin: 24px 0;">
        <a href="{{ route('login') }}" class="btn">Accéder à mon espace</a>
    </p>

    <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>

    <p>Cordialement,<br>L'équipe {{ config('app.name') }}</p>
@endsection
