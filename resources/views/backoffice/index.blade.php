<?php $page = 'bo-dashboard'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Accueil')
@section('description', 'Page d'accueil du backoffice')

@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Company Dashboard</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Welcome to your company dashboard, {{ auth()->user()->name }}!</p>
                            <p>This is your tenant workspace. Here you can manage your business operations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
