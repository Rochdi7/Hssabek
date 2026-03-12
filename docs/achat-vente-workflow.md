# Documentation des Workflows Achat & Vente

## Table des matières

1. [Vue d'ensemble du système](#1-vue-densemble-du-système)
2. [Workflow Achat (Purchases)](#2-workflow-achat-purchases)
3. [Workflow Vente (Sales)](#3-workflow-vente-sales)
4. [Relations entre les documents](#4-relations-entre-les-documents)
5. [Gestion du stock](#5-gestion-du-stock)
6. [Problèmes et logiques complexes](#6-problèmes-et-logiques-complexes)
7. [Recommandations](#7-recommandations)

---

## 1. Vue d'ensemble du système

### Description

Ce projet est un **SaaS de facturation multi-tenant** construit avec Laravel. Chaque tenant (entreprise) dispose de son propre espace de gestion avec :

- **Ventes** : Devis → Factures → Bons de livraison → Paiements → Avoirs
- **Achats** : Bons de commande → Réceptions → Factures fournisseur → Paiements fournisseur → Notes de débit
- **Inventaire** : Produits, Entrepôts, Mouvements de stock, Transferts inter-entrepôts
- **Finance** : Comptes bancaires, Dépenses, Revenus, Prêts

### Architecture des données

Chaque document principal (Facture, Devis, Bon de commande, etc.) suit une structure à **3 niveaux** :

| Niveau | Exemple |
|--------|---------|
| **Document parent** | `invoices`, `purchase_orders` |
| **Lignes d'articles** | `invoice_items`, `purchase_order_items` |
| **Frais additionnels** | `invoice_charges`, `quote_charges` |

### Cycle de vie des documents

Tous les documents suivent une **machine à états** avec des transitions strictes :

```
┌───────┐    ┌───────┐    ┌─────────┐    ┌──────┐
│ Draft │───→│ Sent  │───→│ Partial │───→│ Paid │
└───────┘    └───────┘    └─────────┘    └──────┘
    │            │              │
    └────────────┴──────────────┘
                 │
            ┌────▼────┐
            │  Void   │
            └─────────┘
```

---

## 2. Workflow Achat (Purchases)

### Entités impliquées

| Entité | Table | Description |
|--------|-------|-------------|
| **Fournisseur** | `suppliers` | Le partenaire commercial |
| **Bon de commande** | `purchase_orders` | La commande envoyée au fournisseur |
| **Réception de marchandises** | `goods_receipts` | Confirmation de réception physique |
| **Facture fournisseur** | `vendor_bills` | La facture reçue du fournisseur |
| **Paiement fournisseur** | `supplier_payments` | Le règlement de la facture |
| **Note de débit** | `debit_notes` | Avoir émis vers le fournisseur (retours, erreurs) |

### Flux étape par étape

```
┌──────────────────┐
│ 1. Bon de        │    Statuts : draft → sent → confirmed →
│    commande (PO) │    partially_received → received → cancelled
└────────┬─────────┘
         │ (optionnel)
         ▼
┌──────────────────┐
│ 2. Réception de  │    Statuts : draft → received → cancelled
│    marchandises  │    ⚡ Le stock est mis à jour ici (sur confirm)
└────────┬─────────┘
         │ (optionnel)
         ▼
┌──────────────────┐
│ 3. Facture       │    Statuts : draft → posted → paid → void
│    fournisseur   │
└────────┬─────────┘
         │
         ▼
┌──────────────────┐
│ 4. Paiement      │    Statuts : pending → succeeded → failed
│    fournisseur   │
└──────────────────┘
```

### Détail de chaque étape

#### Étape 1 — Bon de commande (PO)

- **Création** : L'utilisateur sélectionne un fournisseur, un entrepôt de destination, et ajoute des lignes de produits avec quantité et prix unitaire.
- **Calcul** : Le service `TaxCalculationService` calcule les sous-totaux, taxes et remises pour chaque ligne.
- **Envoi** : Le PO passe de `draft` → `sent` → `confirmed`.
- **Fichiers** :
  - Controller : `app/Http/Controllers/Backoffice/Purchases/PurchaseOrderController.php`
  - Service : `app/Services/Purchases/PurchaseOrderService.php`
  - Form Request : `app/Http/Requests/Purchases/Store/StorePurchaseOrderRequest.php`

#### Étape 2 — Réception de marchandises (Goods Receipt)

- **Création** : Peut être créée de deux façons :
  1. Via le bouton "Réceptionner" sur un bon de commande (auto-génère les lignes)
  2. Manuellement, sans lien avec un PO
- **Confirmation** : C'est le moment critique. Sur `confirm()` :
  - Le `ProductStock.quantity_on_hand` est incrémenté dans l'entrepôt concerné
  - Un `StockMovement` de type `purchase_in` est créé pour chaque ligne
  - Le `received_quantity` de chaque `PurchaseOrderItem` est mis à jour
  - Le statut du PO est recalculé (`partially_received` ou `received`)
- **Fichiers** :
  - Controller : `app/Http/Controllers/Backoffice/Purchases/GoodsReceiptController.php`
  - Service : `app/Services/Purchases/GoodsReceiptService.php`

#### Étape 3 — Facture fournisseur (Vendor Bill)

- **Création** : Peut être liée à un PO et/ou une réception, mais ce n'est **pas obligatoire**.
- **Paiement** : Les montants `amount_paid` et `amount_due` sont recalculés automatiquement à chaque allocation de paiement.
- **Auto-transition** : Quand `amount_due = 0`, le statut passe automatiquement à `paid`.
- **Fichiers** :
  - Controller : `app/Http/Controllers/Backoffice/Purchases/VendorBillController.php`
  - Service : `app/Services/Purchases/VendorBillService.php`

#### Étape 4 — Paiement fournisseur

- **Allocation** : Un paiement peut être réparti sur plusieurs factures fournisseur via `supplier_payment_allocations`.
- **Validation** : Le système vérifie qu'on ne dépasse jamais le montant dû (anti-sur-allocation).
- **Fichiers** :
  - Service : `app/Services/Purchases/SupplierPaymentService.php`

#### Document annexe — Note de débit

- Utilisée pour les retours marchandises ou corrections de prix.
- Peut être appliquée sur une ou plusieurs factures fournisseur via `debit_note_applications`.
- Réduit le `amount_due` des factures fournisseur concernées.

---

## 3. Workflow Vente (Sales)

### Entités impliquées

| Entité | Table | Description |
|--------|-------|-------------|
| **Client** | `customers` | Le client final |
| **Devis** | `quotes` | La proposition commerciale |
| **Facture** | `invoices` | Le document de facturation |
| **Bon de livraison** | `delivery_challans` | Le document de livraison |
| **Paiement** | `payments` | Le règlement du client |
| **Avoir** | `credit_notes` | Remboursement ou correction |

### Flux étape par étape

```
┌──────────────────┐
│ 1. Devis         │    Statuts : draft → sent → accepted/rejected
│    (Quote)       │    → expired → cancelled
└────────┬─────────┘
         │ (optionnel, conversion)
         ▼
┌──────────────────┐
│ 2. Facture       │    Statuts : draft → sent → partial →
│    (Invoice)     │    paid → overdue → void
└────────┬─────────┘
         │ (optionnel)               │
         ▼                           ▼
┌──────────────────┐    ┌──────────────────┐
│ 3. Bon de        │    │ 4. Paiement      │
│    livraison     │    │    client        │
│    (Delivery     │    │                  │
│     Challan)     │    └──────────────────┘
└──────────────────┘
   Statuts : draft → issued → delivered → cancelled
```

### Détail de chaque étape

#### Étape 1 — Devis (Quote)

- **Création** : L'utilisateur sélectionne un client et ajoute des lignes de produits.
- **Envoi** : Le devis peut être envoyé au client, qui l'accepte ou le refuse.
- **Conversion** : Un devis `sent` ou `accepted` peut être **converti en facture** via `QuoteService::convertToInvoice()`. Toutes les lignes et frais sont copiés automatiquement.
- **Fichiers** :
  - Controller : `app/Http/Controllers/Backoffice/Sales/QuoteController.php`
  - Service : `app/Services/Sales/QuoteService.php`

#### Étape 2 — Facture (Invoice)

- **Création** : Peut venir d'un devis converti ou être créée directement.
- **Calcul** : `TaxCalculationService` calcule sous-totaux, remises et taxes.
- **Snapshots** : Les informations de l'entreprise (`bill_from_snapshot`) et du client (`bill_to_snapshot`) sont figées au moment de la création.
- **Édition** : Seules les factures en statut `draft` peuvent être modifiées.
- **Fichiers** :
  - Controller : `app/Http/Controllers/Backoffice/Sales/InvoiceController.php`
  - Service : `app/Services/Sales/InvoiceService.php`
  - Form Request : `app/Http/Requests/Sales/Store/StoreInvoiceRequest.php`

#### Étape 3 — Bon de livraison (Delivery Challan)

- **Création** : L'utilisateur sélectionne un client et peut **optionnellement** lier une facture ou un devis existant.
- **Indépendance** : Le bon de livraison peut exister **sans facture et sans devis**. Les champs `invoice_id` et `quote_id` sont `nullable` dans la base de données.
- **Aucun impact sur le stock** : Le système ne décrémente **pas** automatiquement le stock lors de la livraison (contrairement à la réception côté achat).
- **Fichiers** :
  - Controller : `app/Http/Controllers/Backoffice/Sales/DeliveryChallanController.php`
  - Service : `app/Services/Sales/DeliveryChallanService.php`
  - Form Request : `app/Http/Requests/Sales/Store/StoreDeliveryChallanRequest.php`

#### Étape 4 — Paiement client

- **Allocation** : Un paiement peut être réparti sur plusieurs factures via `payment_allocations`.
- **Auto-transition** : Le service `InvoiceService::updatePaymentTotals()` recalcule `amount_paid` et `amount_due`, et change automatiquement le statut (`partial` → `paid`).
- **Fichiers** :
  - Service : `app/Services/Sales/PaymentService.php`

#### Document annexe — Avoir (Credit Note)

- Créé pour rembourser ou corriger une facture.
- Appliqué sur une ou plusieurs factures via `credit_note_applications`.
- Réduit le `amount_due` des factures concernées.
- **Fichiers** :
  - Service : `app/Services/Sales/CreditNoteService.php`

---

## 4. Relations entre les documents

### Schéma des relations — Vente

```
                    ┌─────────┐
                    │  Devis  │
                    │ (Quote) │
                    └────┬────┘
                         │ quote_id (nullable)
            ┌────────────┼────────────┐
            ▼            ▼            │
      ┌──────────┐  ┌──────────┐     │
      │ Facture  │  │ Bon de   │     │
      │(Invoice) │  │livraison │     │
      └────┬─────┘  │(Delivery │     │
           │        │ Challan) │     │
           │        └────┬─────┘     │
           │             │           │
           │  invoice_id │(nullable) │
           │◄────────────┘           │
           │                         │
     ┌─────┴──────┐                  │
     ▼            ▼                  │
┌─────────┐  ┌─────────┐            │
│Paiement │  │  Avoir  │            │
│(Payment)│  │(Credit  │            │
│         │  │  Note)  │            │
└─────────┘  └─────────┘            │
```

**Points clés :**
- **Devis → Facture** : Conversion automatique (copie toutes les lignes)
- **Devis → Bon de livraison** : Lien optionnel (référence seulement)
- **Facture → Bon de livraison** : Lien optionnel (le BL peut référencer une facture)
- **Facture → Paiement** : Via `payment_allocations` (N:N)
- **Facture → Avoir** : Via `credit_note_applications` (N:N)

### Schéma des relations — Achat

```
      ┌──────────────┐
      │ Bon de       │
      │ commande(PO) │
      └──────┬───────┘
             │ purchase_order_id (nullable)
      ┌──────┼──────────────┐
      ▼      ▼              ▼
┌──────────┐ ┌───────────┐ ┌───────────┐
│Réception │ │ Facture   │ │ Note de   │
│(Goods    │ │fournisseur│ │ débit     │
│ Receipt) │ │(Vendor    │ │(Debit     │
└────┬─────┘ │ Bill)     │ │ Note)     │
     │       └─────┬─────┘ └─────┬─────┘
     │             │              │
     │  goods_     │              │
     │  receipt_id │              │
     │  (nullable) │              │
     └─────────────┘              │
                    vendor_bill_id│
                    (nullable)    │
               ┌──────────────────┘
               ▼
        ┌────────────┐
        │  Paiement  │
        │fournisseur │
        └────────────┘
```

**Points clés :**
- **PO → Réception** : HasMany (un PO peut avoir plusieurs réceptions partielles)
- **PO → Facture fournisseur** : HasMany (mais le controller filtre les PO sans facture)
- **Réception → Facture fournisseur** : Lien optionnel
- **Facture fournisseur → Note de débit** : Via `debit_note_applications`

### Matrice de dépendances

| Document A | Document B | Lien obligatoire ? | Direction |
|-----------|-----------|-------------------|-----------|
| Devis | Facture | Non | Conversion optionnelle |
| Devis | Bon de livraison | Non | Référence optionnelle |
| Facture | Bon de livraison | **Non** | Référence optionnelle |
| Facture | Paiement | Non | Allocation (N:N) |
| Facture | Avoir | Non | Application (N:N) |
| PO | Réception | Non | Référence optionnelle |
| PO | Facture fournisseur | Non | Référence optionnelle |
| Réception | Facture fournisseur | Non | Référence optionnelle |
| Facture fournisseur | Paiement fournisseur | Non | Allocation (N:N) |
| Facture fournisseur | Note de débit | Non | Application (N:N) |

> **Tous les liens entre documents sont optionnels.** Aucun document ne requiert la création préalable d'un autre document.

---

## 5. Gestion du stock

### Quand le stock est-il mis à jour ?

| Action | Impact sur le stock | Type de mouvement |
|--------|--------------------|--------------------|
| **Réception confirmée** (achat) | ✅ `quantity_on_hand` augmente | `purchase_in` |
| **Transfert exécuté** | ✅ Décrémente source, incrémente destination | `transfer_out` / `transfer_in` |
| **Ajustement manuel** | ✅ Selon le type choisi | `adjustment_in` / `adjustment_out` / `stock_in` / `stock_out` |
| **Création de facture** | ❌ Aucun impact | — |
| **Création de bon de livraison** | ❌ Aucun impact | — |
| **Paiement reçu** | ❌ Aucun impact | — |

### Point important

Le système ne gère **pas** automatiquement la sortie de stock lors d'une vente. Il n'y a pas de mouvement `sale_out` déclenché automatiquement par une facture ou un bon de livraison. Les sorties de stock doivent être faites manuellement via les ajustements de stock.

---

## 6. Problèmes et logiques complexes

### 6.1 — Le bon de livraison ne nécessite PAS de facture

**Question posée** : "Pourquoi le système requiert-il parfois une facture lors de la création d'un bon de livraison ?"

**Réponse après analyse complète du code** :

Le système **ne requiert PAS** de facture pour créer un bon de livraison. Voici les preuves :

1. **Migration** (`delivery_challans` table) : `invoice_id` est `nullable`
2. **Form Request** (`StoreDeliveryChallanRequest`) : `'invoice_id' => ['nullable', ...]`
3. **Service** (`DeliveryChallanService::create()`) : `'invoice_id' => $validated['invoice_id'] ?? null`
4. **Controller** (`DeliveryChallanController::create()`) : charge la liste des factures mais ne les impose pas

**Si vous observez une obligation de créer une facture**, cela pourrait venir de :
- **L'interface utilisateur (Blade)** : Un champ marqué comme "required" dans le HTML mais pas dans la validation backend
- **Du JavaScript côté client** : Une validation côté navigateur qui n'est pas reflétée côté serveur
- **D'une confusion utilisateur** : Le formulaire affiche un champ "Facture" qui semble obligatoire visuellement

→ **Conclusion** : Ce n'est ni une règle métier ni une limitation technique du backend. Si le comportement est observé, il s'agit probablement d'un problème de **validation côté frontend** (HTML ou JavaScript).

### 6.2 — Pas de sortie de stock automatique côté vente

Le système met à jour le stock côté **achat** (via `GoodsReceiptService::confirm()`), mais pas côté **vente**. La création d'une facture ou d'un bon de livraison ne crée aucun `StockMovement` de type `sale_out`.

C'est une **lacune fonctionnelle** significative pour les entreprises qui vendent des produits physiques.

### 6.3 — Pas de lien bidirectionnel Invoice ↔ DeliveryChallan

Le modèle `Invoice` ne définit **pas** de relation `deliveryChallans()`. Le lien existe uniquement dans le sens Delivery Challan → Invoice (`belongsTo`). Cela rend difficile la consultation des bons de livraison depuis la fiche d'une facture.

### 6.4 — Snapshot vs données vivantes

Les documents utilisent des **snapshots JSON** (`bill_from_snapshot`, `bill_to_snapshot`) pour figer les informations au moment de la création. C'est une bonne pratique comptable, mais cela signifie que :
- Modifier les coordonnées d'un client ne met pas à jour les factures existantes (correct)
- Il n'y a pas de mécanisme pour "rafraîchir" un brouillon avec les données actuelles

### 6.5 — Les réceptions partielles complexifient le suivi

Un bon de commande peut avoir **plusieurs réceptions partielles**. Le suivi se fait via `received_quantity` sur chaque ligne du PO, avec un recalcul du statut global. Cette logique fonctionne mais peut devenir difficile à suivre pour l'utilisateur.

### 6.6 — Allocations de paiement N:N

Un paiement peut être alloué à plusieurs factures, et une facture peut recevoir plusieurs paiements. C'est flexible mais complexe à gérer pour l'utilisateur final.

---

## 7. Recommandations

### 7.1 — Ajouter la sortie de stock automatique côté vente

**Problème** : Le stock n'est pas décrémenté lors d'une vente.

**Solution proposée** :
- Lors du passage du bon de livraison au statut `delivered`, créer automatiquement des `StockMovement` de type `sale_out` pour chaque ligne produit (si `track_inventory = true`).
- Décrémenter `ProductStock.quantity_on_hand` dans l'entrepôt par défaut (ou un entrepôt sélectionné).
- Mettre à jour `Product.quantity` (total tous entrepôts).

### 7.2 — Ajouter la relation inverse Invoice → DeliveryChallans

```php
// Dans app/Models/Sales/Invoice.php
public function deliveryChallans(): HasMany
{
    return $this->hasMany(DeliveryChallan::class);
}
```

Cela permet d'afficher facilement les bons de livraison associés sur la page de détail d'une facture.

### 7.3 — Vérifier l'UI du bon de livraison

Si l'utilisateur observe que la facture semble "obligatoire" lors de la création d'un bon de livraison, inspecter :
1. Le fichier Blade `resources/views/backoffice/sales/delivery-challans/create.blade.php`
2. Vérifier si le champ `invoice_id` a un attribut HTML `required`
3. Vérifier le JavaScript qui pourrait bloquer la soumission

### 7.4 — Simplifier l'expérience utilisateur

Pour rendre le système plus accessible aux clients :

1. **Workflow guidé** : Ajouter des boutons d'action contextuelle :
   - Sur un devis accepté : "Convertir en facture"
   - Sur une facture : "Créer un bon de livraison"
   - Sur un PO confirmé : "Réceptionner"

2. **Tableau de bord** : Afficher les documents en attente d'action :
   - Factures non payées
   - PO en attente de réception
   - Bons de livraison en cours

3. **Indicateurs visuels** : Sur chaque document, afficher clairement les documents liés (facture liée, BL lié, paiements reçus).

### 7.5 — Ajouter un entrepôt au bon de livraison

Actuellement, le bon de livraison ne référence aucun entrepôt. Pour gérer la sortie de stock, il faudrait :
- Ajouter une colonne `warehouse_id` à la table `delivery_challans`
- Permettre à l'utilisateur de choisir depuis quel entrepôt livrer

### 7.6 — Documentation des statuts pour les utilisateurs

Créer un guide visuel des transitions de statuts pour chaque type de document, avec des explications en français, pour que les utilisateurs comprennent le cycle de vie de chaque document.

---

## Annexe — Fichiers clés par module

### Vente (Sales)

| Composant | Fichier |
|-----------|---------|
| Routes | `routes/backoffice/sales.php` |
| Factures Controller | `app/Http/Controllers/Backoffice/Sales/InvoiceController.php` |
| Factures Service | `app/Services/Sales/InvoiceService.php` |
| Devis Service | `app/Services/Sales/QuoteService.php` |
| BL Controller | `app/Http/Controllers/Backoffice/Sales/DeliveryChallanController.php` |
| BL Service | `app/Services/Sales/DeliveryChallanService.php` |
| Paiement Service | `app/Services/Sales/PaymentService.php` |
| Avoir Service | `app/Services/Sales/CreditNoteService.php` |
| Calcul taxes | `app/Services/Sales/TaxCalculationService.php` |

### Achat (Purchases)

| Composant | Fichier |
|-----------|---------|
| Routes | `routes/backoffice/purchases.php` |
| PO Controller | `app/Http/Controllers/Backoffice/Purchases/PurchaseOrderController.php` |
| PO Service | `app/Services/Purchases/PurchaseOrderService.php` |
| Réception Controller | `app/Http/Controllers/Backoffice/Purchases/GoodsReceiptController.php` |
| Réception Service | `app/Services/Purchases/GoodsReceiptService.php` |
| Facture fournisseur Controller | `app/Http/Controllers/Backoffice/Purchases/VendorBillController.php` |
| Paiement fournisseur Service | `app/Services/Purchases/SupplierPaymentService.php` |

### Inventaire

| Composant | Fichier |
|-----------|---------|
| Routes | `routes/backoffice/inventory.php` |
| Stock Service | `app/Services/Inventory/StockService.php` |
| Mouvement Controller | `app/Http/Controllers/Backoffice/Inventory/StockMovementController.php` |
| Transfert Controller | `app/Http/Controllers/Backoffice/Inventory/StockTransferController.php` |
