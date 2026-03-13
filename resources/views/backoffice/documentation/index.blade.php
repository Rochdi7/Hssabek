<?php $page = 'documentation'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            {{-- Page Header --}}
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <h4 class="fw-bold mb-1">{{ __('Documentation & Guide d\'utilisation') }}</h4>
                    <p class="text-muted mb-0">{{ __('Apprenez a utiliser toutes les fonctionnalites de votre espace de facturation, etape par etape.') }}</p>
                </div>
            </div>

            {{-- Table of Contents --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="isax isax-menu-board me-2"></i>{{ __('Table des matieres') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#section-introduction" class="text-primary">{{ __('1. Introduction') }}</a></li>
                                <li class="mb-2"><a href="#section-connexion" class="text-primary">{{ __('2. Connexion & Inscription') }}</a></li>
                                <li class="mb-2"><a href="#section-dashboard" class="text-primary">{{ __('3. Tableau de bord') }}</a></li>
                                <li class="mb-2"><a href="#section-entreprise" class="text-primary">{{ __('4. Parametres de l\'entreprise') }}</a></li>
                                <li class="mb-2"><a href="#section-clients" class="text-primary">{{ __('5. Gestion des clients (CRM)') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#section-produits" class="text-primary">{{ __('6. Catalogue (Produits)') }}</a></li>
                                <li class="mb-2"><a href="#section-factures" class="text-primary">{{ __('7. Factures (Ventes)') }}</a></li>
                                <li class="mb-2"><a href="#section-devis" class="text-primary">{{ __('8. Devis') }}</a></li>
                                <li class="mb-2"><a href="#section-paiements" class="text-primary">{{ __('9. Paiements clients') }}</a></li>
                                <li class="mb-2"><a href="#section-avoirs" class="text-primary">{{ __('10. Avoirs & Remboursements') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#section-achats" class="text-primary">{{ __('11. Achats & Fournisseurs') }}</a></li>
                                <li class="mb-2"><a href="#section-stock" class="text-primary">{{ __('12. Inventaire & Stock') }}</a></li>
                                <li class="mb-2"><a href="#section-finance" class="text-primary">{{ __('13. Finance') }}</a></li>
                                <li class="mb-2"><a href="#section-rapports" class="text-primary">{{ __('14. Rapports & Analyses') }}</a></li>
                                <li class="mb-2"><a href="#section-pro" class="text-primary">{{ __('15. Fonctionnalites Pro') }}</a></li>
                                <li class="mb-2"><a href="#section-utilisateurs" class="text-primary">{{ __('16. Utilisateurs & Permissions') }}</a></li>
                                <li class="mb-2"><a href="#section-parametres" class="text-primary">{{ __('17. Tous les parametres') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 1 : INTRODUCTION --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-introduction">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-info-circle me-2"></i>{{ __('1. Introduction') }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">{{ __('Qu\'est-ce que cette application ?') }}</h6>
                    <p>
                        {{ __('Bienvenue dans votre') }} <strong>{{ __('logiciel de facturation et de gestion commerciale en ligne') }}</strong>.
                        {{ __('Cette application vous permet de gerer l\'ensemble de votre activite commerciale depuis un seul endroit :') }}
                    </p>
                    <ul>
                        <li><strong>{{ __('Creer et envoyer des factures') }}</strong> {{ __('a vos clients') }}</li>
                        <li><strong>{{ __('Gerer vos devis') }}</strong> {{ __('et les convertir en factures') }}</li>
                        <li><strong>{{ __('Suivre vos paiements') }}</strong> {{ __('(encaissements et decaissements)') }}</li>
                        <li><strong>{{ __('Gerer votre catalogue') }}</strong> {{ __('de produits et services') }}</li>
                        <li><strong>{{ __('Suivre votre stock') }}</strong> {{ __('et vos entrepots') }}</li>
                        <li><strong>{{ __('Gerer vos achats') }}</strong> {{ __('et fournisseurs') }}</li>
                        <li><strong>{{ __('Suivre vos finances') }}</strong> {{ __(' : comptes bancaires, depenses, revenus') }}</li>
                        <li><strong>{{ __('Generer des rapports') }}</strong> {{ __('detailles sur votre activite') }}</li>
                        <li><strong>{{ __('Gerer les utilisateurs') }}</strong> {{ __('et definir leurs droits d\'acces') }}</li>
                    </ul>

                    <div class="alert alert-info">
                        <i class="isax isax-lamp-charge me-2"></i>
                        <strong>{{ __('Conseil :') }}</strong> {{ __('Avant de commencer a facturer, configurez d\'abord votre entreprise (section 4), ajoutez vos produits (section 6), puis vos clients (section 5).') }}
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 2 : CONNEXION --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-connexion">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-login-1 me-2"></i>{{ __('2. Connexion & Inscription') }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">{{ __('2.1 — S\'inscrire (premiere utilisation)') }}</h6>
                    <ol>
                        <li>{{ __('Rendez-vous sur la page d\'accueil de l\'application.') }}</li>
                        <li>{{ __('Cliquez sur le bouton') }} <strong>{{ __('« S\'inscrire »') }}</strong> {{ __('ou') }} <strong>{{ __('« Commencer »') }}</strong>.</li>
                        <li>{{ __('Remplissez le formulaire :') }}
                            <ul>
                                <li><strong>{{ __('Nom complet') }}</strong> : {{ __('votre prenom et nom') }}</li>
                                <li><strong>{{ __('Adresse e-mail') }}</strong> : {{ __('sera votre identifiant de connexion') }}</li>
                                <li><strong>{{ __('Mot de passe') }}</strong> : {{ __('minimum 8 caracteres, melangez lettres, chiffres et symboles') }}</li>
                                <li><strong>{{ __('Nom de l\'entreprise') }}</strong> : {{ __('le nom commercial de votre societe') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Creer mon compte »') }}</strong>.</li>
                        <li>{{ __('Verifiez votre boite e-mail et cliquez sur le lien de confirmation.') }}</li>
                        <li>{{ __('Vous etes pret ! Vous arrivez sur votre') }} <strong>{{ __('tableau de bord') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('2.2 — Se connecter') }}</h6>
                    <ol>
                        <li>{{ __('Allez sur la page de connexion.') }}</li>
                        <li>{{ __('Entrez votre') }} <strong>{{ __('adresse e-mail') }}</strong> {{ __('et votre') }} <strong>{{ __('mot de passe') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Se connecter »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('2.3 — Mot de passe oublie') }}</h6>
                    <ol>
                        <li>{{ __('Sur la page de connexion, cliquez sur') }} <strong>{{ __('« Mot de passe oublie ? »') }}</strong>.</li>
                        <li>{{ __('Entrez votre adresse e-mail.') }}</li>
                        <li>{{ __('Un lien de reinitialisation sera envoye a votre e-mail.') }}</li>
                        <li>{{ __('Cliquez sur le lien et definissez un nouveau mot de passe.') }}</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 3 : TABLEAU DE BORD --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-dashboard">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-element-3 me-2"></i>{{ __('3. Tableau de bord') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Le tableau de bord est la premiere page que vous voyez apres la connexion. Il vous donne une') }} <strong>{{ __('vue d\'ensemble rapide') }}</strong> {{ __('de votre activite :') }}</p>
                    <ul>
                        <li><strong>{{ __('Chiffre d\'affaires') }}</strong> : {{ __('total des ventes sur la periode') }}</li>
                        <li><strong>{{ __('Factures en attente') }}</strong> : {{ __('nombre et montant des factures non payees') }}</li>
                        <li><strong>{{ __('Depenses') }}</strong> : {{ __('total des depenses du mois') }}</li>
                        <li><strong>{{ __('Graphiques') }}</strong> : {{ __('evolution des ventes et depenses') }}</li>
                        <li><strong>{{ __('Dernieres factures') }}</strong> : {{ __('liste des factures recentes') }}</li>
                        <li><strong>{{ __('Activite recente') }}</strong> : {{ __('dernieres actions effectuees') }}</li>
                    </ul>

                    <div class="alert alert-success">
                        <i class="isax isax-tick-circle me-2"></i>
                        <strong>{{ __('Astuce :') }}</strong> {{ __('Le tableau de bord se met a jour automatiquement. Plus vous utilisez l\'application, plus les statistiques seront precises.') }}
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 4 : PARAMETRES ENTREPRISE --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-entreprise">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-building-4 me-2"></i>{{ __('4. Parametres de l\'entreprise') }}</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning mb-4">
                        <i class="isax isax-warning-2 me-2"></i>
                        <strong>{{ __('Important :') }}</strong> {{ __('Configurez votre entreprise en premier ! Ces informations apparaitront sur toutes vos factures et devis.') }}
                    </div>

                    <h6 class="fw-bold mb-3">{{ __('4.1 — Acceder aux parametres de l\'entreprise') }}</h6>
                    <ol>
                        <li>{{ __('Dans le menu lateral gauche (sidebar), cliquez sur') }} <strong>{{ __('« Parametres »') }}</strong> {{ __('(icone d\'engrenage en bas).') }}</li>
                        <li>{{ __('Selectionnez') }} <strong>{{ __('« Entreprise »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('4.2 — Informations a remplir') }}</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('Champ') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Exemple') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ __('Nom de l\'entreprise') }}</td>
                                <td>{{ __('Votre raison sociale officielle') }}</td>
                                <td>SARL MaBoite</td>
                            </tr>
                            <tr>
                                <td>{{ __('Adresse') }}</td>
                                <td>{{ __('Siege social complet') }}</td>
                                <td>12 Rue de la Paix, 75002 Paris</td>
                            </tr>
                            <tr>
                                <td>{{ __('Telephone') }}</td>
                                <td>{{ __('Numero de contact principal') }}</td>
                                <td>+33 1 23 45 67 89</td>
                            </tr>
                            <tr>
                                <td>{{ __('E-mail') }}</td>
                                <td>{{ __('Adresse e-mail professionnelle') }}</td>
                                <td>contact@maboite.fr</td>
                            </tr>
                            <tr>
                                <td>{{ __('Site web') }}</td>
                                <td>{{ __('URL de votre site (optionnel)') }}</td>
                                <td>www.maboite.fr</td>
                            </tr>
                            <tr>
                                <td>{{ __('Numero de TVA') }}</td>
                                <td>{{ __('Votre numero d\'identification fiscale') }}</td>
                                <td>FR12345678901</td>
                            </tr>
                            <tr>
                                <td>{{ __('Logo') }}</td>
                                <td>{{ __('Logo de votre entreprise (PNG, JPG)') }}</td>
                                <td>{{ __('Fichier image') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('4.3 — Parametres de facturation') }}</h6>
                    <p>{{ __('Dans') }} <strong>{{ __('Parametres > Factures') }}</strong>, {{ __('configurez :') }}</p>
                    <ul>
                        <li><strong>{{ __('Prefixe des factures') }}</strong> : {{ __('ex. « FAC- » pour obtenir FAC-0001, FAC-0002...') }}</li>
                        <li><strong>{{ __('Prefixe des devis') }}</strong> : {{ __('ex. « DEV- » pour DEV-0001, DEV-0002...') }}</li>
                        <li><strong>{{ __('Conditions de paiement') }}</strong> : {{ __('delai par defaut (30 jours, 60 jours, etc.)') }}</li>
                        <li><strong>{{ __('Notes par defaut') }}</strong> : {{ __('texte qui apparait en bas de chaque facture') }}</li>
                        <li><strong>{{ __('Devise par defaut') }}</strong> : {{ __('EUR, USD, MAD, etc.') }}</li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('4.4 — Parametres de localisation') }}</h6>
                    <p>{{ __('Dans') }} <strong>{{ __('Parametres > Localisation') }}</strong> :</p>
                    <ul>
                        <li><strong>{{ __('Fuseau horaire') }}</strong> : {{ __('choisissez votre zone (ex. Europe/Paris)') }}</li>
                        <li><strong>{{ __('Format de date') }}</strong> : {{ __('JJ/MM/AAAA, MM/JJ/AAAA, etc.') }}</li>
                        <li><strong>{{ __('Separateur numerique') }}</strong> : {{ __('virgule ou point pour les decimales') }}</li>
                    </ul>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 5 : CLIENTS (CRM) --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-clients">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-profile-2user me-2"></i>{{ __('5. Gestion des clients (CRM)') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('La section') }} <strong>{{ __('CRM') }}</strong> {{ __('vous permet de gerer tous vos clients. Chaque client peut avoir des adresses, des contacts et un historique complet.') }}</p>

                    <h6 class="fw-bold mb-3">{{ __('5.1 — Voir la liste des clients') }}</h6>
                    <ol>
                        <li>{{ __('Dans le menu lateral, cliquez sur') }} <strong>{{ __('« Commerce »') }}</strong> {{ __('puis') }} <strong>{{ __('« Clients »') }}</strong>.</li>
                        <li>{{ __('La liste de tous vos clients s\'affiche sous forme de tableau.') }}</li>
                        <li>{{ __('Utilisez la') }} <strong>{{ __('barre de recherche') }}</strong> {{ __('en haut pour trouver un client par nom ou e-mail.') }}</li>
                        <li>{{ __('Utilisez les') }} <strong>{{ __('filtres') }}</strong> {{ __('pour affiner par type (Particulier / Entreprise) ou statut.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('5.2 — Ajouter un nouveau client') }}</h6>
                    <ol>
                        <li>{{ __('Cliquez sur le bouton') }} <strong>{{ __('« + Nouveau client »') }}</strong> {{ __('en haut a droite.') }}</li>
                        <li>{{ __('Remplissez le formulaire :') }}
                            <table class="table table-bordered mt-2 mb-2">
                                <thead>
                                    <tr><th>{{ __('Champ') }}</th><th>{{ __('Obligatoire') }}</th><th>{{ __('Description') }}</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>{{ __('Nom') }}</td><td>{{ __('Oui') }}</td><td>{{ __('Nom complet du client ou raison sociale') }}</td></tr>
                                    <tr><td>{{ __('Type') }}</td><td>{{ __('Oui') }}</td><td>{{ __('Particulier ou Entreprise') }}</td></tr>
                                    <tr><td>{{ __('E-mail') }}</td><td>{{ __('Non') }}</td><td>{{ __('Adresse e-mail du client') }}</td></tr>
                                    <tr><td>{{ __('Telephone') }}</td><td>{{ __('Non') }}</td><td>{{ __('Numero de telephone') }}</td></tr>
                                    <tr><td>{{ __('Devise') }}</td><td>{{ __('Non') }}</td><td>{{ __('Devise preferee pour ce client') }}</td></tr>
                                    <tr><td>{{ __('Delai de paiement') }}</td><td>{{ __('Non') }}</td><td>{{ __('Nombre de jours pour payer (ex. 30)') }}</td></tr>
                                </tbody>
                            </table>
                        </li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('5.3 — Modifier un client') }}</h6>
                    <ol>
                        <li>{{ __('Dans la liste, trouvez le client a modifier.') }}</li>
                        <li>{{ __('Cliquez sur le bouton') }} <strong>{{ __('« Actions »') }}</strong> {{ __('(trois points ou menu deroulant) a droite de la ligne.') }}</li>
                        <li>{{ __('Selectionnez') }} <strong>{{ __('« Modifier »') }}</strong>.</li>
                        <li>{{ __('Modifiez les champs souhaites.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('5.4 — Supprimer un client') }}</h6>
                    <ol>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Actions »') }}</strong> {{ __('puis') }} <strong>{{ __('« Supprimer »') }}</strong>.</li>
                        <li>{{ __('Confirmez la suppression dans la boite de dialogue.') }}</li>
                        <li>{{ __('Le client sera mis a la corbeille (vous pourrez le restaurer depuis') }} <strong>{{ __('Corbeille') }}</strong>).</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('5.5 — Fiche client (details)') }}</h6>
                    <ol>
                        <li>{{ __('Cliquez sur le') }} <strong>{{ __('nom du client') }}</strong> {{ __('dans la liste pour ouvrir sa fiche.') }}</li>
                        <li>{{ __('Vous y trouverez :') }}
                            <ul>
                                <li><strong>{{ __('Informations generales') }}</strong> : {{ __('nom, e-mail, telephone, type') }}</li>
                                <li><strong>{{ __('Adresses') }}</strong> : {{ __('ajoutez des adresses de facturation et livraison') }}</li>
                                <li><strong>{{ __('Contacts') }}</strong> : {{ __('ajoutez les personnes a contacter dans l\'entreprise') }}</li>
                                <li><strong>{{ __('Historique') }}</strong> : {{ __('toutes les factures et devis lies a ce client') }}</li>
                            </ul>
                        </li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('5.6 — Ajouter une adresse a un client') }}</h6>
                    <ol>
                        <li>{{ __('Ouvrez la fiche du client.') }}</li>
                        <li>{{ __('Dans la section') }} <strong>{{ __('« Adresses »') }}</strong>, {{ __('cliquez sur') }} <strong>{{ __('« + Ajouter une adresse »') }}</strong>.</li>
                        <li>{{ __('Remplissez : Type (Facturation/Livraison), Adresse, Ville, Region, Code postal, Pays.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('5.7 — Ajouter un contact a un client') }}</h6>
                    <ol>
                        <li>{{ __('Ouvrez la fiche du client.') }}</li>
                        <li>{{ __('Dans la section') }} <strong>{{ __('« Contacts »') }}</strong>, {{ __('cliquez sur') }} <strong>{{ __('« + Ajouter un contact »') }}</strong>.</li>
                        <li>{{ __('Remplissez : Nom, E-mail, Telephone, Poste, Contact principal (oui/non).') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 6 : PRODUITS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-produits">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-box me-2"></i>{{ __('6. Catalogue (Produits & Services)') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Le catalogue contient tous les produits et services que vous vendez. Il sert de base pour creer vos factures et devis.') }}</p>

                    <h6 class="fw-bold mb-3">{{ __('6.1 — Creer des categories') }}</h6>
                    <p>{{ __('Avant d\'ajouter des produits, creez des categories pour les organiser :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Produits & Stock »') }}</strong> > <strong>{{ __('« Categories »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouvelle categorie »') }}</strong>.</li>
                        <li>{{ __('Entrez le nom (ex. « Electronique », « Services », « Alimentaire »).') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('6.2 — Creer des unites de mesure') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Produits & Stock »') }}</strong> > <strong>{{ __('« Unites »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouvelle unite »') }}</strong>.</li>
                        <li>{{ __('Entrez le nom (ex. « Piece », « Kg », « Heure », « Litre »).') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('6.3 — Ajouter un produit') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Produits & Stock »') }}</strong> > <strong>{{ __('« Produits »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau produit »') }}</strong>.</li>
                        <li>{{ __('Remplissez le formulaire :') }}
                            <table class="table table-bordered mt-2 mb-2">
                                <thead>
                                    <tr><th>{{ __('Champ') }}</th><th>{{ __('Description') }}</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>{{ __('Nom') }}</td><td>{{ __('Nom du produit ou service') }}</td></tr>
                                    <tr><td>{{ __('Type') }}</td><td>{{ __('Produit physique ou Service') }}</td></tr>
                                    <tr><td>{{ __('SKU / Reference') }}</td><td>{{ __('Code unique pour identifier le produit') }}</td></tr>
                                    <tr><td>{{ __('Categorie') }}</td><td>{{ __('Choisissez parmi vos categories') }}</td></tr>
                                    <tr><td>{{ __('Unite') }}</td><td>{{ __('Unite de mesure (Piece, Kg, etc.)') }}</td></tr>
                                    <tr><td>{{ __('Prix de vente') }}</td><td>{{ __('Prix auquel vous vendez') }}</td></tr>
                                    <tr><td>{{ __('Prix d\'achat') }}</td><td>{{ __('Prix auquel vous achetez (optionnel)') }}</td></tr>
                                    <tr><td>{{ __('Taxe') }}</td><td>{{ __('Groupe de taxe applicable (TVA 20%, etc.)') }}</td></tr>
                                    <tr><td>{{ __('Description') }}</td><td>{{ __('Description detaillee du produit') }}</td></tr>
                                </tbody>
                            </table>
                        </li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('6.4 — Modifier ou supprimer un produit') }}</h6>
                    <ol>
                        <li>{{ __('Dans la liste des produits, cliquez sur') }} <strong>{{ __('« Actions »') }}</strong> {{ __('a droite du produit.') }}</li>
                        <li>{{ __('Choisissez') }} <strong>{{ __('« Modifier »') }}</strong> {{ __('pour editer ou') }} <strong>{{ __('« Supprimer »') }}</strong> {{ __('pour retirer le produit.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('6.5 — Configurer les taxes') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Produits & Stock »') }}</strong> > <strong>{{ __('« Taxes »') }}</strong>.</li>
                        <li>{{ __('Creez d\'abord une') }} <strong>{{ __('categorie de taxe') }}</strong> {{ __('(ex. « Biens », « Services »).') }}</li>
                        <li>{{ __('Ensuite creez un') }} <strong>{{ __('groupe de taxe') }}</strong> {{ __('(ex. « TVA 20% ») avec le taux correspondant.') }}</li>
                        <li>{{ __('Assignez le groupe de taxe a vos produits lors de leur creation.') }}</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 7 : FACTURES --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-factures">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-receipt me-2"></i>{{ __('7. Factures (Ventes)') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Les factures sont le coeur de votre activite. Voici comment les creer et les gerer.') }}</p>

                    <h6 class="fw-bold mb-3">{{ __('7.1 — Creer une facture') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Factures »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouvelle facture »') }}</strong>.</li>
                        <li>{{ __('Remplissez l\'en-tete :') }}
                            <ul>
                                <li><strong>{{ __('Client') }}</strong> : {{ __('selectionnez un client existant dans la liste deroulante') }}</li>
                                <li><strong>{{ __('Date de facture') }}</strong> : {{ __('date d\'emission (par defaut : aujourd\'hui)') }}</li>
                                <li><strong>{{ __('Date d\'echeance') }}</strong> : {{ __('date limite de paiement') }}</li>
                                <li><strong>{{ __('Numero') }}</strong> : {{ __('genere automatiquement (ex. FAC-0001)') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('Ajoutez les lignes de produits/services :') }}
                            <ul>
                                <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Ajouter une ligne »') }}</strong></li>
                                <li>{{ __('Selectionnez un') }} <strong>{{ __('produit') }}</strong> {{ __('dans la liste (le prix se remplit automatiquement)') }}</li>
                                <li>{{ __('Modifiez la') }} <strong>{{ __('quantite') }}</strong></li>
                                <li>{{ __('Ajustez le') }} <strong>{{ __('prix unitaire') }}</strong> {{ __('si necessaire') }}</li>
                                <li>{{ __('Ajoutez une') }} <strong>{{ __('remise') }}</strong> {{ __('(en % ou en montant) si besoin') }}</li>
                                <li>{{ __('La') }} <strong>{{ __('taxe') }}</strong> {{ __('est calculee automatiquement selon le produit') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('Ajoutez des') }} <strong>{{ __('frais supplementaires') }}</strong> {{ __('si besoin (livraison, etc.).') }}</li>
                        <li>{{ __('Verifiez le') }} <strong>{{ __('total') }}</strong> {{ __('en bas (sous-total + taxes + frais - remises).') }}</li>
                        <li>{{ __('Ajoutez des') }} <strong>{{ __('notes') }}</strong> {{ __('ou') }} <strong>{{ __('conditions') }}</strong> {{ __('en bas de facture.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('7.2 — Les statuts d\'une facture') }}</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>{{ __('Statut') }}</th><th>{{ __('Signification') }}</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><span class="badge bg-secondary">{{ __('Brouillon') }}</span></td><td>{{ __('Facture en cours de redaction, pas encore envoyee') }}</td></tr>
                            <tr><td><span class="badge bg-warning">{{ __('En attente') }}</span></td><td>{{ __('Facture envoyee au client, en attente de paiement') }}</td></tr>
                            <tr><td><span class="badge bg-info">{{ __('Partiellement payee') }}</span></td><td>{{ __('Le client a paye une partie du montant') }}</td></tr>
                            <tr><td><span class="badge bg-success">{{ __('Payee') }}</span></td><td>{{ __('Facture entierement reglee') }}</td></tr>
                            <tr><td><span class="badge bg-danger">{{ __('En retard') }}</span></td><td>{{ __('La date d\'echeance est depassee') }}</td></tr>
                            <tr><td><span class="badge bg-dark">{{ __('Annulee') }}</span></td><td>{{ __('Facture annulee (void)') }}</td></tr>
                        </tbody>
                    </table>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('7.3 — Envoyer une facture par e-mail') }}</h6>
                    <ol>
                        <li>{{ __('Ouvrez la facture.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Envoyer »') }}</strong>.</li>
                        <li>{{ __('Verifiez l\'adresse e-mail du destinataire.') }}</li>
                        <li>{{ __('Ajoutez un message personnalise si souhaite.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Envoyer »') }}</strong>. {{ __('La facture sera envoyee en PDF.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('7.4 — Telecharger une facture en PDF') }}</h6>
                    <ol>
                        <li>{{ __('Ouvrez la facture.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Telecharger PDF »') }}</strong>.</li>
                        <li>{{ __('Le fichier PDF sera telecharge sur votre ordinateur.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('7.5 — Modifier une facture') }}</h6>
                    <ol>
                        <li>{{ __('Dans la liste des factures, cliquez sur') }} <strong>{{ __('« Actions »') }}</strong> > <strong>{{ __('« Modifier »') }}</strong>.</li>
                        <li>{{ __('Modifiez les champs necessaires.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>
                    <div class="alert alert-warning">
                        <i class="isax isax-warning-2 me-2"></i>
                        <strong>{{ __('Attention :') }}</strong> {{ __('Ne modifiez pas une facture deja envoyee ou payee. Creez plutot un avoir (section 10).') }}
                    </div>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('7.6 — Annuler une facture') }}</h6>
                    <ol>
                        <li>{{ __('Ouvrez la facture concernee.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Annuler »') }}</strong> (void).</li>
                        <li>{{ __('La facture sera marquee comme annulee. Elle reste visible pour l\'historique mais n\'est plus comptabilisee.') }}</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 8 : DEVIS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-devis">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-document-text me-2"></i>{{ __('8. Devis (Propositions commerciales)') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Les devis permettent de proposer un prix a vos clients avant de facturer.') }}</p>

                    <h6 class="fw-bold mb-3">{{ __('8.1 — Creer un devis') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Devis »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau devis »') }}</strong>.</li>
                        <li>{{ __('Le formulaire est identique a celui des factures :') }}
                            <ul>
                                <li>{{ __('Selectionnez le') }} <strong>{{ __('client') }}</strong></li>
                                <li>{{ __('Ajoutez les') }} <strong>{{ __('produits/services') }}</strong></li>
                                <li>{{ __('Definissez les') }} <strong>{{ __('dates') }}</strong> {{ __('(emission et validite)') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('8.2 — Envoyer un devis au client') }}</h6>
                    <ol>
                        <li>{{ __('Ouvrez le devis et cliquez sur') }} <strong>{{ __('« Envoyer »') }}</strong>.</li>
                        <li>{{ __('Le devis sera envoye en PDF par e-mail.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('8.3 — Convertir un devis en facture') }}</h6>
                    <p>{{ __('C\'est l\'une des fonctionnalites les plus utiles !') }}</p>
                    <ol>
                        <li>{{ __('Ouvrez le devis accepte par le client.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Convertir en facture »') }}</strong>.</li>
                        <li>{{ __('Une facture est automatiquement creee avec toutes les informations du devis.') }}</li>
                        <li>{{ __('Verifiez la facture et enregistrez-la.') }}</li>
                    </ol>
                    <div class="alert alert-info">
                        <i class="isax isax-lamp-charge me-2"></i>
                        <strong>{{ __('Conseil :') }}</strong> {{ __('Cette fonctionnalite evite de ressaisir toutes les informations. Le devis est marque comme « Converti ».') }}
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 9 : PAIEMENTS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-paiements">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-wallet-money me-2"></i>{{ __('9. Paiements clients') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Enregistrez les paiements recus de vos clients pour suivre le reglement de vos factures.') }}</p>

                    <h6 class="fw-bold mb-3">{{ __('9.1 — Enregistrer un paiement') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Paiements »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau paiement »') }}</strong>.</li>
                        <li>{{ __('Remplissez :') }}
                            <ul>
                                <li><strong>{{ __('Client') }}</strong> : {{ __('selectionnez le client') }}</li>
                                <li><strong>{{ __('Montant') }}</strong> : {{ __('somme recue') }}</li>
                                <li><strong>{{ __('Date') }}</strong> : {{ __('date de reception du paiement') }}</li>
                                <li><strong>{{ __('Mode de paiement') }}</strong> : {{ __('virement, cheque, especes, carte, etc.') }}</li>
                                <li><strong>{{ __('Compte bancaire') }}</strong> : {{ __('sur quel compte le paiement est recu') }}</li>
                                <li><strong>{{ __('Facture(s)') }}</strong> : {{ __('selectionnez la ou les factures concernees') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>
                    <div class="alert alert-success">
                        <i class="isax isax-tick-circle me-2"></i>
                        <strong>{{ __('Automatique :') }}</strong> {{ __('Le statut de la facture se met a jour automatiquement (« Partiellement payee » ou « Payee ») selon le montant enregistre.') }}
                    </div>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('9.2 — Telecharger un recu de paiement') }}</h6>
                    <ol>
                        <li>{{ __('Ouvrez le paiement.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Telecharger PDF »') }}</strong> {{ __('pour obtenir le recu.') }}</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 10 : AVOIRS & REMBOURSEMENTS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-avoirs">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-receipt-minus me-2"></i>{{ __('10. Avoirs & Remboursements') }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">{{ __('10.1 — Qu\'est-ce qu\'un avoir ?') }}</h6>
                    <p>{{ __('Un') }} <strong>{{ __('avoir') }}</strong> {{ __('(credit note) est un document qui annule partiellement ou totalement une facture. Utilisez un avoir quand :') }}</p>
                    <ul>
                        <li>{{ __('Un client retourne des marchandises') }}</li>
                        <li>{{ __('Vous avez facture un montant trop eleve') }}</li>
                        <li>{{ __('Vous accordez une remise apres facturation') }}</li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('10.2 — Creer un avoir') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Avoirs »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouvel avoir »') }}</strong>.</li>
                        <li>{{ __('Selectionnez le') }} <strong>{{ __('client') }}</strong> {{ __('et remplissez les lignes de l\'avoir.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('10.3 — Appliquer un avoir a une facture') }}</h6>
                    <ol>
                        <li>{{ __('Ouvrez l\'avoir.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Appliquer »') }}</strong>.</li>
                        <li>{{ __('Selectionnez la ou les factures sur lesquelles deduire le montant.') }}</li>
                        <li>{{ __('Le solde de la facture est automatiquement reduit.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('10.4 — Remboursements') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Remboursements »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau remboursement »') }}</strong>.</li>
                        <li>{{ __('Selectionnez le client, le montant et le mode de paiement.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 11 : ACHATS & FOURNISSEURS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-achats">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-bag me-2"></i>{{ __('11. Achats & Fournisseurs') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('La section Achats vous permet de gerer vos fournisseurs, bons de commande, factures fournisseurs et paiements.') }}</p>

                    <h6 class="fw-bold mb-3">{{ __('11.1 — Gerer les fournisseurs') }}</h6>
                    <p>{{ __('Meme principe que les clients :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Fournisseurs »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau fournisseur »') }}</strong>.</li>
                        <li>{{ __('Remplissez : nom, e-mail, telephone, adresse, etc.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('11.2 — Creer un bon de commande') }}</h6>
                    <p>{{ __('Un bon de commande (Purchase Order) est envoye au fournisseur pour commander des produits.') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Bons de commande »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau bon de commande »') }}</strong>.</li>
                        <li>{{ __('Selectionnez le') }} <strong>{{ __('fournisseur') }}</strong>.</li>
                        <li>{{ __('Ajoutez les') }} <strong>{{ __('produits a commander') }}</strong> {{ __('avec les quantites.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                        <li>{{ __('Envoyez le bon de commande en PDF au fournisseur.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('11.3 — Factures fournisseurs (Vendor Bills)') }}</h6>
                    <p>{{ __('Quand vous recevez une facture de votre fournisseur :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Factures fournisseurs »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouvelle facture fournisseur »') }}</strong>.</li>
                        <li>{{ __('Selectionnez le fournisseur, ajoutez les lignes (produits, montants).') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('11.4 — Reception de marchandises') }}</h6>
                    <p>{{ __('Quand vous recevez physiquement les produits commandes :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Receptions »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouvelle reception »') }}</strong>.</li>
                        <li>{{ __('Selectionnez le bon de commande et l\'entrepot de destination.') }}</li>
                        <li>{{ __('Verifiez les quantites recues.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>. {{ __('Le stock est mis a jour automatiquement.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('11.5 — Notes de debit (retours fournisseur)') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Notes de debit »') }}</strong>.</li>
                        <li>{{ __('Creez une note de debit pour signaler un retour ou une erreur fournisseur.') }}</li>
                        <li>{{ __('Appliquez-la a une facture fournisseur pour reduire le montant du.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('11.6 — Paiements fournisseurs') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Commerce »') }}</strong> > <strong>{{ __('« Paiements fournisseurs »') }}</strong>.</li>
                        <li>{{ __('Enregistrez vos paiements aux fournisseurs.') }}</li>
                        <li>{{ __('Selectionnez la facture fournisseur a regler.') }}</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 12 : INVENTAIRE & STOCK --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-stock">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-box-1 me-2"></i>{{ __('12. Inventaire & Stock') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Gerez vos entrepots, niveaux de stock, mouvements et transferts entre entrepots.') }}</p>

                    <h6 class="fw-bold mb-3">{{ __('12.1 — Creer un entrepot') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Produits & Stock »') }}</strong> > <strong>{{ __('« Entrepots »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouvel entrepot »') }}</strong>.</li>
                        <li>{{ __('Remplissez : nom, adresse, description.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('12.2 — Voir les niveaux de stock') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Produits & Stock »') }}</strong> > <strong>{{ __('« Niveaux de stock »') }}</strong>.</li>
                        <li>{{ __('Vous voyez un tableau avec chaque produit et la quantite disponible par entrepot.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('12.3 — Mouvements de stock (ajustements)') }}</h6>
                    <p>{{ __('Pour ajouter ou retirer du stock manuellement :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Produits & Stock »') }}</strong> > <strong>{{ __('« Mouvements »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau mouvement »') }}</strong>.</li>
                        <li>{{ __('Selectionnez le produit, l\'entrepot, le type (Entree/Sortie) et la quantite.') }}</li>
                        <li>{{ __('Ajoutez une raison (ex. « Inventaire initial », « Casse », « Ajustement »).') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('12.4 — Transferts entre entrepots') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Produits & Stock »') }}</strong> > <strong>{{ __('« Transferts »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau transfert »') }}</strong>.</li>
                        <li>{{ __('Selectionnez l\'entrepot d\'') }}<strong>{{ __('origine') }}</strong> {{ __('et l\'entrepot de') }} <strong>{{ __('destination') }}</strong>.</li>
                        <li>{{ __('Ajoutez les produits a transferer avec les quantites.') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong> {{ __('(statut : Brouillon).') }}</li>
                        <li>{{ __('Quand les produits sont recus, cliquez sur') }} <strong>{{ __('« Executer »') }}</strong> {{ __('pour finaliser le transfert.') }}</li>
                    </ol>

                    <div class="alert alert-info">
                        <i class="isax isax-lamp-charge me-2"></i>
                        <strong>{{ __('Statuts d\'un transfert :') }}</strong> {{ __('Brouillon') }} &rarr; {{ __('En transit') }} &rarr; {{ __('Recu') }} &rarr; ({{ __('ou Annule') }})
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 13 : FINANCE --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-finance">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-wallet-3 me-2"></i>{{ __('13. Finance') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Gerez vos comptes bancaires, depenses, revenus et transferts d\'argent.') }}</p>

                    <h6 class="fw-bold mb-3">{{ __('13.1 — Comptes bancaires') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Finance »') }}</strong> > <strong>{{ __('« Comptes bancaires »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau compte »') }}</strong>.</li>
                        <li>{{ __('Remplissez :') }}
                            <ul>
                                <li><strong>{{ __('Nom') }}</strong> : {{ __('ex. « Compte principal BNP »') }}</li>
                                <li><strong>{{ __('Type') }}</strong> : {{ __('Courant, Epargne, Business, Autre') }}</li>
                                <li><strong>{{ __('Numero de compte') }}</strong> {{ __('(optionnel)') }}</li>
                                <li><strong>{{ __('Solde initial') }}</strong> : {{ __('le montant actuel sur le compte') }}</li>
                                <li><strong>{{ __('Devise') }}</strong> : {{ __('EUR, USD, etc.') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('13.2 — Enregistrer une depense') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Finance »') }}</strong> > <strong>{{ __('« Depenses »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouvelle depense »') }}</strong>.</li>
                        <li>{{ __('Remplissez :') }}
                            <ul>
                                <li><strong>{{ __('Categorie') }}</strong> : {{ __('Loyer, Fournitures, Transport, etc.') }}</li>
                                <li><strong>{{ __('Montant') }}</strong> : {{ __('le montant depense') }}</li>
                                <li><strong>{{ __('Date') }}</strong> : {{ __('date de la depense') }}</li>
                                <li><strong>{{ __('Compte bancaire') }}</strong> : {{ __('depuis quel compte l\'argent est sorti') }}</li>
                                <li><strong>{{ __('Description') }}</strong> : {{ __('details de la depense') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('13.3 — Enregistrer un revenu') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Finance »') }}</strong> > <strong>{{ __('« Revenus »') }}</strong>.</li>
                        <li>{{ __('Meme principe que les depenses, mais pour l\'argent recu hors factures (subventions, dons, etc.).') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('13.4 — Categories financieres') }}</h6>
                    <p>{{ __('Organisez vos depenses et revenus par categories :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Finance »') }}</strong> > <strong>{{ __('« Categories »') }}</strong>.</li>
                        <li>{{ __('Creez des categories (ex. « Loyer », « Salaires », « Marketing », « Ventes diverses »).') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('13.5 — Transferts d\'argent') }}</h6>
                    <p>{{ __('Pour transferer de l\'argent entre vos comptes bancaires :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Finance »') }}</strong> > <strong>{{ __('« Transferts »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau transfert »') }}</strong>.</li>
                        <li>{{ __('Selectionnez le') }} <strong>{{ __('compte source') }}</strong> {{ __('et le') }} <strong>{{ __('compte destination') }}</strong>.</li>
                        <li>{{ __('Entrez le') }} <strong>{{ __('montant') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('13.6 — Prets') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Finance »') }}</strong> > <strong>{{ __('« Prets »') }}</strong>.</li>
                        <li>{{ __('Enregistrez vos emprunts ou prets accordes.') }}</li>
                        <li>{{ __('Suivez les echeances et les remboursements.') }}</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 14 : RAPPORTS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-rapports">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-chart-2 me-2"></i>{{ __('14. Rapports & Analyses') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Les rapports vous donnent une vue detaillee de votre activite. Ils sont accessibles via') }} <strong>{{ __('Menu lateral > « Analyses »') }}</strong>.</p>

                    <h6 class="fw-bold mb-3">{{ __('14.1 — Rapport des ventes') }}</h6>
                    <ul>
                        <li>{{ __('Chiffre d\'affaires total par periode') }}</li>
                        <li>{{ __('Nombre de factures emises') }}</li>
                        <li>{{ __('Meilleurs clients par chiffre d\'affaires') }}</li>
                        <li>{{ __('Produits les plus vendus') }}</li>
                        <li>{{ __('Possibilite d\'') }}<strong>{{ __('exporter en PDF') }}</strong></li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('14.2 — Rapport des clients') }}</h6>
                    <ul>
                        <li>{{ __('Nombre de clients actifs') }}</li>
                        <li>{{ __('Creances en cours (montants non payes)') }}</li>
                        <li>{{ __('Historique d\'activite par client') }}</li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('14.3 — Rapport des achats') }}</h6>
                    <ul>
                        <li>{{ __('Total des achats par periode') }}</li>
                        <li>{{ __('Principaux fournisseurs') }}</li>
                        <li>{{ __('Dettes fournisseurs en cours') }}</li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('14.4 — Rapport financier') }}</h6>
                    <ul>
                        <li>{{ __('Recapitulatif depenses vs revenus') }}</li>
                        <li>{{ __('Soldes des comptes bancaires') }}</li>
                        <li>{{ __('Repartition par categorie') }}</li>
                        <li>{{ __('Possibilite d\'') }}<strong>{{ __('exporter en PDF') }}</strong></li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('14.5 — Rapport d\'inventaire') }}</h6>
                    <ul>
                        <li>{{ __('Valeur totale du stock') }}</li>
                        <li>{{ __('Produits en rupture de stock') }}</li>
                        <li>{{ __('Mouvements de stock sur la periode') }}</li>
                        <li>{{ __('Possibilite d\'') }}<strong>{{ __('exporter en PDF') }}</strong></li>
                    </ul>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 15 : FONCTIONNALITES PRO --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-pro">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-crown me-2"></i>{{ __('15. Fonctionnalites Pro') }}</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-4">
                        <i class="isax isax-info-circle me-2"></i>
                        {{ __('Ces fonctionnalites sont disponibles avec un abonnement') }} <strong>{{ __('Pro') }}</strong> {{ __('ou superieur.') }}
                    </div>

                    <h6 class="fw-bold mb-3">{{ __('15.1 — Factures recurrentes') }}</h6>
                    <p>{{ __('Automatisez la creation de factures qui se repetent (abonnements, loyers, etc.) :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Pro »') }}</strong> > <strong>{{ __('« Factures recurrentes »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau modele »') }}</strong>.</li>
                        <li>{{ __('Configurez :') }}
                            <ul>
                                <li><strong>{{ __('Client') }}</strong> : {{ __('a qui envoyer la facture') }}</li>
                                <li><strong>{{ __('Frequence') }}</strong> : {{ __('mensuelle, trimestrielle, annuelle') }}</li>
                                <li><strong>{{ __('Date de debut') }}</strong> {{ __('et') }} <strong>{{ __('date de fin') }}</strong> {{ __('(optionnelle)') }}</li>
                                <li><strong>{{ __('Produits/services') }}</strong> : {{ __('les lignes de la facture') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('L\'application creera automatiquement les factures aux dates prevues.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('15.2 — Rappels de paiement') }}</h6>
                    <p>{{ __('Envoyez automatiquement des rappels aux clients qui n\'ont pas paye :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Pro »') }}</strong> > <strong>{{ __('« Rappels »') }}</strong>.</li>
                        <li>{{ __('Definissez des regles de rappel :') }}
                            <ul>
                                <li><strong>{{ __('Delai') }}</strong> : {{ __('combien de jours apres l\'echeance (ex. 7 jours, 14 jours)') }}</li>
                                <li><strong>{{ __('Message') }}</strong> : {{ __('le contenu du rappel') }}</li>
                                <li><strong>{{ __('Frequence') }}</strong> : {{ __('combien de fois relancer') }}</li>
                            </ul>
                        </li>
                        <li>{{ __('Les rappels sont envoyes automatiquement par e-mail.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('15.3 — Succursales (multi-sites)') }}</h6>
                    <p>{{ __('Si vous avez plusieurs points de vente ou bureaux :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Pro »') }}</strong> > <strong>{{ __('« Succursales »') }}</strong>.</li>
                        <li>{{ __('Ajoutez chaque succursale avec son adresse et ses informations.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('15.4 — Rapports personnalises') }}</h6>
                    <p>{{ __('Creez des rapports sur mesure avec un editeur visuel :') }}</p>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Pro »') }}</strong> > <strong>{{ __('« Rapports »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« + Nouveau rapport »') }}</strong>.</li>
                        <li>{{ __('Utilisez l\'editeur pour rediger votre rapport.') }}</li>
                        <li>{{ __('Exportez en') }} <strong>{{ __('PDF') }}</strong> {{ __('ou') }} <strong>{{ __('Word') }}</strong>.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 16 : UTILISATEURS & PERMISSIONS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-utilisateurs">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-people me-2"></i>{{ __('16. Utilisateurs & Permissions') }}</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">{{ __('16.1 — Inviter un utilisateur') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Administration »') }}</strong> > <strong>{{ __('« Utilisateurs »') }}</strong>.</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Inviter un utilisateur »') }}</strong>.</li>
                        <li>{{ __('Entrez l\'') }}<strong>{{ __('adresse e-mail') }}</strong> {{ __('de la personne a inviter.') }}</li>
                        <li>{{ __('Selectionnez le') }} <strong>{{ __('role') }}</strong> {{ __('a attribuer (Admin, Comptable, Vendeur, etc.).') }}</li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Envoyer l\'invitation »') }}</strong>.</li>
                        <li>{{ __('La personne recevra un e-mail avec un lien pour creer son compte.') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('16.2 — Gerer les roles') }}</h6>
                    <ol>
                        <li>{{ __('Menu lateral >') }} <strong>{{ __('« Administration »') }}</strong> > <strong>{{ __('« Roles & Permissions »') }}</strong>.</li>
                        <li>{{ __('Vous verrez les roles existants : Admin, Comptable, Vendeur, etc.') }}</li>
                        <li>{{ __('Pour creer un nouveau role, cliquez sur') }} <strong>{{ __('« + Nouveau role »') }}</strong>.</li>
                        <li>{{ __('Donnez-lui un nom (ex. « Gestionnaire stock »).') }}</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('16.3 — Configurer les permissions d\'un role') }}</h6>
                    <p>{{ __('Chaque role a des permissions specifiques qui definissent ce que l\'utilisateur peut faire :') }}</p>
                    <ol>
                        <li>{{ __('Cliquez sur le role a configurer.') }}</li>
                        <li>{{ __('Cochez les permissions souhaitees :') }}
                            <table class="table table-bordered mt-2 mb-2">
                                <thead>
                                    <tr><th>{{ __('Module') }}</th><th>{{ __('Permissions disponibles') }}</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>{{ __('Clients') }}</td><td>{{ __('Voir, Creer, Modifier, Supprimer') }}</td></tr>
                                    <tr><td>{{ __('Factures') }}</td><td>{{ __('Voir, Creer, Modifier, Supprimer, Envoyer') }}</td></tr>
                                    <tr><td>{{ __('Devis') }}</td><td>{{ __('Voir, Creer, Modifier, Supprimer, Convertir') }}</td></tr>
                                    <tr><td>{{ __('Produits') }}</td><td>{{ __('Voir, Creer, Modifier, Supprimer') }}</td></tr>
                                    <tr><td>{{ __('Stock') }}</td><td>{{ __('Voir, Creer, Modifier, Transferts') }}</td></tr>
                                    <tr><td>{{ __('Finance') }}</td><td>{{ __('Voir, Creer, Modifier, Supprimer') }}</td></tr>
                                    <tr><td>{{ __('Rapports') }}</td><td>{{ __('Voir, Exporter') }}</td></tr>
                                    <tr><td>{{ __('Utilisateurs') }}</td><td>{{ __('Voir, Inviter, Modifier, Desactiver') }}</td></tr>
                                    <tr><td>{{ __('Parametres') }}</td><td>{{ __('Voir, Modifier') }}</td></tr>
                                </tbody>
                            </table>
                        </li>
                        <li>{{ __('Cliquez sur') }} <strong>{{ __('« Enregistrer les permissions »') }}</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">{{ __('16.4 — Activer / Desactiver un utilisateur') }}</h6>
                    <ol>
                        <li>{{ __('Dans la liste des utilisateurs, cliquez sur') }} <strong>{{ __('« Actions »') }}</strong>.</li>
                        <li>{{ __('Selectionnez') }} <strong>{{ __('« Desactiver »') }}</strong> {{ __('pour bloquer l\'acces ou') }} <strong>{{ __('« Activer »') }}</strong> {{ __('pour le retablir.') }}</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 17 : TOUS LES PARAMETRES --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-parametres">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-setting-25 me-2"></i>{{ __('17. Tous les parametres') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ __('Voici la liste complete des parametres disponibles dans votre espace :') }}</p>

                    <table class="table table-bordered">
                        <thead>
                            <tr><th>{{ __('Parametre') }}</th><th>{{ __('Description') }}</th><th>{{ __('Acces') }}</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>{{ __('Mon compte') }}</strong></td>
                                <td>{{ __('Modifier votre nom, e-mail, photo, mot de passe') }}</td>
                                <td>{{ __('Parametres > Mon compte') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Entreprise') }}</strong></td>
                                <td>{{ __('Nom, adresse, logo, TVA de l\'entreprise') }}</td>
                                <td>{{ __('Parametres > Entreprise') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Factures') }}</strong></td>
                                <td>{{ __('Prefixes, conditions de paiement, notes par defaut') }}</td>
                                <td>{{ __('Parametres > Factures') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Localisation') }}</strong></td>
                                <td>{{ __('Fuseau horaire, format date, format nombre') }}</td>
                                <td>{{ __('Parametres > Localisation') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Devises') }}</strong></td>
                                <td>{{ __('Ajouter des devises, definir taux de change') }}</td>
                                <td>{{ __('Parametres > Devises') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Modeles de facture') }}</strong></td>
                                <td>{{ __('Choisir le design de vos factures PDF') }}</td>
                                <td>{{ __('Parametres > Modeles') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Signatures') }}</strong></td>
                                <td>{{ __('Ajouter des signatures electroniques') }}</td>
                                <td>{{ __('Parametres > Signatures') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Modes de paiement') }}</strong></td>
                                <td>{{ __('Configurer les moyens de paiement acceptes') }}</td>
                                <td>{{ __('Parametres > Modes de paiement') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Modeles d\'e-mail') }}</strong></td>
                                <td>{{ __('Personnaliser les e-mails envoyes aux clients') }}</td>
                                <td>{{ __('Parametres > Modeles d\'e-mail') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Notifications') }}</strong></td>
                                <td>{{ __('Configurer les alertes et notifications') }}</td>
                                <td>{{ __('Parametres > Notifications') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Apparence') }}</strong></td>
                                <td>{{ __('Theme clair/sombre, couleurs') }}</td>
                                <td>{{ __('Parametres > Apparence') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Code-barres') }}</strong></td>
                                <td>{{ __('Configurer la generation de codes-barres') }}</td>
                                <td>{{ __('Parametres > Code-barres') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Securite') }}</strong></td>
                                <td>{{ __('Sessions actives, revoquer un acces') }}</td>
                                <td>{{ __('Parametres > Securite') }}</td>
                            </tr>
                            <tr>
                                <td><strong>{{ __('Abonnement') }}</strong></td>
                                <td>{{ __('Voir votre plan actuel et l\'utilisation') }}</td>
                                <td>{{ __('Parametres > Abonnement') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- RESUME RAPIDE --}}
            {{-- ================================================================== --}}
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-tick-circle me-2"></i>{{ __('Resume : Les etapes pour bien demarrer') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ol class="fs-6">
                                <li class="mb-2"><strong>{{ __('Configurez votre entreprise') }}</strong> {{ __('(nom, adresse, logo, TVA)') }}</li>
                                <li class="mb-2"><strong>{{ __('Parametrez la facturation') }}</strong> {{ __('(prefixes, devise, conditions)') }}</li>
                                <li class="mb-2"><strong>{{ __('Creez vos categories') }}</strong> {{ __('et') }} <strong>{{ __('unites de mesure') }}</strong></li>
                                <li class="mb-2"><strong>{{ __('Ajoutez vos produits/services') }}</strong> {{ __('au catalogue') }}</li>
                                <li class="mb-2"><strong>{{ __('Ajoutez vos clients') }}</strong></li>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <ol class="fs-6" start="6">
                                <li class="mb-2"><strong>{{ __('Creez votre premiere facture') }}</strong> {{ __('ou devis') }}</li>
                                <li class="mb-2"><strong>{{ __('Envoyez-la') }}</strong> {{ __('a votre client par e-mail') }}</li>
                                <li class="mb-2"><strong>{{ __('Enregistrez le paiement') }}</strong> {{ __('quand vous le recevez') }}</li>
                                <li class="mb-2"><strong>{{ __('Consultez vos rapports') }}</strong> {{ __('pour suivre votre activite') }}</li>
                                <li class="mb-2"><strong>{{ __('Invitez votre equipe') }}</strong> {{ __('si necessaire') }}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="alert alert-primary mt-3 mb-0">
                        <i class="isax isax-lamp-charge me-2"></i>
                        <strong>{{ __('Besoin d\'aide ?') }}</strong> {{ __('Contactez notre support a tout moment. Nous sommes la pour vous accompagner !') }}
                    </div>
                </div>
            </div>

            {{-- Back to top --}}
            <div class="text-center mb-4">
                <a href="#section-introduction" class="btn btn-outline-primary">
                    <i class="isax isax-arrow-up-2 me-1"></i> {{ __('Retour en haut') }}
                </a>
            </div>
        </div>
    </div>
@endsection
