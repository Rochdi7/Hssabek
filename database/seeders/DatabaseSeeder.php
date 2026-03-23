<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            // 1) Plans d'abonnement (Free, Starter, Pro, Enterprise)
            PlanSeeder::class,

            // 2) Permissions (~120 chaînes de permissions)
            PermissionSeeder::class,

            // 3) Rôles (super_admin + templates de rôles globaux)
            RoleSeeder::class,

            // 4) Catalogue de templates (modèles globaux)
            TemplateCatalogSeeder::class,

            // 5) Catégories financières pour tous les tenants
            FinanceCategorySeeder::class,

            // 6) Données de production par défaut (unités, méthodes de paiement, TVA, séquences, devises, entrepôt)
            TenantDefaultsSeeder::class,

            // 7) Tenant de démonstration + Super Admin
            DemoTenantSeeder::class,
        ]);
    }
}
