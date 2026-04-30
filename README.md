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

## 📜 Licence

© 2026 **Hssabek** — Tous droits réservés.

---

<div align="center">

**Fait avec ❤️ au Maroc**

</div>
