<?php

namespace App\Console\Commands;

use App\Models\Tenancy\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateSuperAdminCommand extends Command
{
    protected $signature = 'superadmin:create
                            {email : Email address of the super admin}
                            {--name= : Display name}
                            {--password= : Password (prompted if omitted)}';

    protected $description = 'Create or promote a user to super admin (tenant_id = null)';

    public function handle(): int
    {
        $email    = $this->argument('email');
        $name     = $this->option('name') ?? $this->ask('Nom complet', 'Super Administrator');
        $password = $this->option('password') ?? $this->secret('Mot de passe');

        $user = User::withTrashed()->where('email', $email)->first();

        if ($user) {
            $user->tenant_id = null;
            $user->status    = 'active';
            if ($password) {
                $user->password = Hash::make($password);
            }
            $user->save();
            $this->info("Utilisateur existant mis à jour : {$email}");
        } else {
            $user = new User();
            $user->email              = $email;
            $user->name               = $name;
            $user->password           = Hash::make($password);
            $user->tenant_id          = null;
            $user->status             = 'active';
            $user->email_verified_at  = now();
            $user->save();
            $this->info("Nouvel utilisateur super admin créé : {$email}");
        }

        $role = Role::where('name', 'super_admin')->whereNull('tenant_id')->first();

        if ($role) {
            $user->syncRoles([$role]);
            $this->info("Rôle super_admin assigné.");
        } else {
            $this->warn("Rôle super_admin introuvable — lancez php artisan db:seed --class=RoleSeeder d'abord.");
        }

        $this->table(['Champ', 'Valeur'], [
            ['Email',     $user->email],
            ['Nom',       $user->name],
            ['tenant_id', $user->tenant_id ?? 'NULL (super admin)'],
            ['Statut',    $user->status],
        ]);

        return self::SUCCESS;
    }
}
