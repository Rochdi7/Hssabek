<?php

namespace App\Console\Commands;

use App\Events\SubscriptionExpired;
use App\Models\Billing\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckExpiredSubscriptionsCommand extends Command
{
    protected $signature = 'subscription:check-expired';

    protected $description = 'Vérifie et marque les abonnements expirés';

    public function handle(): int
    {
        $this->info('Vérification des abonnements expirés...');

        $expired = Subscription::where('status', 'active')
            ->whereNotNull('ends_at')
            ->where('ends_at', '<', now())
            ->get();

        if ($expired->isEmpty()) {
            $this->info('Aucun abonnement expiré.');
            return self::SUCCESS;
        }

        $count = 0;

        foreach ($expired as $subscription) {
            try {
                $subscription->update(['status' => 'expired']);
                $count++;

                SubscriptionExpired::dispatch($subscription);

                Log::info("Abonnement {$subscription->id} expiré pour le tenant {$subscription->tenant_id}");
            } catch (\Throwable $e) {
                Log::error("Erreur expiration abonnement {$subscription->id}", [
                    'error' => $e->getMessage(),
                ]);
                $this->error("Erreur abonnement {$subscription->id}: {$e->getMessage()}");
            }
        }

        $this->info("Terminé : {$count} abonnement(s) marqué(s) comme expiré(s).");

        return self::SUCCESS;
    }
}
