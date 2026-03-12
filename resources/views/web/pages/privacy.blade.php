@extends('web.layout.app')

@section('title', 'Politique de Confidentialité')

@section('content')

    <section class="public-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="fw-bold mb-4">Politique de Confidentialité</h1>
                    <p class="text-muted mb-4">Dernière mise à jour : {{ date('d/m/Y') }}</p>

                    <div class="card border">
                        <div class="card-body p-4">

                            <h5 class="mb-3">1. Introduction</h5>
                            <p>La présente Politique de Confidentialité décrit comment {{ config('app.name') }} (ci-après « nous », « notre ») collecte, utilise et protège vos données personnelles conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés.</p>

                            <h5 class="mb-3 mt-4">2. Données collectées</h5>
                            <p>Nous collectons les données suivantes :</p>
                            <ul>
                                <li><strong>Données d'identification :</strong> nom, prénom, adresse email, numéro de téléphone ;</li>
                                <li><strong>Données professionnelles :</strong> nom de l'entreprise, SIRET, adresse, secteur d'activité ;</li>
                                <li><strong>Données d'utilisation :</strong> logs de connexion, actions dans l'application, adresse IP ;</li>
                                <li><strong>Données commerciales :</strong> factures, devis, informations clients saisies par l'utilisateur ;</li>
                                <li><strong>Données de paiement :</strong> traitées par notre prestataire de paiement sécurisé (nous ne stockons pas les numéros de carte bancaire).</li>
                            </ul>

                            <h5 class="mb-3 mt-4">3. Finalités du traitement</h5>
                            <p>Vos données sont traitées pour les finalités suivantes :</p>
                            <ul>
                                <li>Fourniture et gestion du Service ;</li>
                                <li>Gestion de votre compte utilisateur ;</li>
                                <li>Facturation et gestion des abonnements ;</li>
                                <li>Support technique et assistance ;</li>
                                <li>Amélioration du Service (statistiques anonymisées) ;</li>
                                <li>Communication relative au Service (notifications, mises à jour) ;</li>
                                <li>Respect de nos obligations légales et réglementaires.</li>
                            </ul>

                            <h5 class="mb-3 mt-4">4. Base légale</h5>
                            <p>Le traitement de vos données repose sur :</p>
                            <ul>
                                <li><strong>L'exécution du contrat :</strong> pour la fourniture du Service ;</li>
                                <li><strong>L'obligation légale :</strong> pour la conservation des données de facturation ;</li>
                                <li><strong>L'intérêt légitime :</strong> pour l'amélioration du Service et la prévention des fraudes ;</li>
                                <li><strong>Le consentement :</strong> pour les communications marketing (le cas échéant).</li>
                            </ul>

                            <h5 class="mb-3 mt-4">5. Durée de conservation</h5>
                            <p>Vos données sont conservées pendant la durée de votre abonnement, puis :</p>
                            <ul>
                                <li><strong>Données de compte :</strong> supprimées 12 mois après la clôture du compte ;</li>
                                <li><strong>Données de facturation :</strong> conservées 10 ans (obligation légale) ;</li>
                                <li><strong>Logs de connexion :</strong> conservés 12 mois ;</li>
                                <li><strong>Données de contact (formulaire) :</strong> conservées 3 ans.</li>
                            </ul>

                            <h5 class="mb-3 mt-4">6. Vos droits</h5>
                            <p>Conformément au RGPD, vous disposez des droits suivants :</p>
                            <ul>
                                <li><strong>Droit d'accès :</strong> obtenir une copie de vos données personnelles ;</li>
                                <li><strong>Droit de rectification :</strong> corriger des données inexactes ou incomplètes ;</li>
                                <li><strong>Droit à l'effacement :</strong> demander la suppression de vos données ;</li>
                                <li><strong>Droit à la portabilité :</strong> recevoir vos données dans un format structuré ;</li>
                                <li><strong>Droit d'opposition :</strong> vous opposer au traitement de vos données ;</li>
                                <li><strong>Droit à la limitation :</strong> limiter le traitement de vos données.</li>
                            </ul>
                            <p>Pour exercer ces droits, contactez-nous à : <a href="{{ route('contact') }}">formulaire de contact</a>.</p>

                            <h5 class="mb-3 mt-4">7. Sécurité</h5>
                            <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre tout accès non autorisé, altération, divulgation ou destruction. Cela inclut :</p>
                            <ul>
                                <li>Chiffrement des données en transit (HTTPS/TLS) ;</li>
                                <li>Isolation des données entre locataires (multi-tenant) ;</li>
                                <li>Contrôle d'accès basé sur les rôles ;</li>
                                <li>Sauvegardes régulières ;</li>
                                <li>Journalisation des accès.</li>
                            </ul>

                            <h5 class="mb-3 mt-4">8. Cookies</h5>
                            <p>Notre Service utilise des cookies essentiels au fonctionnement de l'application (session, jeton CSRF). Aucun cookie publicitaire ou de tracking tiers n'est utilisé.</p>

                            <h5 class="mb-3 mt-4">9. Sous-traitants</h5>
                            <p>Nous pouvons faire appel à des sous-traitants pour l'hébergement, le paiement et l'envoi d'emails. Ces sous-traitants sont soumis à des obligations contractuelles conformes au RGPD.</p>

                            <h5 class="mb-3 mt-4">10. Modifications</h5>
                            <p>Nous nous réservons le droit de modifier cette Politique de Confidentialité. En cas de modification substantielle, nous vous en informerons par email ou via une notification dans le Service.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
