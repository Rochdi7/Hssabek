<?php

namespace App\Policies;

use App\Models\Purchases\GoodsReceipt;
use App\Models\User;

class GoodsReceiptPolicy extends TenantPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('purchases.goods_receipts.view');
    }

    public function view(User $user, GoodsReceipt $goodsReceipt): bool
    {
        return $user->can('purchases.goods_receipts.view')
            && $this->belongsToTenant($goodsReceipt);
    }

    public function create(User $user): bool
    {
        return $user->can('purchases.goods_receipts.create');
    }

    public function update(User $user, GoodsReceipt $goodsReceipt): bool
    {
        return $user->can('purchases.goods_receipts.edit')
            && $this->belongsToTenant($goodsReceipt);
    }

    public function delete(User $user, GoodsReceipt $goodsReceipt): bool
    {
        return $user->can('purchases.goods_receipts.delete')
            && $this->belongsToTenant($goodsReceipt);
    }
}
