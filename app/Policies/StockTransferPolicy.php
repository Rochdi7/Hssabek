<?php

namespace App\Policies;

use App\Models\Inventory\StockTransfer;
use App\Models\User;

class StockTransferPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('inventory.stock_transfers.view');
    }

    public function view(User $user, StockTransfer $transfer): bool
    {
        return $user->can('inventory.stock_transfers.view')
            && $this->belongsToTenant($transfer);
    }

    public function create(User $user): bool
    {
        return $user->can('inventory.stock_transfers.create');
    }

    public function update(User $user, StockTransfer $transfer): bool
    {
        return $user->can('inventory.stock_transfers.edit')
            && $this->belongsToTenant($transfer);
    }

    public function delete(User $user, StockTransfer $transfer): bool
    {
        return $user->can('inventory.stock_transfers.delete')
            && $this->belongsToTenant($transfer);
    }
}
