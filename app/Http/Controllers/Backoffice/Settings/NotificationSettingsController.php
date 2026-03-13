<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdateNotificationSettingsRequest;
use App\Models\Tenancy\TenantSetting;
use App\Services\Tenancy\TenantContext;

class NotificationSettingsController extends Controller
{
    public function edit()
    {
        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        return view('backoffice.settings.notifications', compact('settings'));
    }

    public function update(UpdateNotificationSettingsRequest $request)
    {
        $tenant = TenantContext::get();
        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        // Define all known checkbox keys so unchecked ones are saved as false
        $channels = ['email', 'sms', 'in_app', 'whatsapp'];

        $sections = [
            'general' => ['system_updates', 'security_alerts'],
            'sales' => ['new_sale', 'pending_payments', 'transactions'],
            'invoices' => ['new_invoice', 'due_reminder'],
            'users' => ['new_user', 'user_feedback', 'role_changes', 'direct_messages'],
        ];

        $notificationSettings = [];

        foreach ($sections as $section => $modules) {
            $notificationSettings[$section] = [
                'enabled' => (bool) $request->input("{$section}_enabled", false),
            ];

            foreach ($modules as $module) {
                foreach ($channels as $channel) {
                    $notificationSettings[$section][$module][$channel] =
                        (bool) $request->input("{$section}.{$module}.{$channel}", false);
                }
            }
        }

        $setting->notification_settings = $notificationSettings;

        // Save reminder settings
        $reminderSettings = [
            'enabled'              => (bool) $request->input('reminder_settings.enabled', false),
            'before_due_days'      => (int) $request->input('reminder_settings.before_due_days', 3),
            'on_due'               => (bool) $request->input('reminder_settings.on_due', true),
            'after_due_days'       => (int) $request->input('reminder_settings.after_due_days', 7),
            'notify_company'       => (bool) $request->input('reminder_settings.notify_company', true),
            'notify_company_email' => (bool) $request->input('reminder_settings.notify_company_email', false),
        ];

        $setting->reminder_settings = $reminderSettings;
        $setting->save();

        return redirect()->route('bo.settings.notifications.edit')
            ->with('success', __('Paramètres de notifications mis à jour avec succès.'));
    }
}
