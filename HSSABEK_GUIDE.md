# Guide Hssabek SaaS — Comprendre votre système de facturation

Ce document explique tous les modèles (entités) du système, leurs statuts, et comment ils interagissent entre eux.

---

## Table des matières

1. [Vue d'ensemble](#1-vue-densemble)
2. [VENTES (côté client)](#2-ventes-côté-client)
   - [Devis (Quote)](#21-devis-quote)
   - [Facture (Invoice)](#22-facture-invoice)
   - [Avoir (Credit Note)](#23-avoir-credit-note)
   - [Bon de livraison (Delivery Challan)](#24-bon-de-livraison-delivery-challan)
   - [Paiement client (Payment)](#25-paiement-client-payment)
3. [ACHATS (côté fournisseur)](#3-achats-côté-fournisseur)
   - [Bon de commande (Purchase Order)](#31-bon-de-commande-purchase-order)
   - [Bon de réception (Goods Receipt)](#32-bon-de-réception-goods-receipt)
   - [Facture fournisseur (Vendor Bill)](#33-facture-fournisseur-vendor-bill)
   - [Note de débit (Debit Note)](#34-note-de-débit-debit-note)
   - [Paiement fournisseur (Supplier Payment)](#35-paiement-fournisseur-supplier-payment)
4. [STOCK & INVENTAIRE](#4-stock--inventaire)
   - [Produit (Product)](#41-produit-product)
   - [Entrepôt (Warehouse)](#42-entrepôt-warehouse)
   - [Transfert de stock (Stock Transfer)](#43-transfert-de-stock-stock-transfer)
5. [CATALOGUE](#5-catalogue)
   - [Taxe (Tax Category)](#51-taxe-tax-category)
   - [Unité de mesure (Unit)](#52-unité-de-mesure-unit)
   - [Catégorie produit](#53-catégorie-produit)
6. [CLIENTS & FOURNISSEURS](#6-clients--fournisseurs)
7. [FINANCES](#7-finances)
   - [Dépense (Expense)](#71-dépense-expense)
   - [Virement (Money Transfer)](#72-virement-money-transfer)
   - [Prêt (Loan)](#73-prêt-loan)
8. [SYSTÈME & ABONNEMENT](#8-système--abonnement)
9. [Flux complets](#9-flux-complets)
10. [Ce qui compte dans le chiffre d'affaires](#10-ce-qui-compte-dans-le-chiffre-daffaires)

---

## 1. Vue d'ensemble

Hssabek est un SaaS **multi-tenant** : chaque entreprise (tenant) a ses propres données isolées.
Le système couvre deux cycles principaux :

```
CYCLE VENTES      Client → Devis → Facture → Paiement reçu
CYCLE ACHATS      Fournisseur → Bon commande → Réception → Facture fournisseur → Paiement envoyé
```

---

## 2. VENTES (côté client)

### 2.1 Devis (Quote)

> **C'est quoi ?** Une proposition de prix envoyée au client. Pas encore du revenu.

**Statuts :**

| Statut | Signification | Impact CA |
|--------|--------------|-----------|
| `draft` | Brouillon, pas encore envoyé | ❌ Aucun |
| `sent` | Envoyé au client, en attente de réponse | ❌ Aucun |
| `accepted` | Le client a dit OUI | ❌ Aucun — il faut convertir en facture |
| `rejected` | Le client a dit NON | ❌ Aucun |
| `expired` | Date de validité dépassée | ❌ Aucun |
| `cancelled` | Annulé avant envoi | ❌ Aucun |

**⚠ Important :** Un devis `accepted` ne génère AUCUN revenu. Il faut obligatoirement le **convertir en facture**.

**Ce modèle couvre aussi :**
- Attachements (pièces jointes commerciales)
- Situations (états d'avancement de travaux)
- Récapitulatifs (récaps de chantier)

Tous partagent les mêmes statuts via le champ `document_type`.

**Flux typique :**
```
draft → sent → accepted → [Convertir en Facture] → Facture créée automatiquement
                ↓
             rejected / expired / cancelled  (fin du cycle)
```

---

### 2.2 Facture (Invoice)

> **C'est quoi ?** Le document légal de vente. C'est ICI que commence le revenu.

**Statuts :**

| Statut | Signification | Impact CA |
|--------|--------------|-----------|
| `draft` | Brouillon, pas encore émise | ✅ Comptée dans CA |
| `sent` | Envoyée au client, paiement attendu | ✅ Comptée dans CA |
| `partial` | Partiellement payée | ✅ Comptée dans CA |
| `paid` | Entièrement payée | ✅ Comptée dans CA + Encaissé |
| `overdue` | Date d'échéance dépassée, impayée | ✅ Comptée dans CA |
| `void` | Invalidée après émission | ❌ Exclue du CA |

**❓ Différence `void` vs suppression :**
- On ne supprime JAMAIS une facture émise (illégal au Maroc — DGI)
- `void` = la facture existe et reste visible dans l'historique, mais son montant = 0 pour les calculs
- Si erreur après envoi → passer en `void` + créer une nouvelle facture corrigée
- Si le client a déjà payé → émettre un **Avoir** à la place

**Flux typique :**
```
draft → sent → partial → paid        (paiement progressif)
             → paid                  (paiement direct)
             → overdue               (automatique si date dépassée)
             → void                  (annulation après émission)
```

---

### 2.3 Avoir (Credit Note)

> **C'est quoi ?** Un remboursement partiel ou total d'une facture déjà payée. C'est l'annulation commerciale d'une facture.

**Statuts :**

| Statut | Signification |
|--------|--------------|
| `draft` | Brouillon, pas encore émis |
| `issued` | Émis et envoyé au client |
| `applied` | Déduit d'une autre facture du même client |
| `void` | Annulé/invalidé |

**Quand l'utiliser :**
- Retour de marchandise
- Erreur de prix sur une facture déjà payée
- Remise accordée après facturation

**⚠ Ne pas confondre avec :**
- `void` sur facture = on n'a pas encore encaissé
- Avoir = on a déjà encaissé et on rembourse

---

### 2.4 Bon de livraison (Delivery Challan)

> **C'est quoi ?** Le document qui accompagne la marchandise lors de la livraison.

**Statuts :**

| Statut | Signification |
|--------|--------------|
| `draft` | Préparé, pas encore sorti |
| `issued` | Bon créé et prêt |
| `delivered` | Livraison effectuée |
| `cancelled` | Livraison annulée |

**Lien avec la facture :** Un bon de livraison peut être lié à une facture ou un devis. Il prouve la livraison physique.

---

### 2.5 Paiement client (Payment)

> **C'est quoi ?** L'enregistrement d'un paiement reçu d'un client, lié à une ou plusieurs factures.

**Statuts :**

| Statut | Signification |
|--------|--------------|
| `pending` | Paiement en attente de confirmation |
| `succeeded` | Paiement confirmé et reçu |
| `failed` | Paiement échoué |
| `refunded` | Remboursé au client |
| `cancelled` | Annulé avant traitement |

**Remboursement (Refund) :** Si un paiement `succeeded` doit être remboursé, un **Refund** est créé avec ses propres statuts (`pending`, `succeeded`, `failed`).

---

## 3. ACHATS (côté fournisseur)

### 3.1 Bon de commande (Purchase Order)

> **C'est quoi ?** La commande envoyée à votre fournisseur.

**Statuts :**

| Statut | Signification |
|--------|--------------|
| `draft` | En préparation |
| `sent` | Envoyé au fournisseur |
| `confirmed` | Fournisseur a confirmé la commande |
| `partially_received` | Une partie des articles est arrivée |
| `received` | Tout est arrivé |
| `cancelled` | Commande annulée |

---

### 3.2 Bon de réception (Goods Receipt)

> **C'est quoi ?** La confirmation que vous avez physiquement reçu les marchandises commandées.

**Statuts :**

| Statut | Signification |
|--------|--------------|
| `draft` | En cours de vérification |
| `received` | Réception validée — le stock est mis à jour |
| `cancelled` | Réception annulée |

**⚠ Important :** C'est la validation du bon de réception qui **met à jour le stock** dans les entrepôts.

---

### 3.3 Facture fournisseur (Vendor Bill)

> **C'est quoi ?** La facture que votre fournisseur vous envoie — c'est une dépense.

**Statuts :**

| Statut | Signification |
|--------|--------------|
| `draft` | Reçue, pas encore validée |
| `posted` | Validée et comptabilisée |
| `paid` | Entièrement payée |
| `void` | Invalidée (même logique que les factures ventes) |

---

### 3.4 Note de débit (Debit Note)

> **C'est quoi ?** L'équivalent d'un avoir mais côté achats. Vous la créez quand vous renvoyez des marchandises à un fournisseur ou qu'il vous doit un remboursement.

**Statuts :**

| Statut | Signification |
|--------|--------------|
| `draft` | En préparation |
| `issued` | Envoyée au fournisseur |
| `applied` | Déduite d'une facture fournisseur |
| `void` | Annulée |

---

### 3.5 Paiement fournisseur (Supplier Payment)

> **C'est quoi ?** L'enregistrement d'un paiement que vous avez effectué vers un fournisseur.

**Statuts :** identiques aux paiements clients (`pending`, `succeeded`, `failed`, `refunded`, `cancelled`).

---

## 4. STOCK & INVENTAIRE

### 4.1 Produit (Product)

> **C'est quoi ?** Un article ou service que vous vendez ou achetez.

Chaque produit a un stock suivi par entrepôt via **ProductStock**. Chaque mouvement (entrée/sortie) est enregistré dans **StockMovement** avec la raison : vente, achat, transfert, ajustement.

---

### 4.2 Entrepôt (Warehouse)

> **C'est quoi ?** Un lieu physique de stockage. Vous pouvez avoir plusieurs entrepôts.

Le premier entrepôt est créé automatiquement lors du wizard de configuration.

---

### 4.3 Transfert de stock (Stock Transfer)

> **C'est quoi ?** Déplacement de marchandises entre deux entrepôts.

**Statuts :**

| Statut | Signification |
|--------|--------------|
| `draft` | Transfert préparé, pas encore parti |
| `in_transit` | Marchandises en route |
| `received` | Reçues dans l'entrepôt destination — stock mis à jour |
| `cancelled` | Transfert annulé |

---

## 5. CATALOGUE

### 5.1 Taxe (Tax Category)

> Taux de TVA configurables (ex: 20%, 10%, 7%, 0%). Chaque ligne de facture peut avoir sa propre taxe.

### 5.2 Unité de mesure (Unit)

> Unités utilisées sur les lignes de documents (ex: kg, litre, heure, pièce, m²).

### 5.3 Catégorie produit

> Classification de vos produits/services pour les rapports et filtres.

---

## 6. CLIENTS & FOURNISSEURS

### Client (Customer)

**Statuts :** `active` / `inactive`

Un client inactif n'apparaît plus dans les listes de sélection mais ses données et factures sont conservées.

Chaque client peut avoir :
- Plusieurs **adresses** (livraison, facturation)
- Plusieurs **contacts** (interlocuteurs)

### Fournisseur (Supplier)

Même logique que le client mais côté achats. Statuts : `active` / `inactive`.

---

## 7. FINANCES

### 7.1 Dépense (Expense)

> **C'est quoi ?** Une charge directe non liée à un fournisseur (loyer, téléphone, frais divers).

**Statut paiement :**

| Statut | Signification |
|--------|--------------|
| `unpaid` | Dépense enregistrée, pas encore payée |
| `partial` | Partiellement payée |
| `paid` | Entièrement payée |

---

### 7.2 Virement (Money Transfer)

> **C'est quoi ?** Un transfert entre deux de vos comptes bancaires internes.

**Statuts :** `pending` / `completed` / `cancelled`

---

### 7.3 Prêt (Loan)

> **C'est quoi ?** Un emprunt contracté (banque, associé). Les remboursements sont suivis par **échéances (Loan Installments)**.

**Statuts prêt :** `active` / `closed` / `defaulted`

**Statuts échéance :**

| Statut | Signification |
|--------|--------------|
| `pending` | À rembourser |
| `partial` | Partiellement remboursée |
| `paid` | Remboursée |
| `overdue` | En retard |

---

## 8. SYSTÈME & ABONNEMENT

### Abonnement (Subscription)

Géré par le SuperAdmin. Chaque tenant a un abonnement à un Plan.

**Statuts :** `trialing` / `active` / `past_due` / `cancelled`

Sans abonnement `active` ou `trialing`, l'accès au backoffice est bloqué.

### Modèles de documents (Template Catalog)

- **Gratuits (`is_free = true`) :** accessibles à tous les tenants automatiquement
- **Payants :** achat requis via WhatsApp → débloquez dans `tenant_templates`

Le modèle actif par document est sauvegardé dans `tenant_settings.invoice_settings.pdf_templates`.
Si aucun n'est sélectionné, le **Modèle 1 (default)** est utilisé automatiquement.

### Tickets de support (Support Tickets)

**Statuts :** `open` / `in_progress` / `on_hold` / `resolved` / `closed`

---

## 9. Flux complets

### Cycle de vente complet

```
[Client créé]
      ↓
[Devis créé] → draft → sent → accepted
                                  ↓
                         [Convertir en Facture]
                                  ↓
                    [Facture] → draft → sent → overdue
                                          ↓
                                       partial → paid ✅
                                          ↓
                              [Paiement enregistré]
                                          ↓
                                 [Bon de livraison émis]
```

### Cycle d'achat complet

```
[Fournisseur créé]
      ↓
[Bon de commande] → draft → sent → confirmed
                                        ↓
                            [Bon de réception] → received
                                        ↓      (stock mis à jour)
                            [Facture fournisseur] → posted → paid ✅
                                        ↓
                            [Paiement fournisseur enregistré]
```

---

## 10. Ce qui compte dans le chiffre d'affaires

**Règle d'or : seules les FACTURES comptent.**

| Document | Compté dans CA ? | Remarque |
|----------|-----------------|----------|
| Devis (tous statuts) | ❌ Non | Même si `accepted` |
| Facture `draft` | ✅ Oui | Dès création |
| Facture `sent` | ✅ Oui | |
| Facture `partial` | ✅ Oui | |
| Facture `paid` | ✅ Oui | + Comptée dans "Encaissé" |
| Facture `overdue` | ✅ Oui | |
| Facture `void` | ❌ Non | Exclue |
| Avoir | ❌ Non (direct) | Déduit du CA via imputation |
| Bon de livraison | ❌ Non | Document logistique |
| Paiement reçu | ❌ Non (direct) | Mis à jour `amount_paid` sur la facture |

**"Encaissé" (collected) =** Somme des factures avec `status = paid`

**"Impayé en cours (outstanding)" =** Somme des factures avec `status IN (sent, partial, overdue)`

**"Dépenses" =** Vendor Bills + Expenses (séparés du CA)

---

*Document généré pour Hssabek SaaS — Mise à jour : {{ date('Y') }}*
