<?php

namespace App\Listeners;

use App\Events\SubscriptionExpired;
use Illuminate\Support\Facades\Log;

class HandleSubscriptionExpired
{
    public function handle(SubscriptionExpired $event): void
    {
        $subscription = $event->subscription;

        Log::info('Abonnement expiré', [
            'subscription_id' => $subscription->id,
            'tenant_id'       => $subscription->tenant_id,
            'plan_id'         => $subscription->plan_id,
            'ends_at'         => $subscription->ends_at,
        ]);
    }
}
