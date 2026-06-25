<div align="center">

# 🧾 Hssabek

### **La plateforme SaaS de facturation et de gestion d'entreprise — pensée pour le Maroc 🇲🇦**

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-Proprietary-red?style=for-the-badge)]()
[![Status](https://img.shields.io/badge/Status-Active-success?style=for-the-badge)]()

*Facturation • CRM • Stocks • Comptabilité • Multi-tenant*

</div>

---

## ✨ Aperçu

**Hssabek** est une solution **SaaS multi-tenant** complète permettant aux entreprises (TPE, PME, freelancers) de gérer leurs **factures**, **devis**, **clients**, **produits**, **stocks** et **paiements** depuis une interface moderne, rapide et 100 % en français.

> 🎯 Chaque entreprise dispose de son propre **espace isolé** (sous-domaine dédié), avec ses utilisateurs, ses rôles, ses données et ses paramètres.

---

## 🚀 Fonctionnalités Principales

<table>
<tr>
<td width="50%">

### 💼 Gestion Commerciale
- 🧾 **Factures** — Création, édition, PDF, envoi par email
- 📋 **Devis** — Conversion en facture en 1 clic
- 🔁 **Avoirs** & Notes de débit
- 💳 **Paiements** & allocations multi-factures
- 📦 **Bons de commande** & livraisons

</td>
<td width="50%">

### 👥 CRM
- 👤 Clients & fournisseurs
- 📍 Adresses multiples (facturation, livraison)
- 📞 Contacts par client
- 🏷️ Segmentation & types
- 🔍 Recherche & filtres avancés

</td>
</tr>
<tr>
<td width="50%">

### 📦 Inventaire
- 🏷️ Produits & services
- 📊 Suivi du stock en temps réel
- 🔄 Transferts entre entrepôts
- 📈 Mouvements & historique
- ⚠️ Alertes de stock bas

</td>
<td width="50%">

### 🏢 Multi-Tenant SaaS
- 🌐 Sous-domaine par entreprise
- 🔐 Isolation totale des données
- 👨‍💼 SuperAdmin pour la gestion des tenants
- 💎 Plans d'abonnement (Free / Pro / Lifetime)
- 📧 Invitations utilisateurs

</td>
</tr>
<tr>
<td width="50%">

### 🔒 Sécurité & Rôles
- 🛡️ Permissions granulaires (Spatie)
- 👥 Rôles personnalisables
- 📝 Logs d'activité complets
- 🔑 2FA & sessions sécurisées
- 🚫 Protection contre l'IDOR & mass-assignment

</td>
<td width="50%">

### 📊 Rapports & Outils
- 📈 Tableau de bord interactif
- 📑 Rapports ventes / clients / TVA
- 🧾 Export PDF & Excel
- 📧 Modèles d'email personnalisables
- 🏦 Comptes bancaires multiples

</td>
</tr>
</table>

---

## 🛠️ Stack Technique

| Couche | Technologie |
|---|---|
| **Backend** | Laravel 12 · PHP 8.2+ |
| **Frontend** | Blade · Bootstrap 5 · jQuery · DataTables |
| **Base de données** | MySQL / MariaDB (SQLite pour les tests) |
| **Auth & Permissions** | Laravel Sanctum · Spatie Permission |
| **PDF** | DomPDF (Barryvdh) |
| **Excel** | Maatwebsite Excel |
| **Médias** | Spatie Media Library |
| **Logs** | Spatie Activity Log |
| **Tests** | PHPUnit · Larastan · PHP Insights |

---

## ⚡ Installation Rapide

```bash
# 1. Cloner le projet
git clone https://github.com/Rochdi7/Hssabek.git
cd Hssabek

# 2. Installer les dépendances
composer install
npm install

# 3. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 4. Lancer les migrations & seeders
php artisan migrate --seed

# 5. Compiler les assets
npm run build

# 6. Démarrer l'application
php artisan serve
```

> 💡 Astuce : utilisez `composer dev` pour lancer **server + queue + logs + vite** en parallèle.

---

## 🏗️ Architecture du Projet

```
facturation/
├── app/
│   ├── Http/Controllers/
│   │   ├── Backoffice/      # Espace tenant (entreprise)
│   │   ├── SuperAdmin/      # Espace super-admin (SaaS)
│   │   └── FrontOffice/     # Site vitrine public
│   ├── Models/              # Modèles métier (multi-tenant)
│   ├── Policies/            # Autorisations
│   └── Services/            # Logique métier (DocumentNumber, etc.)
├── resources/views/
│   ├── backoffice/          # Vues tenant
│   ├── superadmin/          # Vues SuperAdmin
│   ├── frontoffice/         # Vues publiques
│   └── *.blade.php          # Templates UI de référence
├── routes/
│   ├── backoffice/          # Routes tenant
│   ├── superadmin/          # Routes admin SaaS
│   └── web.php              # Routes publiques
└── tasks/                   # Roadmap & checklists
```

---

## 🌍 Multi-Tenant — Comment ça marche ?

```
┌──────────────────────────────────────────────────┐
│  hssabek.com              → Site vitrine public  │
│  admin.hssabek.com        → SuperAdmin SaaS      │
│  entreprise1.hssabek.com  → Espace Tenant #1     │
│  entreprise2.hssabek.com  → Espace Tenant #2     │
└──────────────────────────────────────────────────┘
```

Chaque tenant est identifié via son **sous-domaine** par le middleware `IdentifyTenantByDomain`, garantissant une **isolation stricte** des données via le trait `BelongsToTenant`.

---

## 🧪 Tests

```bash
php artisan test
```

✅ **90+ tests** couvrant l'isolation tenant, le mass-assignment, les services, et les flux CRUD critiques.

---

## 🗺️ Guide d'utilisation — Tous les modules

### Ventes

| Page | Route | Description |
|------|-------|-------------|
| Factures | `bo.sales.invoices.index` | Création, envoi email, PDF, statuts |
| Devis | `bo.sales.quotes.index` | Devis → convertible en facture |
| Attachements | `bo.sales.attachments.index` | Documents complémentaires |
| Situations | `bo.sales.situations.index` | Situations de travaux (BTP) |
| Récapitulatifs | `bo.sales.recaps.index` | Récaps périodiques |
| Avoirs | `bo.sales.credit-notes.index` | Notes de crédit clients |
| Bons de livraison | `bo.sales.delivery-challans.index` | Bons de livraison |
| Remboursements | `bo.sales.refunds.index` | Remboursements clients |
| Paiements clients | `bo.sales.payments.index` | Encaissements |

**Statuts de facture** : `draft` → `sent` → `unpaid` → `partial` → `paid` | `overdue` | `voided`

### Achats

| Page | Route | Description |
|------|-------|-------------|
| Fournisseurs | `bo.purchases.suppliers.index` | Répertoire fournisseurs |
| Bons de commande | `bo.purchases.purchase-orders.index` | Commandes fournisseurs |
| Réceptions | `bo.purchases.goods-receipts.index` | Réception de marchandises |
| Factures fournisseurs | `bo.purchases.vendor-bills.index` | Factures à payer |
| Notes de débit | `bo.purchases.debit-notes.index` | Avoirs fournisseurs |
| Paiements fournisseurs | `bo.purchases.supplier-payments.index` | Décaissements |

**Workflow achats** : Bon de commande → Réception → Facture fournisseur → Paiement

### Catalogue & Inventaire

| Page | Route | Description |
|------|-------|-------------|
| Produits | `bo.catalog.products.index` | Fiche produit + historique stock |
| Catégories | `bo.catalog.categories.index` | Catégories produits |
| Unités | `bo.catalog.units.index` | Unités de mesure |
| Entrepôts | `bo.inventory.warehouses.index` | Lieux de stockage |
| Niveaux de stock | `bo.inventory.stock.index` | Stock par entrepôt + seuils |
| Mouvements | `bo.inventory.movements.index` | Entrées/sorties de stock |
| Transferts | `bo.inventory.transfers.index` | Transferts inter-entrepôts |

### Finance

| Page | Route | Description |
|------|-------|-------------|
| Dépenses | `bo.finance.expenses.index` | Charges de l'entreprise |
| Revenus | `bo.finance.incomes.index` | Revenus non-facturés |
| Catégories | `bo.finance.categories.index` | Classification charges/revenus |
| Prêts | `bo.finance.loans.index` | Emprunts + échéancier |

### Rapports

| Page | Route | Description |
|------|-------|-------------|
| Ventes | `bo.reports.sales` | CA, marges, tendances |
| Clients | `bo.reports.customers` | Top clients, segmentation |
| Achats | `bo.reports.purchases` | Dépenses fournisseurs |
| Finance | `bo.reports.finance` | Revenus/dépenses |
| Inventaire | `bo.reports.inventory` | Valorisation stock |
| Rapports custom | `bo.pro.rapports.index` | Éditeur WYSIWYG + export PDF/Word |

### Fonctionnalités Pro

| Page | Route | Description |
|------|-------|-------------|
| Factures récurrentes | `bo.pro.recurring-invoices.index` | Génération automatique |
| Rappels de paiement | `bo.pro.invoice-reminders.index` | Relances automatiques |
| Branches | `bo.pro.branches.index` | Multi-agences |

### Administration

| Page | Route | Description |
|------|-------|-------------|
| Utilisateurs | `bo.users.index` | Invitations, activation, rôles |
| Rôles & Permissions | `bo.access.roles.index` | RBAC complet |
| Corbeille | `bo.trash.index` | Éléments supprimés (soft delete) |
| Tickets support | `bo.support.tickets.index` | Demandes d'aide |

### Paramètres

| Page | Route | Description |
|------|-------|-------------|
| Entreprise | `bo.settings.company.edit` | Nom, logo, adresse |
| Factures | `bo.settings.invoice.edit` | Numérotation, CGV, couleurs |
| Modèles PDF | `bo.settings.invoice-templates.index` | Choix du template de facture |
| Signatures | `bo.settings.signatures.index` | Signatures électroniques |
| Devises | `bo.settings.currencies.index` | Monnaies + taux de change |
| Localisation | `bo.settings.locale.edit` | Langue, fuseau horaire, formats |
| Notifications | `bo.settings.notifications.edit` | Alertes email |
| Modèles d'email | `bo.settings.email-templates.index` | Templates d'envoi |
| Abonnement | `bo.settings.plans-billings.index` | Plan actif + limites |

---

## ✂️ Simplification — Désactiver des modules sans risque

> Ces modifications retirent de l'UI **sans toucher la base de données ni les routes**. Aucun risque de perte de données en production.

### Option 1 — Via les permissions (recommandé, zéro code)

Dans **Administration → Rôles & Permissions**, décochez pour un rôle donné :

| Module à masquer | Permission à retirer |
|-----------------|---------------------|
| Situations | `sales.situations.view` |
| Récapitulatifs | `sales.recaps.view` |
| Attachements | `sales.attachments.view` |
| Notes de débit | `purchases.debit-notes.view` |
| Transferts de stock | `inventory.transfers.view` |
| Mouvements de stock | `inventory.movements.view` |
| Prêts | `finance.loans.view` |
| Rapports custom | `pro.rapports.view` |
| Factures récurrentes | `pro.recurring-invoices.view` |
| Rappels de paiement | `pro.invoice-reminders.view` |
| Branches | `pro.branches.view` |
| Tickets support | `support.tickets.view` |

### Option 2 — Retirer des liens de la sidebar

Commenter les lignes dans `resources/views/backoffice/layout/partials/sidebar.blade.php` :

```blade
{{-- Exemple : retirer Situations et Récapitulatifs --}}
{{-- <li><a href="{{ route('bo.sales.situations.index') }}">Situation</a></li> --}}
{{-- <li><a href="{{ route('bo.sales.recaps.index') }}">Récap</a></li> --}}
```

### Option 3 — Retirer les boutons d'export

Pour masquer les boutons d'export (PDF/Excel/CSV) sur une page :

```blade
{{-- @include('backoffice.components.export-dropdown', ['exportType' => 'invoices']) --}}
```

Localiser tous les exports :
```bash
grep -r "export-dropdown" resources/views/backoffice/
```

### Option 4 — Désactiver un module entier via les routes

Si un module entier n'est pas utilisé, commenter son groupe dans le fichier de routes. Les URLs retournent 404 sans toucher la DB.

```php
// routes/backoffice/finance.php
// Route::resource('loans', LoanController::class); // ← commenter pour désactiver
```

### Décision rapide — garder ou retirer ?

| Module | Garder si... | Retirer si... |
|--------|-------------|---------------|
| Devis | Vous faites des devis avant de facturer | Vous facturez directement |
| Situations / Récaps | Secteur BTP / projets | Autre secteur |
| Avoirs | Vous remboursez des clients | — |
| Achats complets | Vous gérez des fournisseurs | Prestataire solo sans achats |
| Inventaire | Vous gérez du stock physique | Services purs (pas de produits) |
| Transferts de stock | Plusieurs entrepôts | Un seul entrepôt |
| Prêts | Vous suivez des emprunts | — |
| Branches | Plusieurs agences/points de vente | Une seule entité |
| Factures récurrentes | Abonnements ou contrats clients | Facturation ponctuelle |
| Rapports custom | Besoin de rapports personnalisés | Rapports standard suffisent |

---

## 🔑 Rôles & Permissions

### Rôles par défaut

| Rôle | Description |
|------|-------------|
| `owner` | Propriétaire du compte — accès total |
| `admin` | Administrateur — presque tout sauf billing |
| `manager` | Manager — accès opérationnel |
| `accountant` | Comptable — lecture + finance |
| `employee` | Employé — accès limité |

> Les rôles `owner` et `admin` contournent toutes les policies via `Gate::before`. Inutile de leur assigner des permissions manuellement.

### Convention des permissions

```
{module}.{entité}.{action}

Exemples :
  sales.invoices.view / create / edit / delete
  purchases.suppliers.view
  inventory.warehouses.create
  crm.customers.edit
  pro.recurring-invoices.view
```

---

## 🚢 Déploiement en production

### Checklist

```bash
# .env obligatoire
APP_ENV=production
APP_DEBUG=false          # NE JAMAIS laisser true en prod

# Après chaque déploiement
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev
php artisan storage:link
```

### Multi-tenancy en production

- Configurer un wildcard DNS : `*.votre-domaine.com` → votre serveur
- Chaque tenant est identifié par son sous-domaine via `IdentifyTenantByDomain`
- Sous-domaine inconnu → `abort(404)` automatique

### Règles de sécurité

- Les suppressions de factures/paiements utilisent `SoftDeletes` — les données ne sont **jamais** réellement effacées
- `DocumentNumberService` utilise `lockForUpdate()` pour la numérotation séquentielle — **ne jamais modifier cette logique**
- Ne jamais committer `.env` dans git

---

## ⚠️ Colonnes DB — pièges courants

| Modèle | FAUX | CORRECT |
|--------|------|---------|
| Customer | `customer_type` | `type` |
| Customer | `currency_id` | `currency` |
| CustomerAddress | `address_line1` | `line1` |
| CustomerAddress | `state` | `region` |
| DocumentNumberSequence | `document_type` | `key` |
| DocumentNumberSequence | `current_number` | `next_number` |
| Plan interval | `monthly`/`yearly` | `month`/`year` |
| SubscriptionInvoice | `completed` | `succeeded` |
| BankAccount type | `checking` | `current` |
| StockTransfer status | `pending` | `draft` |

---

## ⚡ Commandes essentielles

```bash
# Vider tous les caches (obligatoire après changement de config/routes)
php artisan config:cache && php artisan route:cache && php artisan view:cache

# Développement — vider les caches
php artisan cache:clear && php artisan config:clear && php artisan view:clear

# Migrations
php artisan migrate
php artisan migrate --seed

# Regénérer les permissions
php artisan db:seed --class=PermissionSeeder

# Tests
php artisan test

# Storage link (uploads)
php artisan storage:link
```

---

## 📜 Licence

© 2026 **Hssabek** — Tous droits réservés.

---

<div align="center">

**Fait avec ❤️ au Maroc**

</div>
