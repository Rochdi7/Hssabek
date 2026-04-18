@extends('emails.layout')

@section('title', 'Compte approuvé')

@section('body')
    <h3>Félicitations, {{ $user->name }} !</h3>

    <p>Votre demande de compte pour <strong>{{ $tenant->name }}</strong> a été approuvée. Vous pouvez dès maintenant accéder à votre espace de gestion.</p>

    <div class="highlight">
        <p><strong>Vos identifiants de connexion :</strong></p>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Mot de passe :</strong> {{ $password }}</p>
        <p><strong>Lien d'accès :</strong> <a href="{{ route('login') }}">{{ route('login') }}</a></p>
    </div>

    <div style="background-color: #fff3cd; border: 1px solid #ffc107; border-radius: 6px; padding: 14px 16px; margin: 16px 0;">
        <p style="color: #856404; margin: 0; font-size: 14px;">
            <strong>⚠ Sécurité :</strong> Pour protéger votre compte, veuillez <strong>changer votre mot de passe</strong> dès votre première connexion depuis les paramètres de votre compte.
        </p>
    </div>

    <p>Avec {{ config('app.name') }}, vous pouvez :</p>

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
