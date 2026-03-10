<?php $page = 'documentation'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            {{-- Page Header --}}
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <h4 class="fw-bold mb-1">Documentation & Guide d'utilisation</h4>
                    <p class="text-muted mb-0">Apprenez a utiliser toutes les fonctionnalites de votre espace de facturation, etape par etape.</p>
                </div>
            </div>

            {{-- Table of Contents --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="isax isax-menu-board me-2"></i>Table des matieres</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#section-introduction" class="text-primary">1. Introduction</a></li>
                                <li class="mb-2"><a href="#section-connexion" class="text-primary">2. Connexion & Inscription</a></li>
                                <li class="mb-2"><a href="#section-dashboard" class="text-primary">3. Tableau de bord</a></li>
                                <li class="mb-2"><a href="#section-entreprise" class="text-primary">4. Parametres de l'entreprise</a></li>
                                <li class="mb-2"><a href="#section-clients" class="text-primary">5. Gestion des clients (CRM)</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#section-produits" class="text-primary">6. Catalogue (Produits)</a></li>
                                <li class="mb-2"><a href="#section-factures" class="text-primary">7. Factures (Ventes)</a></li>
                                <li class="mb-2"><a href="#section-devis" class="text-primary">8. Devis</a></li>
                                <li class="mb-2"><a href="#section-paiements" class="text-primary">9. Paiements clients</a></li>
                                <li class="mb-2"><a href="#section-avoirs" class="text-primary">10. Avoirs & Remboursements</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#section-achats" class="text-primary">11. Achats & Fournisseurs</a></li>
                                <li class="mb-2"><a href="#section-stock" class="text-primary">12. Inventaire & Stock</a></li>
                                <li class="mb-2"><a href="#section-finance" class="text-primary">13. Finance</a></li>
                                <li class="mb-2"><a href="#section-rapports" class="text-primary">14. Rapports & Analyses</a></li>
                                <li class="mb-2"><a href="#section-pro" class="text-primary">15. Fonctionnalites Pro</a></li>
                                <li class="mb-2"><a href="#section-utilisateurs" class="text-primary">16. Utilisateurs & Permissions</a></li>
                                <li class="mb-2"><a href="#section-parametres" class="text-primary">17. Tous les parametres</a></li>
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
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-info-circle me-2"></i>1. Introduction</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Qu'est-ce que cette application ?</h6>
                    <p>
                        Bienvenue dans votre <strong>logiciel de facturation et de gestion commerciale en ligne</strong>.
                        Cette application vous permet de gerer l'ensemble de votre activite commerciale depuis un seul endroit :
                    </p>
                    <ul>
                        <li><strong>Creer et envoyer des factures</strong> a vos clients</li>
                        <li><strong>Gerer vos devis</strong> et les convertir en factures</li>
                        <li><strong>Suivre vos paiements</strong> (encaissements et decaissements)</li>
                        <li><strong>Gerer votre catalogue</strong> de produits et services</li>
                        <li><strong>Suivre votre stock</strong> et vos entrepots</li>
                        <li><strong>Gerer vos achats</strong> et fournisseurs</li>
                        <li><strong>Suivre vos finances</strong> : comptes bancaires, depenses, revenus</li>
                        <li><strong>Generer des rapports</strong> detailles sur votre activite</li>
                        <li><strong>Gerer les utilisateurs</strong> et definir leurs droits d'acces</li>
                    </ul>

                    <div class="alert alert-info">
                        <i class="isax isax-lamp-charge me-2"></i>
                        <strong>Conseil :</strong> Avant de commencer a facturer, configurez d'abord votre entreprise
                        (section 4), ajoutez vos produits (section 6), puis vos clients (section 5).
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 2 : CONNEXION --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-connexion">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-login-1 me-2"></i>2. Connexion & Inscription</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">2.1 — S'inscrire (premiere utilisation)</h6>
                    <ol>
                        <li>Rendez-vous sur la page d'accueil de l'application.</li>
                        <li>Cliquez sur le bouton <strong>« S'inscrire »</strong> ou <strong>« Commencer »</strong>.</li>
                        <li>Remplissez le formulaire :
                            <ul>
                                <li><strong>Nom complet</strong> : votre prenom et nom</li>
                                <li><strong>Adresse e-mail</strong> : sera votre identifiant de connexion</li>
                                <li><strong>Mot de passe</strong> : minimum 8 caracteres, melangez lettres, chiffres et symboles</li>
                                <li><strong>Nom de l'entreprise</strong> : le nom commercial de votre societe</li>
                            </ul>
                        </li>
                        <li>Cliquez sur <strong>« Creer mon compte »</strong>.</li>
                        <li>Verifiez votre boite e-mail et cliquez sur le lien de confirmation.</li>
                        <li>Vous etes pret ! Vous arrivez sur votre <strong>tableau de bord</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">2.2 — Se connecter</h6>
                    <ol>
                        <li>Allez sur la page de connexion.</li>
                        <li>Entrez votre <strong>adresse e-mail</strong> et votre <strong>mot de passe</strong>.</li>
                        <li>Cliquez sur <strong>« Se connecter »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">2.3 — Mot de passe oublie</h6>
                    <ol>
                        <li>Sur la page de connexion, cliquez sur <strong>« Mot de passe oublie ? »</strong>.</li>
                        <li>Entrez votre adresse e-mail.</li>
                        <li>Un lien de reinitialisation sera envoye a votre e-mail.</li>
                        <li>Cliquez sur le lien et definissez un nouveau mot de passe.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 3 : TABLEAU DE BORD --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-dashboard">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-element-3 me-2"></i>3. Tableau de bord</h5>
                </div>
                <div class="card-body">
                    <p>Le tableau de bord est la premiere page que vous voyez apres la connexion. Il vous donne une <strong>vue d'ensemble rapide</strong> de votre activite :</p>
                    <ul>
                        <li><strong>Chiffre d'affaires</strong> : total des ventes sur la periode</li>
                        <li><strong>Factures en attente</strong> : nombre et montant des factures non payees</li>
                        <li><strong>Depenses</strong> : total des depenses du mois</li>
                        <li><strong>Graphiques</strong> : evolution des ventes et depenses</li>
                        <li><strong>Dernieres factures</strong> : liste des factures recentes</li>
                        <li><strong>Activite recente</strong> : dernieres actions effectuees</li>
                    </ul>

                    <div class="alert alert-success">
                        <i class="isax isax-tick-circle me-2"></i>
                        <strong>Astuce :</strong> Le tableau de bord se met a jour automatiquement. Plus vous utilisez l'application, plus les statistiques seront precises.
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 4 : PARAMETRES ENTREPRISE --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-entreprise">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-building-4 me-2"></i>4. Parametres de l'entreprise</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning mb-4">
                        <i class="isax isax-warning-2 me-2"></i>
                        <strong>Important :</strong> Configurez votre entreprise en premier ! Ces informations apparaitront sur toutes vos factures et devis.
                    </div>

                    <h6 class="fw-bold mb-3">4.1 — Acceder aux parametres de l'entreprise</h6>
                    <ol>
                        <li>Dans le menu lateral gauche (sidebar), cliquez sur <strong>« Parametres »</strong> (icone d'engrenage en bas).</li>
                        <li>Selectionnez <strong>« Entreprise »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">4.2 — Informations a remplir</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Champ</th>
                                <th>Description</th>
                                <th>Exemple</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nom de l'entreprise</td>
                                <td>Votre raison sociale officielle</td>
                                <td>SARL MaBoite</td>
                            </tr>
                            <tr>
                                <td>Adresse</td>
                                <td>Siege social complet</td>
                                <td>12 Rue de la Paix, 75002 Paris</td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td>Numero de contact principal</td>
                                <td>+33 1 23 45 67 89</td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td>Adresse e-mail professionnelle</td>
                                <td>contact@maboite.fr</td>
                            </tr>
                            <tr>
                                <td>Site web</td>
                                <td>URL de votre site (optionnel)</td>
                                <td>www.maboite.fr</td>
                            </tr>
                            <tr>
                                <td>Numero de TVA</td>
                                <td>Votre numero d'identification fiscale</td>
                                <td>FR12345678901</td>
                            </tr>
                            <tr>
                                <td>Logo</td>
                                <td>Logo de votre entreprise (PNG, JPG)</td>
                                <td>Fichier image</td>
                            </tr>
                        </tbody>
                    </table>

                    <h6 class="fw-bold mb-3 mt-4">4.3 — Parametres de facturation</h6>
                    <p>Dans <strong>Parametres &gt; Factures</strong>, configurez :</p>
                    <ul>
                        <li><strong>Prefixe des factures</strong> : ex. « FAC- » pour obtenir FAC-0001, FAC-0002...</li>
                        <li><strong>Prefixe des devis</strong> : ex. « DEV- » pour DEV-0001, DEV-0002...</li>
                        <li><strong>Conditions de paiement</strong> : delai par defaut (30 jours, 60 jours, etc.)</li>
                        <li><strong>Notes par defaut</strong> : texte qui apparait en bas de chaque facture</li>
                        <li><strong>Devise par defaut</strong> : EUR, USD, MAD, etc.</li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">4.4 — Parametres de localisation</h6>
                    <p>Dans <strong>Parametres &gt; Localisation</strong> :</p>
                    <ul>
                        <li><strong>Fuseau horaire</strong> : choisissez votre zone (ex. Europe/Paris)</li>
                        <li><strong>Format de date</strong> : JJ/MM/AAAA, MM/JJ/AAAA, etc.</li>
                        <li><strong>Separateur numerique</strong> : virgule ou point pour les decimales</li>
                    </ul>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 5 : CLIENTS (CRM) --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-clients">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-profile-2user me-2"></i>5. Gestion des clients (CRM)</h5>
                </div>
                <div class="card-body">
                    <p>La section <strong>CRM</strong> vous permet de gerer tous vos clients. Chaque client peut avoir des adresses, des contacts et un historique complet.</p>

                    <h6 class="fw-bold mb-3">5.1 — Voir la liste des clients</h6>
                    <ol>
                        <li>Dans le menu lateral, cliquez sur <strong>« Commerce »</strong> puis <strong>« Clients »</strong>.</li>
                        <li>La liste de tous vos clients s'affiche sous forme de tableau.</li>
                        <li>Utilisez la <strong>barre de recherche</strong> en haut pour trouver un client par nom ou e-mail.</li>
                        <li>Utilisez les <strong>filtres</strong> pour affiner par type (Particulier / Entreprise) ou statut.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">5.2 — Ajouter un nouveau client</h6>
                    <ol>
                        <li>Cliquez sur le bouton <strong>« + Nouveau client »</strong> en haut a droite.</li>
                        <li>Remplissez le formulaire :
                            <table class="table table-bordered mt-2 mb-2">
                                <thead>
                                    <tr><th>Champ</th><th>Obligatoire</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>Nom</td><td>Oui</td><td>Nom complet du client ou raison sociale</td></tr>
                                    <tr><td>Type</td><td>Oui</td><td>Particulier ou Entreprise</td></tr>
                                    <tr><td>E-mail</td><td>Non</td><td>Adresse e-mail du client</td></tr>
                                    <tr><td>Telephone</td><td>Non</td><td>Numero de telephone</td></tr>
                                    <tr><td>Devise</td><td>Non</td><td>Devise preferee pour ce client</td></tr>
                                    <tr><td>Delai de paiement</td><td>Non</td><td>Nombre de jours pour payer (ex. 30)</td></tr>
                                </tbody>
                            </table>
                        </li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">5.3 — Modifier un client</h6>
                    <ol>
                        <li>Dans la liste, trouvez le client a modifier.</li>
                        <li>Cliquez sur le bouton <strong>« Actions »</strong> (trois points ou menu deroulant) a droite de la ligne.</li>
                        <li>Selectionnez <strong>« Modifier »</strong>.</li>
                        <li>Modifiez les champs souhaites.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">5.4 — Supprimer un client</h6>
                    <ol>
                        <li>Cliquez sur <strong>« Actions »</strong> puis <strong>« Supprimer »</strong>.</li>
                        <li>Confirmez la suppression dans la boite de dialogue.</li>
                        <li>Le client sera mis a la corbeille (vous pourrez le restaurer depuis <strong>Corbeille</strong>).</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">5.5 — Fiche client (details)</h6>
                    <ol>
                        <li>Cliquez sur le <strong>nom du client</strong> dans la liste pour ouvrir sa fiche.</li>
                        <li>Vous y trouverez :
                            <ul>
                                <li><strong>Informations generales</strong> : nom, e-mail, telephone, type</li>
                                <li><strong>Adresses</strong> : ajoutez des adresses de facturation et livraison</li>
                                <li><strong>Contacts</strong> : ajoutez les personnes a contacter dans l'entreprise</li>
                                <li><strong>Historique</strong> : toutes les factures et devis lies a ce client</li>
                            </ul>
                        </li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">5.6 — Ajouter une adresse a un client</h6>
                    <ol>
                        <li>Ouvrez la fiche du client.</li>
                        <li>Dans la section <strong>« Adresses »</strong>, cliquez sur <strong>« + Ajouter une adresse »</strong>.</li>
                        <li>Remplissez : Type (Facturation/Livraison), Adresse, Ville, Region, Code postal, Pays.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">5.7 — Ajouter un contact a un client</h6>
                    <ol>
                        <li>Ouvrez la fiche du client.</li>
                        <li>Dans la section <strong>« Contacts »</strong>, cliquez sur <strong>« + Ajouter un contact »</strong>.</li>
                        <li>Remplissez : Nom, E-mail, Telephone, Poste, Contact principal (oui/non).</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 6 : PRODUITS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-produits">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-box me-2"></i>6. Catalogue (Produits & Services)</h5>
                </div>
                <div class="card-body">
                    <p>Le catalogue contient tous les produits et services que vous vendez. Il sert de base pour creer vos factures et devis.</p>

                    <h6 class="fw-bold mb-3">6.1 — Creer des categories</h6>
                    <p>Avant d'ajouter des produits, creez des categories pour les organiser :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Produits & Stock »</strong> &gt; <strong>« Categories »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouvelle categorie »</strong>.</li>
                        <li>Entrez le nom (ex. « Electronique », « Services », « Alimentaire »).</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">6.2 — Creer des unites de mesure</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Produits & Stock »</strong> &gt; <strong>« Unites »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouvelle unite »</strong>.</li>
                        <li>Entrez le nom (ex. « Piece », « Kg », « Heure », « Litre »).</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">6.3 — Ajouter un produit</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Produits & Stock »</strong> &gt; <strong>« Produits »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau produit »</strong>.</li>
                        <li>Remplissez le formulaire :
                            <table class="table table-bordered mt-2 mb-2">
                                <thead>
                                    <tr><th>Champ</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>Nom</td><td>Nom du produit ou service</td></tr>
                                    <tr><td>Type</td><td>Produit physique ou Service</td></tr>
                                    <tr><td>SKU / Reference</td><td>Code unique pour identifier le produit</td></tr>
                                    <tr><td>Categorie</td><td>Choisissez parmi vos categories</td></tr>
                                    <tr><td>Unite</td><td>Unite de mesure (Piece, Kg, etc.)</td></tr>
                                    <tr><td>Prix de vente</td><td>Prix auquel vous vendez</td></tr>
                                    <tr><td>Prix d'achat</td><td>Prix auquel vous achetez (optionnel)</td></tr>
                                    <tr><td>Taxe</td><td>Groupe de taxe applicable (TVA 20%, etc.)</td></tr>
                                    <tr><td>Description</td><td>Description detaillee du produit</td></tr>
                                </tbody>
                            </table>
                        </li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">6.4 — Modifier ou supprimer un produit</h6>
                    <ol>
                        <li>Dans la liste des produits, cliquez sur <strong>« Actions »</strong> a droite du produit.</li>
                        <li>Choisissez <strong>« Modifier »</strong> pour editer ou <strong>« Supprimer »</strong> pour retirer le produit.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">6.5 — Configurer les taxes</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Produits & Stock »</strong> &gt; <strong>« Taxes »</strong>.</li>
                        <li>Creez d'abord une <strong>categorie de taxe</strong> (ex. « Biens », « Services »).</li>
                        <li>Ensuite creez un <strong>groupe de taxe</strong> (ex. « TVA 20% ») avec le taux correspondant.</li>
                        <li>Assignez le groupe de taxe a vos produits lors de leur creation.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 7 : FACTURES --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-factures">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-receipt me-2"></i>7. Factures (Ventes)</h5>
                </div>
                <div class="card-body">
                    <p>Les factures sont le coeur de votre activite. Voici comment les creer et les gerer.</p>

                    <h6 class="fw-bold mb-3">7.1 — Creer une facture</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Factures »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouvelle facture »</strong>.</li>
                        <li>Remplissez l'en-tete :
                            <ul>
                                <li><strong>Client</strong> : selectionnez un client existant dans la liste deroulante</li>
                                <li><strong>Date de facture</strong> : date d'emission (par defaut : aujourd'hui)</li>
                                <li><strong>Date d'echeance</strong> : date limite de paiement</li>
                                <li><strong>Numero</strong> : genere automatiquement (ex. FAC-0001)</li>
                            </ul>
                        </li>
                        <li>Ajoutez les lignes de produits/services :
                            <ul>
                                <li>Cliquez sur <strong>« + Ajouter une ligne »</strong></li>
                                <li>Selectionnez un <strong>produit</strong> dans la liste (le prix se remplit automatiquement)</li>
                                <li>Modifiez la <strong>quantite</strong></li>
                                <li>Ajustez le <strong>prix unitaire</strong> si necessaire</li>
                                <li>Ajoutez une <strong>remise</strong> (en % ou en montant) si besoin</li>
                                <li>La <strong>taxe</strong> est calculee automatiquement selon le produit</li>
                            </ul>
                        </li>
                        <li>Ajoutez des <strong>frais supplementaires</strong> si besoin (livraison, etc.).</li>
                        <li>Verifiez le <strong>total</strong> en bas (sous-total + taxes + frais - remises).</li>
                        <li>Ajoutez des <strong>notes</strong> ou <strong>conditions</strong> en bas de facture.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">7.2 — Les statuts d'une facture</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>Statut</th><th>Signification</th></tr>
                        </thead>
                        <tbody>
                            <tr><td><span class="badge bg-secondary">Brouillon</span></td><td>Facture en cours de redaction, pas encore envoyee</td></tr>
                            <tr><td><span class="badge bg-warning">En attente</span></td><td>Facture envoyee au client, en attente de paiement</td></tr>
                            <tr><td><span class="badge bg-info">Partiellement payee</span></td><td>Le client a paye une partie du montant</td></tr>
                            <tr><td><span class="badge bg-success">Payee</span></td><td>Facture entierement reglee</td></tr>
                            <tr><td><span class="badge bg-danger">En retard</span></td><td>La date d'echeance est depassee</td></tr>
                            <tr><td><span class="badge bg-dark">Annulee</span></td><td>Facture annulee (void)</td></tr>
                        </tbody>
                    </table>

                    <h6 class="fw-bold mb-3 mt-4">7.3 — Envoyer une facture par e-mail</h6>
                    <ol>
                        <li>Ouvrez la facture.</li>
                        <li>Cliquez sur <strong>« Envoyer »</strong>.</li>
                        <li>Verifiez l'adresse e-mail du destinataire.</li>
                        <li>Ajoutez un message personnalise si souhaite.</li>
                        <li>Cliquez sur <strong>« Envoyer »</strong>. La facture sera envoyee en PDF.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">7.4 — Telecharger une facture en PDF</h6>
                    <ol>
                        <li>Ouvrez la facture.</li>
                        <li>Cliquez sur <strong>« Telecharger PDF »</strong>.</li>
                        <li>Le fichier PDF sera telecharge sur votre ordinateur.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">7.5 — Modifier une facture</h6>
                    <ol>
                        <li>Dans la liste des factures, cliquez sur <strong>« Actions »</strong> &gt; <strong>« Modifier »</strong>.</li>
                        <li>Modifiez les champs necessaires.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>
                    <div class="alert alert-warning">
                        <i class="isax isax-warning-2 me-2"></i>
                        <strong>Attention :</strong> Ne modifiez pas une facture deja envoyee ou payee. Creez plutot un avoir (section 10).
                    </div>

                    <h6 class="fw-bold mb-3 mt-4">7.6 — Annuler une facture</h6>
                    <ol>
                        <li>Ouvrez la facture concernee.</li>
                        <li>Cliquez sur <strong>« Annuler »</strong> (void).</li>
                        <li>La facture sera marquee comme annulee. Elle reste visible pour l'historique mais n'est plus comptabilisee.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 8 : DEVIS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-devis">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-document-text me-2"></i>8. Devis (Propositions commerciales)</h5>
                </div>
                <div class="card-body">
                    <p>Les devis permettent de proposer un prix a vos clients avant de facturer.</p>

                    <h6 class="fw-bold mb-3">8.1 — Creer un devis</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Devis »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau devis »</strong>.</li>
                        <li>Le formulaire est identique a celui des factures :
                            <ul>
                                <li>Selectionnez le <strong>client</strong></li>
                                <li>Ajoutez les <strong>produits/services</strong></li>
                                <li>Definissez les <strong>dates</strong> (emission et validite)</li>
                            </ul>
                        </li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">8.2 — Envoyer un devis au client</h6>
                    <ol>
                        <li>Ouvrez le devis et cliquez sur <strong>« Envoyer »</strong>.</li>
                        <li>Le devis sera envoye en PDF par e-mail.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">8.3 — Convertir un devis en facture</h6>
                    <p>C'est l'une des fonctionnalites les plus utiles !</p>
                    <ol>
                        <li>Ouvrez le devis accepte par le client.</li>
                        <li>Cliquez sur <strong>« Convertir en facture »</strong>.</li>
                        <li>Une facture est automatiquement creee avec toutes les informations du devis.</li>
                        <li>Verifiez la facture et enregistrez-la.</li>
                    </ol>
                    <div class="alert alert-info">
                        <i class="isax isax-lamp-charge me-2"></i>
                        <strong>Conseil :</strong> Cette fonctionnalite evite de ressaisir toutes les informations. Le devis est marque comme « Converti ».
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 9 : PAIEMENTS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-paiements">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-wallet-money me-2"></i>9. Paiements clients</h5>
                </div>
                <div class="card-body">
                    <p>Enregistrez les paiements recus de vos clients pour suivre le reglement de vos factures.</p>

                    <h6 class="fw-bold mb-3">9.1 — Enregistrer un paiement</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Paiements »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau paiement »</strong>.</li>
                        <li>Remplissez :
                            <ul>
                                <li><strong>Client</strong> : selectionnez le client</li>
                                <li><strong>Montant</strong> : somme recue</li>
                                <li><strong>Date</strong> : date de reception du paiement</li>
                                <li><strong>Mode de paiement</strong> : virement, cheque, especes, carte, etc.</li>
                                <li><strong>Compte bancaire</strong> : sur quel compte le paiement est recu</li>
                                <li><strong>Facture(s)</strong> : selectionnez la ou les factures concernees</li>
                            </ul>
                        </li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>
                    <div class="alert alert-success">
                        <i class="isax isax-tick-circle me-2"></i>
                        <strong>Automatique :</strong> Le statut de la facture se met a jour automatiquement (« Partiellement payee » ou « Payee ») selon le montant enregistre.
                    </div>

                    <h6 class="fw-bold mb-3 mt-4">9.2 — Telecharger un recu de paiement</h6>
                    <ol>
                        <li>Ouvrez le paiement.</li>
                        <li>Cliquez sur <strong>« Telecharger PDF »</strong> pour obtenir le recu.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 10 : AVOIRS & REMBOURSEMENTS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-avoirs">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-receipt-minus me-2"></i>10. Avoirs & Remboursements</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">10.1 — Qu'est-ce qu'un avoir ?</h6>
                    <p>Un <strong>avoir</strong> (credit note) est un document qui annule partiellement ou totalement une facture.
                    Utilisez un avoir quand :</p>
                    <ul>
                        <li>Un client retourne des marchandises</li>
                        <li>Vous avez facture un montant trop eleve</li>
                        <li>Vous accordez une remise apres facturation</li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">10.2 — Creer un avoir</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Avoirs »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouvel avoir »</strong>.</li>
                        <li>Selectionnez le <strong>client</strong> et remplissez les lignes de l'avoir.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">10.3 — Appliquer un avoir a une facture</h6>
                    <ol>
                        <li>Ouvrez l'avoir.</li>
                        <li>Cliquez sur <strong>« Appliquer »</strong>.</li>
                        <li>Selectionnez la ou les factures sur lesquelles deduire le montant.</li>
                        <li>Le solde de la facture est automatiquement reduit.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">10.4 — Remboursements</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Remboursements »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau remboursement »</strong>.</li>
                        <li>Selectionnez le client, le montant et le mode de paiement.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 11 : ACHATS & FOURNISSEURS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-achats">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-bag me-2"></i>11. Achats & Fournisseurs</h5>
                </div>
                <div class="card-body">
                    <p>La section Achats vous permet de gerer vos fournisseurs, bons de commande, factures fournisseurs et paiements.</p>

                    <h6 class="fw-bold mb-3">11.1 — Gerer les fournisseurs</h6>
                    <p>Meme principe que les clients :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Fournisseurs »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau fournisseur »</strong>.</li>
                        <li>Remplissez : nom, e-mail, telephone, adresse, etc.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">11.2 — Creer un bon de commande</h6>
                    <p>Un bon de commande (Purchase Order) est envoye au fournisseur pour commander des produits.</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Bons de commande »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau bon de commande »</strong>.</li>
                        <li>Selectionnez le <strong>fournisseur</strong>.</li>
                        <li>Ajoutez les <strong>produits a commander</strong> avec les quantites.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                        <li>Envoyez le bon de commande en PDF au fournisseur.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">11.3 — Factures fournisseurs (Vendor Bills)</h6>
                    <p>Quand vous recevez une facture de votre fournisseur :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Factures fournisseurs »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouvelle facture fournisseur »</strong>.</li>
                        <li>Selectionnez le fournisseur, ajoutez les lignes (produits, montants).</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">11.4 — Reception de marchandises</h6>
                    <p>Quand vous recevez physiquement les produits commandes :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Receptions »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouvelle reception »</strong>.</li>
                        <li>Selectionnez le bon de commande et l'entrepot de destination.</li>
                        <li>Verifiez les quantites recues.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>. Le stock est mis a jour automatiquement.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">11.5 — Notes de debit (retours fournisseur)</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Notes de debit »</strong>.</li>
                        <li>Creez une note de debit pour signaler un retour ou une erreur fournisseur.</li>
                        <li>Appliquez-la a une facture fournisseur pour reduire le montant du.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">11.6 — Paiements fournisseurs</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Commerce »</strong> &gt; <strong>« Paiements fournisseurs »</strong>.</li>
                        <li>Enregistrez vos paiements aux fournisseurs.</li>
                        <li>Selectionnez la facture fournisseur a regler.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 12 : INVENTAIRE & STOCK --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-stock">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-box-1 me-2"></i>12. Inventaire & Stock</h5>
                </div>
                <div class="card-body">
                    <p>Gerez vos entrepots, niveaux de stock, mouvements et transferts entre entrepots.</p>

                    <h6 class="fw-bold mb-3">12.1 — Creer un entrepot</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Produits & Stock »</strong> &gt; <strong>« Entrepots »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouvel entrepot »</strong>.</li>
                        <li>Remplissez : nom, adresse, description.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">12.2 — Voir les niveaux de stock</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Produits & Stock »</strong> &gt; <strong>« Niveaux de stock »</strong>.</li>
                        <li>Vous voyez un tableau avec chaque produit et la quantite disponible par entrepot.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">12.3 — Mouvements de stock (ajustements)</h6>
                    <p>Pour ajouter ou retirer du stock manuellement :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Produits & Stock »</strong> &gt; <strong>« Mouvements »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau mouvement »</strong>.</li>
                        <li>Selectionnez le produit, l'entrepot, le type (Entree/Sortie) et la quantite.</li>
                        <li>Ajoutez une raison (ex. « Inventaire initial », « Casse », « Ajustement »).</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">12.4 — Transferts entre entrepots</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Produits & Stock »</strong> &gt; <strong>« Transferts »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau transfert »</strong>.</li>
                        <li>Selectionnez l'entrepot d'<strong>origine</strong> et l'entrepot de <strong>destination</strong>.</li>
                        <li>Ajoutez les produits a transferer avec les quantites.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong> (statut : Brouillon).</li>
                        <li>Quand les produits sont recus, cliquez sur <strong>« Executer »</strong> pour finaliser le transfert.</li>
                    </ol>

                    <div class="alert alert-info">
                        <i class="isax isax-lamp-charge me-2"></i>
                        <strong>Statuts d'un transfert :</strong> Brouillon &rarr; En transit &rarr; Recu &rarr; (ou Annule)
                    </div>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 13 : FINANCE --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-finance">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-wallet-3 me-2"></i>13. Finance</h5>
                </div>
                <div class="card-body">
                    <p>Gerez vos comptes bancaires, depenses, revenus et transferts d'argent.</p>

                    <h6 class="fw-bold mb-3">13.1 — Comptes bancaires</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Finance »</strong> &gt; <strong>« Comptes bancaires »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau compte »</strong>.</li>
                        <li>Remplissez :
                            <ul>
                                <li><strong>Nom</strong> : ex. « Compte principal BNP »</li>
                                <li><strong>Type</strong> : Courant, Epargne, Business, Autre</li>
                                <li><strong>Numero de compte</strong> (optionnel)</li>
                                <li><strong>Solde initial</strong> : le montant actuel sur le compte</li>
                                <li><strong>Devise</strong> : EUR, USD, etc.</li>
                            </ul>
                        </li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">13.2 — Enregistrer une depense</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Finance »</strong> &gt; <strong>« Depenses »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouvelle depense »</strong>.</li>
                        <li>Remplissez :
                            <ul>
                                <li><strong>Categorie</strong> : Loyer, Fournitures, Transport, etc.</li>
                                <li><strong>Montant</strong> : le montant depense</li>
                                <li><strong>Date</strong> : date de la depense</li>
                                <li><strong>Compte bancaire</strong> : depuis quel compte l'argent est sorti</li>
                                <li><strong>Description</strong> : details de la depense</li>
                            </ul>
                        </li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">13.3 — Enregistrer un revenu</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Finance »</strong> &gt; <strong>« Revenus »</strong>.</li>
                        <li>Meme principe que les depenses, mais pour l'argent recu hors factures (subventions, dons, etc.).</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">13.4 — Categories financieres</h6>
                    <p>Organisez vos depenses et revenus par categories :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Finance »</strong> &gt; <strong>« Categories »</strong>.</li>
                        <li>Creez des categories (ex. « Loyer », « Salaires », « Marketing », « Ventes diverses »).</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">13.5 — Transferts d'argent</h6>
                    <p>Pour transferer de l'argent entre vos comptes bancaires :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Finance »</strong> &gt; <strong>« Transferts »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau transfert »</strong>.</li>
                        <li>Selectionnez le <strong>compte source</strong> et le <strong>compte destination</strong>.</li>
                        <li>Entrez le <strong>montant</strong>.</li>
                        <li>Cliquez sur <strong>« Enregistrer »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">13.6 — Prets</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Finance »</strong> &gt; <strong>« Prets »</strong>.</li>
                        <li>Enregistrez vos emprunts ou prets accordes.</li>
                        <li>Suivez les echeances et les remboursements.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 14 : RAPPORTS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-rapports">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-chart-2 me-2"></i>14. Rapports & Analyses</h5>
                </div>
                <div class="card-body">
                    <p>Les rapports vous donnent une vue detaillee de votre activite. Ils sont accessibles via <strong>Menu lateral &gt; « Analyses »</strong>.</p>

                    <h6 class="fw-bold mb-3">14.1 — Rapport des ventes</h6>
                    <ul>
                        <li>Chiffre d'affaires total par periode</li>
                        <li>Nombre de factures emises</li>
                        <li>Meilleurs clients par chiffre d'affaires</li>
                        <li>Produits les plus vendus</li>
                        <li>Possibilite d'<strong>exporter en PDF</strong></li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">14.2 — Rapport des clients</h6>
                    <ul>
                        <li>Nombre de clients actifs</li>
                        <li>Creances en cours (montants non payes)</li>
                        <li>Historique d'activite par client</li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">14.3 — Rapport des achats</h6>
                    <ul>
                        <li>Total des achats par periode</li>
                        <li>Principaux fournisseurs</li>
                        <li>Dettes fournisseurs en cours</li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">14.4 — Rapport financier</h6>
                    <ul>
                        <li>Recapitulatif depenses vs revenus</li>
                        <li>Soldes des comptes bancaires</li>
                        <li>Repartition par categorie</li>
                        <li>Possibilite d'<strong>exporter en PDF</strong></li>
                    </ul>

                    <h6 class="fw-bold mb-3 mt-4">14.5 — Rapport d'inventaire</h6>
                    <ul>
                        <li>Valeur totale du stock</li>
                        <li>Produits en rupture de stock</li>
                        <li>Mouvements de stock sur la periode</li>
                        <li>Possibilite d'<strong>exporter en PDF</strong></li>
                    </ul>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 15 : FONCTIONNALITES PRO --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-pro">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-crown me-2"></i>15. Fonctionnalites Pro</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-4">
                        <i class="isax isax-info-circle me-2"></i>
                        Ces fonctionnalites sont disponibles avec un abonnement <strong>Pro</strong> ou superieur.
                    </div>

                    <h6 class="fw-bold mb-3">15.1 — Factures recurrentes</h6>
                    <p>Automatisez la creation de factures qui se repetent (abonnements, loyers, etc.) :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Pro »</strong> &gt; <strong>« Factures recurrentes »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau modele »</strong>.</li>
                        <li>Configurez :
                            <ul>
                                <li><strong>Client</strong> : a qui envoyer la facture</li>
                                <li><strong>Frequence</strong> : mensuelle, trimestrielle, annuelle</li>
                                <li><strong>Date de debut</strong> et <strong>date de fin</strong> (optionnelle)</li>
                                <li><strong>Produits/services</strong> : les lignes de la facture</li>
                            </ul>
                        </li>
                        <li>L'application creera automatiquement les factures aux dates prevues.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">15.2 — Rappels de paiement</h6>
                    <p>Envoyez automatiquement des rappels aux clients qui n'ont pas paye :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Pro »</strong> &gt; <strong>« Rappels »</strong>.</li>
                        <li>Definissez des regles de rappel :
                            <ul>
                                <li><strong>Delai</strong> : combien de jours apres l'echeance (ex. 7 jours, 14 jours)</li>
                                <li><strong>Message</strong> : le contenu du rappel</li>
                                <li><strong>Frequence</strong> : combien de fois relancer</li>
                            </ul>
                        </li>
                        <li>Les rappels sont envoyes automatiquement par e-mail.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">15.3 — Succursales (multi-sites)</h6>
                    <p>Si vous avez plusieurs points de vente ou bureaux :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Pro »</strong> &gt; <strong>« Succursales »</strong>.</li>
                        <li>Ajoutez chaque succursale avec son adresse et ses informations.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">15.4 — Rapports personnalises</h6>
                    <p>Creez des rapports sur mesure avec un editeur visuel :</p>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Pro »</strong> &gt; <strong>« Rapports »</strong>.</li>
                        <li>Cliquez sur <strong>« + Nouveau rapport »</strong>.</li>
                        <li>Utilisez l'editeur pour rediger votre rapport.</li>
                        <li>Exportez en <strong>PDF</strong> ou <strong>Word</strong>.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 16 : UTILISATEURS & PERMISSIONS --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-utilisateurs">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-people me-2"></i>16. Utilisateurs & Permissions</h5>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-3">16.1 — Inviter un utilisateur</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Administration »</strong> &gt; <strong>« Utilisateurs »</strong>.</li>
                        <li>Cliquez sur <strong>« Inviter un utilisateur »</strong>.</li>
                        <li>Entrez l'<strong>adresse e-mail</strong> de la personne a inviter.</li>
                        <li>Selectionnez le <strong>role</strong> a attribuer (Admin, Comptable, Vendeur, etc.).</li>
                        <li>Cliquez sur <strong>« Envoyer l'invitation »</strong>.</li>
                        <li>La personne recevra un e-mail avec un lien pour creer son compte.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">16.2 — Gerer les roles</h6>
                    <ol>
                        <li>Menu lateral &gt; <strong>« Administration »</strong> &gt; <strong>« Roles & Permissions »</strong>.</li>
                        <li>Vous verrez les roles existants : Admin, Comptable, Vendeur, etc.</li>
                        <li>Pour creer un nouveau role, cliquez sur <strong>« + Nouveau role »</strong>.</li>
                        <li>Donnez-lui un nom (ex. « Gestionnaire stock »).</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">16.3 — Configurer les permissions d'un role</h6>
                    <p>Chaque role a des permissions specifiques qui definissent ce que l'utilisateur peut faire :</p>
                    <ol>
                        <li>Cliquez sur le role a configurer.</li>
                        <li>Cochez les permissions souhaitees :
                            <table class="table table-bordered mt-2 mb-2">
                                <thead>
                                    <tr><th>Module</th><th>Permissions disponibles</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td>Clients</td><td>Voir, Creer, Modifier, Supprimer</td></tr>
                                    <tr><td>Factures</td><td>Voir, Creer, Modifier, Supprimer, Envoyer</td></tr>
                                    <tr><td>Devis</td><td>Voir, Creer, Modifier, Supprimer, Convertir</td></tr>
                                    <tr><td>Produits</td><td>Voir, Creer, Modifier, Supprimer</td></tr>
                                    <tr><td>Stock</td><td>Voir, Creer, Modifier, Transferts</td></tr>
                                    <tr><td>Finance</td><td>Voir, Creer, Modifier, Supprimer</td></tr>
                                    <tr><td>Rapports</td><td>Voir, Exporter</td></tr>
                                    <tr><td>Utilisateurs</td><td>Voir, Inviter, Modifier, Desactiver</td></tr>
                                    <tr><td>Parametres</td><td>Voir, Modifier</td></tr>
                                </tbody>
                            </table>
                        </li>
                        <li>Cliquez sur <strong>« Enregistrer les permissions »</strong>.</li>
                    </ol>

                    <h6 class="fw-bold mb-3 mt-4">16.4 — Activer / Desactiver un utilisateur</h6>
                    <ol>
                        <li>Dans la liste des utilisateurs, cliquez sur <strong>« Actions »</strong>.</li>
                        <li>Selectionnez <strong>« Desactiver »</strong> pour bloquer l'acces ou <strong>« Activer »</strong> pour le retablir.</li>
                    </ol>
                </div>
            </div>

            {{-- ================================================================== --}}
            {{-- SECTION 17 : TOUS LES PARAMETRES --}}
            {{-- ================================================================== --}}
            <div class="card mb-4" id="section-parametres">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-setting-25 me-2"></i>17. Tous les parametres</h5>
                </div>
                <div class="card-body">
                    <p>Voici la liste complete des parametres disponibles dans votre espace :</p>

                    <table class="table table-bordered">
                        <thead>
                            <tr><th>Parametre</th><th>Description</th><th>Acces</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Mon compte</strong></td>
                                <td>Modifier votre nom, e-mail, photo, mot de passe</td>
                                <td>Parametres &gt; Mon compte</td>
                            </tr>
                            <tr>
                                <td><strong>Entreprise</strong></td>
                                <td>Nom, adresse, logo, TVA de l'entreprise</td>
                                <td>Parametres &gt; Entreprise</td>
                            </tr>
                            <tr>
                                <td><strong>Factures</strong></td>
                                <td>Prefixes, conditions de paiement, notes par defaut</td>
                                <td>Parametres &gt; Factures</td>
                            </tr>
                            <tr>
                                <td><strong>Localisation</strong></td>
                                <td>Fuseau horaire, format date, format nombre</td>
                                <td>Parametres &gt; Localisation</td>
                            </tr>
                            <tr>
                                <td><strong>Devises</strong></td>
                                <td>Ajouter des devises, definir taux de change</td>
                                <td>Parametres &gt; Devises</td>
                            </tr>
                            <tr>
                                <td><strong>Modeles de facture</strong></td>
                                <td>Choisir le design de vos factures PDF</td>
                                <td>Parametres &gt; Modeles</td>
                            </tr>
                            <tr>
                                <td><strong>Signatures</strong></td>
                                <td>Ajouter des signatures electroniques</td>
                                <td>Parametres &gt; Signatures</td>
                            </tr>
                            <tr>
                                <td><strong>Modes de paiement</strong></td>
                                <td>Configurer les moyens de paiement acceptes</td>
                                <td>Parametres &gt; Modes de paiement</td>
                            </tr>
                            <tr>
                                <td><strong>Modeles d'e-mail</strong></td>
                                <td>Personnaliser les e-mails envoyes aux clients</td>
                                <td>Parametres &gt; Modeles d'e-mail</td>
                            </tr>
                            <tr>
                                <td><strong>Notifications</strong></td>
                                <td>Configurer les alertes et notifications</td>
                                <td>Parametres &gt; Notifications</td>
                            </tr>
                            <tr>
                                <td><strong>Apparence</strong></td>
                                <td>Theme clair/sombre, couleurs</td>
                                <td>Parametres &gt; Apparence</td>
                            </tr>
                            <tr>
                                <td><strong>Code-barres</strong></td>
                                <td>Configurer la generation de codes-barres</td>
                                <td>Parametres &gt; Code-barres</td>
                            </tr>
                            <tr>
                                <td><strong>Securite</strong></td>
                                <td>Sessions actives, revoquer un acces</td>
                                <td>Parametres &gt; Securite</td>
                            </tr>
                            <tr>
                                <td><strong>Abonnement</strong></td>
                                <td>Voir votre plan actuel et l'utilisation</td>
                                <td>Parametres &gt; Abonnement</td>
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
                    <h5 class="card-title mb-0 text-white"><i class="isax isax-tick-circle me-2"></i>Resume : Les etapes pour bien demarrer</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ol class="fs-6">
                                <li class="mb-2"><strong>Configurez votre entreprise</strong> (nom, adresse, logo, TVA)</li>
                                <li class="mb-2"><strong>Parametrez la facturation</strong> (prefixes, devise, conditions)</li>
                                <li class="mb-2"><strong>Creez vos categories</strong> et <strong>unites de mesure</strong></li>
                                <li class="mb-2"><strong>Ajoutez vos produits/services</strong> au catalogue</li>
                                <li class="mb-2"><strong>Ajoutez vos clients</strong></li>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <ol class="fs-6" start="6">
                                <li class="mb-2"><strong>Creez votre premiere facture</strong> ou devis</li>
                                <li class="mb-2"><strong>Envoyez-la</strong> a votre client par e-mail</li>
                                <li class="mb-2"><strong>Enregistrez le paiement</strong> quand vous le recevez</li>
                                <li class="mb-2"><strong>Consultez vos rapports</strong> pour suivre votre activite</li>
                                <li class="mb-2"><strong>Invitez votre equipe</strong> si necessaire</li>
                            </ol>
                        </div>
                    </div>
                    <div class="alert alert-primary mt-3 mb-0">
                        <i class="isax isax-lamp-charge me-2"></i>
                        <strong>Besoin d'aide ?</strong> Contactez notre support a tout moment. Nous sommes la pour vous accompagner !
                    </div>
                </div>
            </div>

            {{-- Back to top --}}
            <div class="text-center mb-4">
                <a href="#section-introduction" class="btn btn-outline-primary">
                    <i class="isax isax-arrow-up-2 me-1"></i> Retour en haut
                </a>
            </div>
        </div>
    </div>
@endsection
