@extends('web.layout.app')

@section('title', 'Mentions Légales')

@section('content')

    <section class="public-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="fw-bold mb-4">Mentions Légales</h1>
                    <p class="text-muted mb-4">Conformément aux dispositions de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.</p>

                    <div class="card border">
                        <div class="card-body p-4">

                            <h5 class="mb-3">1. Éditeur du site</h5>
                            <p>
                                <strong>Raison sociale :</strong> [Nom de votre entreprise]<br>
                                <strong>Forme juridique :</strong> [SAS / SARL / Auto-entrepreneur / ...]<br>
                                <strong>Capital social :</strong> [Montant] €<br>
                                <strong>Siège social :</strong> [Adresse complète]<br>
                                <strong>SIRET :</strong> [Numéro SIRET]<br>
                                <strong>RCS :</strong> [Ville et numéro RCS]<br>
                                <strong>TVA intracommunautaire :</strong> [Numéro TVA]<br>
                                <strong>Directeur de la publication :</strong> [Nom du responsable]<br>
                                <strong>Email :</strong> contact@{{ request()->getHost() }}
                            </p>

                            <h5 class="mb-3 mt-4">2. Hébergeur</h5>
                            <p>
                                <strong>Raison sociale :</strong> [Nom de l'hébergeur]<br>
                                <strong>Adresse :</strong> [Adresse de l'hébergeur]<br>
                                <strong>Téléphone :</strong> [Numéro de téléphone]<br>
                                <strong>Site web :</strong> [URL de l'hébergeur]
                            </p>

                            <h5 class="mb-3 mt-4">3. Propriété intellectuelle</h5>
                            <p>L'ensemble du contenu de ce site (textes, images, graphismes, logo, icônes, logiciels, etc.) est la propriété exclusive de l'éditeur ou de ses partenaires et est protégé par les lois françaises et internationales relatives à la propriété intellectuelle.</p>
                            <p>Toute reproduction, représentation, modification, publication ou adaptation de tout ou partie des éléments du site est interdite sans l'autorisation écrite préalable de l'éditeur.</p>

                            <h5 class="mb-3 mt-4">4. Données personnelles</h5>
                            <p>Pour toute information relative à la collecte et au traitement de vos données personnelles, veuillez consulter notre <a href="{{ route('privacy') }}">Politique de Confidentialité</a>.</p>

                            <h5 class="mb-3 mt-4">5. Cookies</h5>
                            <p>Ce site utilise des cookies essentiels au fonctionnement de l'application. Pour plus d'informations, consultez notre <a href="{{ route('privacy') }}">Politique de Confidentialité</a>.</p>

                            <h5 class="mb-3 mt-4">6. Limitation de responsabilité</h5>
                            <p>L'éditeur ne pourra être tenu responsable des dommages directs ou indirects causés au matériel de l'utilisateur lors de l'accès au site. L'éditeur décline toute responsabilité quant à l'utilisation qui pourrait être faite des informations et contenus présents sur le site.</p>

                            <h5 class="mb-3 mt-4">7. Droit applicable</h5>
                            <p>Les présentes mentions légales sont régies par le droit français. En cas de litige, les tribunaux français seront seuls compétents.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
