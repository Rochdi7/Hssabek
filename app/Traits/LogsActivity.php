<?php

namespace App\Traits;

use App\Models\System\ActivityLog;
use App\Services\Tenancy\TenantContext;

/**
 * Trait for models that should log activity (created, updated, deleted).
 *
 * Automatically writes to the activity_logs table on model events.
 * Requires the model to have a tenant_id attribute (or use BelongsToTenant).
 */
trait LogsActivity
{
    public static function bootLogsActivity(): void
    {
        static::created(function ($model) {
            static::logActivity($model, 'created');
        });

        static::updated(function ($model) {
            static::logActivity($model, 'updated');
        });

        static::deleted(function ($model) {
            static::logActivity($model, 'deleted');
        });
    }

    protected static function logActivity($model, string $action): void
    {
        try {
            $tenantId = $model->tenant_id ?? TenantContext::id();

            if ($tenantId === null) {
                return;
            }

            $properties = [];

            if ($action === 'created') {
                $properties['attributes'] = $model->getAttributes();
            } elseif ($action === 'updated') {
                $properties['old'] = $model->getOriginal();
                $properties['attributes'] = $model->getChanges();
            } elseif ($action === 'deleted') {
                $properties['old'] = $model->getOriginal();
            }

            // Remove sensitive fields
            $hidden = ['password', 'remember_token', 'two_factor_secret', 'two_factor_recovery_codes'];
            foreach ($hidden as $field) {
                unset($properties['attributes'][$field], $properties['old'][$field]);
            }

            $user = auth()->hasUser() ? auth()->user() : null;

            ActivityLog::forceCreate([
                'tenant_id' => $tenantId,
                'user_id' => $user?->id,
                'action' => $action,
                'subject_type' => get_class($model),
                'subject_id' => $model->getKey(),
                'properties' => $properties ?: null,
                'ip' => request()?->ip(),
                'user_agent' => request()?->userAgent(),
                'created_at' => now(),
            ]);
        } catch (\Throwable $e) {
            // Silently fail — logging should never break the main operation
            report($e);
        }
    }

    /**
     * Override in model to customize which actions are logged.
     */
    public static function activityLogActions(): array
    {
        return ['created', 'updated', 'deleted'];
    }
}
