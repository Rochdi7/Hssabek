<?php $page = 'sa-dashboard'; ?>
@extends('backoffice.layout.mainlayout')

@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h5 class="card-title mb-0">⭐ Super Admin Dashboard</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Welcome to the SaaS administration panel, {{ auth()->user()->name }}!</p>
                            <p>You have super administrator access to all tenants and system-wide settings.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
