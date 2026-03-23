<?php $page = 'notifications-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Notifications')
@section('description', 'Gérer les préférences de notification')
@section('content')
    <!-- ========================
                    Start Page Content
                ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- start row  -->
            <div class="row justify-content-center mb-3">
                <div class="col-lg-12">
                    <!-- start row  -->
                    <div class="row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3 pb-3 border-bottom">
                                <h6 class="fw-bold mb-0">{{ __('Notifications') }}</h6>
                            </div>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="{{ __('Fermer') }}"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="{{ __('Fermer') }}"></button>
                                </div>
                            @endif

                            <form action="{{ route('bo.settings.notifications.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Section 1: Notifications generales --}}
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-notification"></i></span>
                                            {{ __('Notifications générales') }}
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="general_enabled"
                                                value="1"
                                                {{ old('general_enabled', $settings->notification_settings['general']['enabled'] ?? true) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="table-responsive table-nowrap notification-table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="fs-14">{{ __('Modules') }} </th>
                                                        <th class="fs-14">{{ __('Email') }}</th>
                                                        <th class="fs-14">{{ __('SMS') }}</th>
                                                        <th class="fs-14">{{ __('In App') }}</th>
                                                        <th class="fs-14">{{ __('Whatsapp') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fs-13 fw-medium mb-1">{{ __('Mises à jour système') }}</h6>
                                                            <p class="fs-12">{{ __('Recevez des alertes pour les mises à jour logicielles et la maintenance.') }}</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="general[system_updates][email]" value="1"
                                                                {{ old('general.system_updates.email', $settings->notification_settings['general']['system_updates']['email'] ?? false) ? 'checked' : '' }}>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="general[system_updates][sms]" value="1"
                                                                {{ old('general.system_updates.sms', $settings->notification_settings['general']['system_updates']['sms'] ?? false) ? 'checked' : '' }}>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="general[system_updates][in_app]" value="1"
                                                                {{ old('general.system_updates.in_app', $settings->notification_settings['general']['system_updates']['in_app'] ?? false) ? 'checked' : '' }}>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="general[system_updates][whatsapp]" value="1"
                                                                {{ old('general.system_updates.whatsapp', $settings->notification_settings['general']['system_updates']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fs-13 fw-medium mb-1">{{ __('Alertes de sécurité') }}</h6>
                                                            <p class="fs-12">{{ __('Notifications concernant les tentatives de connexion et les changements de mot de passe.') }}</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="general[security_alerts][email]" value="1"
                                                                {{ old('general.security_alerts.email', $settings->notification_settings['general']['security_alerts']['email'] ?? false) ? 'checked' : '' }}>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="general[security_alerts][sms]" value="1"
                                                                {{ old('general.security_alerts.sms', $settings->notification_settings['general']['security_alerts']['sms'] ?? false) ? 'checked' : '' }}>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="general[security_alerts][in_app]" value="1"
                                                                {{ old('general.security_alerts.in_app', $settings->notification_settings['general']['security_alerts']['in_app'] ?? false) ? 'checked' : '' }}>
                                                        </td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="general[security_alerts][whatsapp]" value="1"
                                                                {{ old('general.security_alerts.whatsapp', $settings->notification_settings['general']['security_alerts']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                {{-- Section 2: Notifications des ventes --}}
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-shopping-cart"></i></span>
                                            {{ __('Notifications des ventes') }}
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="sales_enabled"
                                                value="1"
                                                {{ old('sales_enabled', $settings->notification_settings['sales']['enabled'] ?? true) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">{{ __('Modules') }} </th>
                                                    <th class="fs-14">{{ __('Email') }}</th>
                                                    <th class="fs-14">{{ __('SMS') }}</th>
                                                    <th class="fs-14">{{ __('In App') }}</th>
                                                    <th class="fs-14">{{ __('Whatsapp') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __('Nouvelle vente enregistrée') }}
                                                        </h6>
                                                        <p class="fs-12">{{ __("Soyez notifié lorsqu'une vente est effectuée.") }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[new_sale][email]" value="1"
                                                            {{ old('sales.new_sale.email', $settings->notification_settings['sales']['new_sale']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[new_sale][sms]" value="1"
                                                            {{ old('sales.new_sale.sms', $settings->notification_settings['sales']['new_sale']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[new_sale][in_app]" value="1"
                                                            {{ old('sales.new_sale.in_app', $settings->notification_settings['sales']['new_sale']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[new_sale][whatsapp]" value="1"
                                                            {{ old('sales.new_sale.whatsapp', $settings->notification_settings['sales']['new_sale']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __('Paiements en attente') }}</h6>
                                                        <p class="fs-12">{{ __('Alertes pour les factures en retard.') }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[pending_payments][email]" value="1"
                                                            {{ old('sales.pending_payments.email', $settings->notification_settings['sales']['pending_payments']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[pending_payments][sms]" value="1"
                                                            {{ old('sales.pending_payments.sms', $settings->notification_settings['sales']['pending_payments']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[pending_payments][in_app]" value="1"
                                                            {{ old('sales.pending_payments.in_app', $settings->notification_settings['sales']['pending_payments']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[pending_payments][whatsapp]" value="1"
                                                            {{ old('sales.pending_payments.whatsapp', $settings->notification_settings['sales']['pending_payments']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __('Transactions') }}</h6>
                                                        <p class="fs-12">{{ __("Confirmation lorsqu'un paiement est reçu.") }}
                                                        </p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[transactions][email]" value="1"
                                                            {{ old('sales.transactions.email', $settings->notification_settings['sales']['transactions']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[transactions][sms]" value="1"
                                                            {{ old('sales.transactions.sms', $settings->notification_settings['sales']['transactions']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[transactions][in_app]" value="1"
                                                            {{ old('sales.transactions.in_app', $settings->notification_settings['sales']['transactions']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="sales[transactions][whatsapp]" value="1"
                                                            {{ old('sales.transactions.whatsapp', $settings->notification_settings['sales']['transactions']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- Section 3: Notifications de factures --}}
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-notification-status"></i></span>
                                            {{ __('Notifications de factures') }}
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="invoices_enabled"
                                                value="1"
                                                {{ old('invoices_enabled', $settings->notification_settings['invoices']['enabled'] ?? true) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">{{ __('Modules') }} </th>
                                                    <th class="fs-14">{{ __('Email') }}</th>
                                                    <th class="fs-14">{{ __('SMS') }}</th>
                                                    <th class="fs-14">{{ __('In App') }}</th>
                                                    <th class="fs-14">{{ __('Whatsapp') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __('Nouvelle facture créée') }}</h6>
                                                        <p class="fs-12">{{ __("Alerte lorsqu'une nouvelle facture est générée.") }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="invoices[new_invoice][email]" value="1"
                                                            {{ old('invoices.new_invoice.email', $settings->notification_settings['invoices']['new_invoice']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="invoices[new_invoice][sms]" value="1"
                                                            {{ old('invoices.new_invoice.sms', $settings->notification_settings['invoices']['new_invoice']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="invoices[new_invoice][in_app]" value="1"
                                                            {{ old('invoices.new_invoice.in_app', $settings->notification_settings['invoices']['new_invoice']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="invoices[new_invoice][whatsapp]" value="1"
                                                            {{ old('invoices.new_invoice.whatsapp', $settings->notification_settings['invoices']['new_invoice']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __("Rappel d'échéance de facture") }}</h6>
                                                        <p class="fs-12">{{ __("Notification avant la date d'échéance de la facture.") }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="invoices[due_reminder][email]" value="1"
                                                            {{ old('invoices.due_reminder.email', $settings->notification_settings['invoices']['due_reminder']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="invoices[due_reminder][sms]" value="1"
                                                            {{ old('invoices.due_reminder.sms', $settings->notification_settings['invoices']['due_reminder']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="invoices[due_reminder][in_app]" value="1"
                                                            {{ old('invoices.due_reminder.in_app', $settings->notification_settings['invoices']['due_reminder']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="invoices[due_reminder][whatsapp]" value="1"
                                                            {{ old('invoices.due_reminder.whatsapp', $settings->notification_settings['invoices']['due_reminder']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- Section 4: Gestion des utilisateurs --}}
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-user-tag"></i></span>
                                            {{ __('Gestion des utilisateurs') }}
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="users_enabled"
                                                value="1"
                                                {{ old('users_enabled', $settings->notification_settings['users']['enabled'] ?? true) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">{{ __('Modules') }} </th>
                                                    <th class="fs-14">{{ __('Email') }}</th>
                                                    <th class="fs-14">{{ __('SMS') }}</th>
                                                    <th class="fs-14">{{ __('In App') }}</th>
                                                    <th class="fs-14">{{ __('Whatsapp') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __('Nouvel utilisateur ajouté') }}
                                                        </h6>
                                                        <p class="fs-12">{{ __("Notification lorsqu'un nouvel utilisateur est enregistré.") }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[new_user][email]" value="1"
                                                            {{ old('users.new_user.email', $settings->notification_settings['users']['new_user']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[new_user][sms]" value="1"
                                                            {{ old('users.new_user.sms', $settings->notification_settings['users']['new_user']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[new_user][in_app]" value="1"
                                                            {{ old('users.new_user.in_app', $settings->notification_settings['users']['new_user']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[new_user][whatsapp]" value="1"
                                                            {{ old('users.new_user.whatsapp', $settings->notification_settings['users']['new_user']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __('Retour des utilisateurs') }}</h6>
                                                        <p class="fs-12">{{ __('Alertes pour les commentaires ou avis reçus.') }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[user_feedback][email]" value="1"
                                                            {{ old('users.user_feedback.email', $settings->notification_settings['users']['user_feedback']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[user_feedback][sms]" value="1"
                                                            {{ old('users.user_feedback.sms', $settings->notification_settings['users']['user_feedback']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[user_feedback][in_app]" value="1"
                                                            {{ old('users.user_feedback.in_app', $settings->notification_settings['users']['user_feedback']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[user_feedback][whatsapp]" value="1"
                                                            {{ old('users.user_feedback.whatsapp', $settings->notification_settings['users']['user_feedback']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __('Changements de rôles et permissions') }}</h6>
                                                        <p class="fs-12">{{ __('Notification lorsque les rôles des utilisateurs sont mis à jour.') }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[role_changes][email]" value="1"
                                                            {{ old('users.role_changes.email', $settings->notification_settings['users']['role_changes']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[role_changes][sms]" value="1"
                                                            {{ old('users.role_changes.sms', $settings->notification_settings['users']['role_changes']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[role_changes][in_app]" value="1"
                                                            {{ old('users.role_changes.in_app', $settings->notification_settings['users']['role_changes']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[role_changes][whatsapp]" value="1"
                                                            {{ old('users.role_changes.whatsapp', $settings->notification_settings['users']['role_changes']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">{{ __('Messages directs et mentions') }}</h6>
                                                        <p class="fs-12">{{ __('Recevez des alertes lorsque vous êtes mentionné ou contacté.') }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[direct_messages][email]" value="1"
                                                            {{ old('users.direct_messages.email', $settings->notification_settings['users']['direct_messages']['email'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[direct_messages][sms]" value="1"
                                                            {{ old('users.direct_messages.sms', $settings->notification_settings['users']['direct_messages']['sms'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[direct_messages][in_app]" value="1"
                                                            {{ old('users.direct_messages.in_app', $settings->notification_settings['users']['direct_messages']['in_app'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="users[direct_messages][whatsapp]" value="1"
                                                            {{ old('users.direct_messages.whatsapp', $settings->notification_settings['users']['direct_messages']['whatsapp'] ?? false) ? 'checked' : '' }}>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- Section 5: Rappels automatiques de factures --}}
                                <div class="border-bottom mb-3 pb-2">
                                    <div class="card-title-head d-flex align-items-center justify-content-between">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-timer-1"></i></span>
                                            {{ __('Rappels automatiques de factures') }}
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                name="reminder_settings[enabled]" value="1" id="reminder_enabled"
                                                {{ old('reminder_settings.enabled', $settings->reminder_settings['enabled'] ?? false) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="reminder-settings-content" id="reminder_settings_content">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <p class="text-muted fs-12 mb-3">
                                                    {{ __("Configurez les rappels automatiques pour les factures impayées. Les rappels seront envoyés par email au client et une notification sera envoyée à votre entreprise.") }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('Rappel avant échéance') }}</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                        name="reminder_settings[before_due_days]"
                                                        value="{{ old('reminder_settings.before_due_days', $settings->reminder_settings['before_due_days'] ?? 3) }}"
                                                        min="0" max="30" placeholder="3">
                                                    <span class="input-group-text">{{ __('jours avant') }}</span>
                                                </div>
                                                <small class="text-muted">{{ __("Envoyer un rappel X jours avant la date d'échéance (0 = désactivé)") }}</small>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __("Rappel le jour d'échéance") }}</label>
                                                <div class="form-check form-switch mt-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="reminder_settings[on_due]" value="1"
                                                        {{ old('reminder_settings.on_due', $settings->reminder_settings['on_due'] ?? true) ? 'checked' : '' }}>
                                                    <label class="form-check-label">{{ __('Activer') }}</label>
                                                </div>
                                                <small class="text-muted">{{ __("Envoyer un rappel le jour de l'échéance") }}</small>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('Rappel après échéance') }}</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control"
                                                        name="reminder_settings[after_due_days]"
                                                        value="{{ old('reminder_settings.after_due_days', $settings->reminder_settings['after_due_days'] ?? 7) }}"
                                                        min="0" max="90" placeholder="7">
                                                    <span class="input-group-text">{{ __('jours après') }}</span>
                                                </div>
                                                <small class="text-muted">{{ __("Envoyer un rappel X jours après la date d'échéance (0 = désactivé)") }}</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __("Notifier l'entreprise") }}</label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="reminder_settings[notify_company]" value="1"
                                                        {{ old('reminder_settings.notify_company', $settings->reminder_settings['notify_company'] ?? true) ? 'checked' : '' }}>
                                                    <label class="form-check-label">{{ __("Recevoir une notification système quand un rappel est envoyé") }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __("Notifier l'entreprise par email") }}</label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="reminder_settings[notify_company_email]" value="1"
                                                        {{ old('reminder_settings.notify_company_email', $settings->reminder_settings['notify_company_email'] ?? false) ? 'checked' : '' }}>
                                                    <label class="form-check-label">{{ __('Recevoir une copie par email des rappels envoyés') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-0">
                                    <button type="button" class="btn btn-outline-white me-2"
                                        onclick="window.location.reload()">{{ __('Annuler') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                                </div>
                            </form>
                        </div>
                        <!-- end col  -->
                    </div>
                </div>
                <!-- end col  -->
            </div>
            <!-- end row  -->

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>

    <!-- ========================
                    End Page Content
                ========================= -->
@endsection
