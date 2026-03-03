<?php $page = 'notifications-settings'; ?>
@extends('backoffice.layout.mainlayout')
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
                                <h6 class="fw-bold mb-0">Notifications</h6>
                            </div>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
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
                                            Notifications g&eacute;n&eacute;rales
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                name="general_enabled" value="1"
                                                {{ old('general_enabled', $settings->notification_settings['general']['enabled'] ?? true) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="table-responsive table-nowrap notification-table">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="fs-14">Modules </th>
                                                        <th class="fs-14">Email</th>
                                                        <th class="fs-14">SMS</th>
                                                        <th class="fs-14">In App</th>
                                                        <th class="fs-14">Whatsapp</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h6 class="fs-13 fw-medium mb-1">Mises &agrave; jour syst&egrave;me</h6>
                                                            <p class="fs-12">Recevez des alertes pour les mises &agrave; jour logicielles et la maintenance.</p>
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
                                                            <h6 class="fs-13 fw-medium mb-1">Alertes de s&eacute;curit&eacute;</h6>
                                                            <p class="fs-12">Notifications concernant les tentatives de connexion et les changements de mot de passe.</p>
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
                                            Notifications des ventes
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                name="sales_enabled" value="1"
                                                {{ old('sales_enabled', $settings->notification_settings['sales']['enabled'] ?? true) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">Modules </th>
                                                    <th class="fs-14">Email</th>
                                                    <th class="fs-14">SMS</th>
                                                    <th class="fs-14">In App</th>
                                                    <th class="fs-14">Whatsapp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">Nouvelle vente enregistr&eacute;e</h6>
                                                        <p class="fs-12">Soyez notifi&eacute; lorsqu'une vente est effectu&eacute;e.</p>
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
                                                        <h6 class="fs-13 fw-medium mb-1">Paiements en attente</h6>
                                                        <p class="fs-12">Alertes pour les factures en retard.</p>
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
                                                        <h6 class="fs-13 fw-medium mb-1">Transactions</h6>
                                                        <p class="fs-12">Confirmation lorsqu'un paiement est re&ccedil;u.</p>
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
                                            Notifications de factures
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                name="invoices_enabled" value="1"
                                                {{ old('invoices_enabled', $settings->notification_settings['invoices']['enabled'] ?? true) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">Modules </th>
                                                    <th class="fs-14">Email</th>
                                                    <th class="fs-14">SMS</th>
                                                    <th class="fs-14">In App</th>
                                                    <th class="fs-14">Whatsapp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">Nouvelle facture cr&eacute;&eacute;e</h6>
                                                        <p class="fs-12">Alerte lorsqu'une nouvelle facture est g&eacute;n&eacute;r&eacute;e.</p>
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
                                                        <h6 class="fs-13 fw-medium mb-1">Rappel d'&eacute;ch&eacute;ance de facture</h6>
                                                        <p class="fs-12">Notification avant la date d'&eacute;ch&eacute;ance de la facture.</p>
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
                                            Gestion des utilisateurs
                                        </h6>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                name="users_enabled" value="1"
                                                {{ old('users_enabled', $settings->notification_settings['users']['enabled'] ?? true) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-nowrap mb-0 notification-table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="fs-14">Modules </th>
                                                    <th class="fs-14">Email</th>
                                                    <th class="fs-14">SMS</th>
                                                    <th class="fs-14">In App</th>
                                                    <th class="fs-14">Whatsapp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="fs-13 fw-medium mb-1">Nouvel utilisateur ajout&eacute;</h6>
                                                        <p class="fs-12">Notification lorsqu'un nouvel utilisateur est enregistr&eacute;.</p>
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
                                                        <h6 class="fs-13 fw-medium mb-1">Retour des utilisateurs</h6>
                                                        <p class="fs-12">Alertes pour les commentaires ou avis re&ccedil;us.</p>
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
                                                        <h6 class="fs-13 fw-medium mb-1">Changements de r&ocirc;les et permissions</h6>
                                                        <p class="fs-12">Notification lorsque les r&ocirc;les des utilisateurs sont mis &agrave; jour.</p>
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
                                                        <h6 class="fs-13 fw-medium mb-1">Messages directs et mentions</h6>
                                                        <p class="fs-12">Recevez des alertes lorsque vous &ecirc;tes mentionn&eacute; ou contact&eacute;.</p>
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

                                <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-0">
                                    <button type="button" class="btn btn-outline-white me-2" onclick="window.location.reload()">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
