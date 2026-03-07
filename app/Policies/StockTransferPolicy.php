<?php

namespace App\Policies;

use App\Models\Inventory\StockTransfer;
use App\Models\User;

class StockTransferPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('inventory.stock_movements.view');
    }

    public function view(User $user, StockTransfer $transfer): bool
    {
        return $user->can('inventory.stock_movements.view')
            && $this->belongsToTenant($transfer);
    }

    public function create(User $user): bool
    {
        return $user->can('inventory.stock_movements.create');
    }

    public function update(User $user, StockTransfer $transfer): bool
    {
        return $user->can('inventory.stock_movements.edit')
            && $this->belongsToTenant($transfer);
    }

    public function delete(User $user, StockTransfer $transfer): bool
    {
        return $user->can('inventory.stock_movements.delete')
            && $this->belongsToTenant($transfer);
    }
}
