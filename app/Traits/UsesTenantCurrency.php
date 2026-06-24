<?php

namespace App\Traits;

use App\Models\Finance\Currency;
use App\Services\Tenancy\TenantContext;

trait UsesTenantCurrency
{
    public function getCurrencyAttribute(): string
    {
        $code = TenantContext::get()?->default_currency ?? 'MAD';
        return Currency::where('code', $code)->value('symbol') ?? $code;
    }
}
