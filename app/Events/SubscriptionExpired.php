<?php

namespace App\Events;

use App\Models\Billing\Subscription;
use Illuminate\Foundation\Events\Dispatchable;

class SubscriptionExpired
{
    use Dispatchable;

    public function __construct(
        public readonly Subscription $subscription,
    ) {}
}
