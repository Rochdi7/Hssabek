@extends('web.layout.app')

@section('title', 'Conditions Générales d\'Utilisation')

@section('content')

    <section class="public-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="fw-bold mb-4">Conditions Générales d'Utilisation</h1>
                    <p class="text-muted mb-4">Dernière mise à jour : {{ date('d/m/Y') }}</p>

                    <div class="card border">
                        <div class="card-body p-4">

                            <h5 class="mb-3">Article 1 — Objet</h5>
                            <p>Les présentes Conditions Générales d'Utilisation (ci-après « CGU ») ont pour objet de définir les modalités et conditions d'utilisation du service {{ config('app.name') }} (ci-après « le Service »), ainsi que de définir les droits et obligations des parties dans ce cadre.</p>
                            <p>Le Service est une application en ligne (SaaS) de facturation et de gestion commerciale accessible via un navigateur web.</p>

                            <h5 class="mb-3 mt-4">Article 2 — Accès au Service</h5>
                            <p>Le Service est accessible à toute personne physique ou morale disposant d'une connexion internet. L'accès au Service nécessite la création d'un compte utilisateur et la souscription à un plan d'abonnement.</p>
                            <p>L'utilisateur s'engage à fournir des informations exactes et à jour lors de son inscription.</p>

                            <h5 class="mb-3 mt-4">Article 3 — Inscription et compte</h5>
                            <p>Pour utiliser le Service, l'utilisateur doit créer un compte en fournissant les informations requises (nom, adresse email, mot de passe, informations de l'entreprise). Chaque compte est personnel et l'utilisateur est responsable de la confidentialité de ses identifiants.</p>
                            <p>L'utilisateur s'engage à ne pas partager ses identifiants de connexion et à notifier immédiatement l'éditeur en cas d'utilisation non autorisée de son compte.</p>

                            <h5 class="mb-3 mt-4">Article 4 — Abonnement et tarification</h5>
                            <p>L'utilisation du Service est soumise à la souscription d'un abonnement payant selon les tarifs en vigueur, consultables sur la page <a href="{{ route('pricing') }}">Tarification</a>.</p>
                            <p>Les abonnements sont facturés à la période choisie (mensuelle ou annuelle). L'utilisateur peut modifier ou résilier son abonnement à tout moment depuis son espace de gestion.</p>

                            <h5 class="mb-3 mt-4">Article 5 — Obligations de l'utilisateur</h5>
                            <p>L'utilisateur s'engage à :</p>
                            <ul>
                                <li>Utiliser le Service conformément à sa destination et aux présentes CGU ;</li>
                                <li>Ne pas utiliser le Service à des fins illicites ou frauduleuses ;</li>
                                <li>Ne pas porter atteinte à l'intégrité, la sécurité ou la disponibilité du Service ;</li>
                                <li>Respecter les droits de propriété intellectuelle de l'éditeur ;</li>
                                <li>Maintenir la confidentialité de ses identifiants de connexion.</li>
                            </ul>

                            <h5 class="mb-3 mt-4">Article 6 — Propriété intellectuelle</h5>
                            <p>L'ensemble des éléments constituant le Service (logiciel, interface, textes, graphismes, base de données, etc.) est protégé par les lois relatives à la propriété intellectuelle.</p>
                            <p>L'utilisateur conserve la pleine propriété de ses données saisies dans le Service.</p>

                            <h5 class="mb-3 mt-4">Article 7 — Protection des données</h5>
                            <p>Le traitement des données personnelles est régi par notre <a href="{{ route('privacy') }}">Politique de Confidentialité</a>, qui fait partie intégrante des présentes CGU.</p>

                            <h5 class="mb-3 mt-4">Article 8 — Responsabilité</h5>
                            <p>L'éditeur s'engage à fournir le Service avec diligence et selon les règles de l'art. Il ne saurait être tenu responsable des dommages indirects résultant de l'utilisation ou de l'impossibilité d'utiliser le Service.</p>
                            <p>L'éditeur ne garantit pas un fonctionnement ininterrompu du Service et pourra procéder à des opérations de maintenance.</p>

                            <h5 class="mb-3 mt-4">Article 9 — Résiliation</h5>
                            <p>L'utilisateur peut résilier son abonnement à tout moment. La résiliation prend effet à la fin de la période d'abonnement en cours.</p>
                            <p>L'éditeur se réserve le droit de suspendre ou supprimer un compte en cas de violation des présentes CGU.</p>

                            <h5 class="mb-3 mt-4">Article 10 — Droit applicable</h5>
                            <p>Les présentes CGU sont régies par le droit français. Tout litige relatif à l'interprétation ou à l'exécution des présentes sera soumis aux tribunaux compétents.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
