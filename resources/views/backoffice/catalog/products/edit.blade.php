<?php $page = 'edit-product'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                        Start Page Content
                    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row -->
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.catalog.products.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Produits</a></h6>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('bo.catalog.products.update', $product) }}" method="POST"
                            enctype="multipart/form-data" id="product-form">
                            @csrf
                            @method('PUT')

                            {{-- ═══════════════════════════════════════════════
                                 SECTION 1: Type d'article (Product / Service)
                                 ═══════════════════════════════════════════════ --}}
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="mb-3">Type d'article</h6>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('item_type') is-invalid @enderror"
                                                type="radio" name="item_type" id="item-type-product" value="product"
                                                {{ old('item_type', $product->item_type) === 'product' ? 'checked' : '' }}>
                                            <label class="form-check-label fw-medium" for="item-type-product">
                                                <i class="isax isax-box-15 me-1"></i> Produit
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('item_type') is-invalid @enderror"
                                                type="radio" name="item_type" id="item-type-service" value="service"
                                                {{ old('item_type', $product->item_type) === 'service' ? 'checked' : '' }}>
                                            <label class="form-check-label fw-medium" for="item-type-service">
                                                <i class="isax isax-setting-25 me-1"></i> Service
                                            </label>
                                        </div>
                                    </div>
                                    @error('item_type')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- ═══════════════════════════════════════════════
                                 SECTION 2: Informations de base
                                 ═══════════════════════════════════════════════ --}}
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="mb-3">Informations de base</h6>
                                    <div class="mb-3">
                                        <span class="text-gray-9 fw-bold mb-2 d-flex">Image</span>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xxl border border-dashed bg-light me-3 flex-shrink-0">
                                                @if ($product->getFirstMediaUrl('product_image'))
                                                    <div class="position-relative d-flex align-items-center">
                                                        <img src="{{ $product->getFirstMediaUrl('product_image') }}"
                                                            class="avatar avatar-xl" alt="{{ $product->name }}">
                                                    </div>
                                                @else
                                                    <i class="isax isax-image text-primary fs-24"></i>
                                                @endif
                                            </div>
                                            <div class="d-inline-flex flex-column align-items-start">
                                                <div class="drag-upload-btn btn btn-sm btn-primary position-relative mb-2">
                                                    <i class="isax isax-image me-1"></i>Téléverser une image
                                                    <input type="file" class="form-control image-sign"
                                                        name="product_image" accept="image/jpeg,image/png">
                                                </div>
                                                <span class="text-gray-9 fs-12">Format JPG ou PNG, max 5 Mo.</span>
                                            </div>
                                        </div>
                                        @error('product_image')
                                            <div class="text-danger fs-12 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nom<span class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name', $product->name) }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Code<span
                                                        class="text-danger ms-1">*</span></label>
                                                <div class="position-relative">
                                                    <input type="text"
                                                        class="form-control @error('code') is-invalid @enderror"
                                                        name="code" value="{{ old('code', $product->code) }}">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm btn-dark position-absolute end-0 top-0 bottom-0 mx-2 my-1 d-inline-flex align-items-center btn-generate-code">Générer</a>
                                                </div>
                                                @error('code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">SKU</label>
                                                <div class="input-group">
                                                    <input type="text" id="product-sku"
                                                        class="form-control @error('sku') is-invalid @enderror" name="sku"
                                                        value="{{ old('sku', $product->sku) }}">
                                                    <button class="btn btn-outline-primary" type="button" id="btn-generate-sku"
                                                        title="Générer depuis le nom">
                                                        <i class="isax isax-refresh"></i>
                                                    </button>
                                                    @error('sku')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Catégorie</label>
                                                <select class="form-select @error('category_id') is-invalid @enderror"
                                                    name="category_id">
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Unité</label>
                                                <select class="form-select @error('unit_id') is-invalid @enderror"
                                                    name="unit_id">
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}"
                                                            {{ old('unit_id', $product->unit_id) == $unit->id ? 'selected' : '' }}>
                                                            {{ $unit->name }} ({{ $unit->short_name }})</option>
                                                    @endforeach
                                                </select>
                                                @error('unit_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Taxe</label>
                                                <select class="form-select @error('tax_category_id') is-invalid @enderror"
                                                    name="tax_category_id">
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach ($taxCategories as $taxCategory)
                                                        <option value="{{ $taxCategory->id }}"
                                                            {{ old('tax_category_id', $product->tax_category_id) == $taxCategory->id ? 'selected' : '' }}>
                                                            {{ $taxCategory->name }} ({{ $taxCategory->rate }}%)</option>
                                                    @endforeach
                                                </select>
                                                @error('tax_category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ═══════════════════════════════════════════════
                                 SECTION 3: Tarification
                                 ═══════════════════════════════════════════════ --}}
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="mb-3">Tarification</h6>
                                    <div class="row gx-3">
                                        {{-- Service-only: Billing Type --}}
                                        <div class="col-lg-4 col-md-6 service-field"
                                            style="{{ old('item_type', $product->item_type) === 'product' ? 'display:none' : '' }}">
                                            <div class="mb-3">
                                                <label class="form-label">Type de facturation<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('billing_type') is-invalid @enderror"
                                                    name="billing_type">
                                                    <option value="one_time"
                                                        {{ old('billing_type', $product->billing_type) === 'one_time' ? 'selected' : '' }}>
                                                        Unique (forfait)</option>
                                                    <option value="hourly"
                                                        {{ old('billing_type', $product->billing_type) === 'hourly' ? 'selected' : '' }}>
                                                        À l'heure</option>
                                                    <option value="daily"
                                                        {{ old('billing_type', $product->billing_type) === 'daily' ? 'selected' : '' }}>
                                                        À la journée</option>
                                                    <option value="weekly"
                                                        {{ old('billing_type', $product->billing_type) === 'weekly' ? 'selected' : '' }}>
                                                        À la semaine</option>
                                                    <option value="monthly"
                                                        {{ old('billing_type', $product->billing_type) === 'monthly' ? 'selected' : '' }}>
                                                        Au mois</option>
                                                    <option value="yearly"
                                                        {{ old('billing_type', $product->billing_type) === 'yearly' ? 'selected' : '' }}>
                                                        À l'année</option>
                                                    <option value="per_project"
                                                        {{ old('billing_type', $product->billing_type) === 'per_project' ? 'selected' : '' }}>
                                                        Par projet</option>
                                                </select>
                                                @error('billing_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Service-only: Hourly Rate --}}
                                        @php $currentBilling = old('billing_type', $product->billing_type); @endphp
                                        <div class="col-lg-4 col-md-6 service-field hourly-field"
                                            style="{{ old('item_type', $product->item_type) === 'product' || !in_array($currentBilling, ['hourly', 'daily']) ? 'display:none' : '' }}">
                                            <div class="mb-3">
                                                <label class="form-label">Taux horaire</label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('hourly_rate') is-invalid @enderror"
                                                    name="hourly_rate"
                                                    value="{{ old('hourly_rate', $product->hourly_rate) }}"
                                                    placeholder="0.00">
                                                @error('hourly_rate')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Service-only: Estimated Hours --}}
                                        <div class="col-lg-4 col-md-6 service-field hourly-field"
                                            style="{{ old('item_type', $product->item_type) === 'product' || !in_array($currentBilling, ['hourly', 'daily']) ? 'display:none' : '' }}">
                                            <div class="mb-3">
                                                <label class="form-label">Heures estimées</label>
                                                <input type="number" step="1" min="0"
                                                    class="form-control @error('estimated_hours') is-invalid @enderror"
                                                    name="estimated_hours"
                                                    value="{{ old('estimated_hours', $product->estimated_hours) }}"
                                                    placeholder="0">
                                                @error('estimated_hours')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Prix de vente<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('selling_price') is-invalid @enderror"
                                                    name="selling_price"
                                                    value="{{ old('selling_price', $product->selling_price) }}">
                                                @error('selling_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Prix d'achat</label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('purchase_price') is-invalid @enderror"
                                                    name="purchase_price"
                                                    value="{{ old('purchase_price', $product->purchase_price) }}">
                                                @error('purchase_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Devise</label>
                                                <input type="text" class="form-control"
                                                    value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                    readonly disabled>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Discount row --}}
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Type de remise</label>
                                                <select class="form-select @error('discount_type') is-invalid @enderror"
                                                    name="discount_type">
                                                    <option value="">-- Aucune --</option>
                                                    <option value="percentage"
                                                        {{ old('discount_type', $product->discount_type) === 'percentage' ? 'selected' : '' }}>
                                                        %</option>
                                                    <option value="fixed"
                                                        {{ old('discount_type', $product->discount_type) === 'fixed' ? 'selected' : '' }}>
                                                        Fixe</option>
                                                </select>
                                                @error('discount_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Valeur de remise</label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('discount_value') is-invalid @enderror"
                                                    name="discount_value"
                                                    value="{{ old('discount_value', $product->discount_value) }}">
                                                @error('discount_value')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Service-only: SAC Code --}}
                                        <div class="col-lg-4 col-md-6 service-field"
                                            style="{{ old('item_type', $product->item_type) === 'product' ? 'display:none' : '' }}">
                                            <div class="mb-3">
                                                <label class="form-label">Code SAC</label>
                                                <input type="text"
                                                    class="form-control @error('sac_code') is-invalid @enderror"
                                                    name="sac_code" value="{{ old('sac_code', $product->sac_code) }}"
                                                    placeholder="Code comptable service">
                                                @error('sac_code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ═══════════════════════════════════════════════
                                 SECTION 4: Inventaire (Product only)
                                 ═══════════════════════════════════════════════ --}}
                            <div class="card mb-3 product-field"
                                style="{{ old('item_type', $product->item_type) === 'service' ? 'display:none' : '' }}">
                                <div class="card-body">
                                    <h6 class="mb-3"><i class="isax isax-building-45 me-1"></i>Inventaire</h6>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Quantité</label>
                                                <input type="number" step="1" min="0"
                                                    class="form-control @error('quantity') is-invalid @enderror"
                                                    name="quantity" value="{{ old('quantity', $product->quantity) }}">
                                                @error('quantity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Quantité d'alerte</label>
                                                <input type="number" step="1" min="0"
                                                    class="form-control @error('alert_quantity') is-invalid @enderror"
                                                    name="alert_quantity"
                                                    value="{{ old('alert_quantity', $product->alert_quantity) }}">
                                                @error('alert_quantity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Code-barres</label>
                                                <div class="position-relative">
                                                    <input type="text"
                                                        class="form-control @error('barcode') is-invalid @enderror"
                                                        name="barcode" value="{{ old('barcode', $product->barcode) }}">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-sm btn-dark position-absolute end-0 top-0 bottom-0 mx-2 my-1 d-inline-flex align-items-center btn-generate-barcode">Générer</a>
                                                </div>
                                                @error('barcode')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Suivi de stock</label>
                                                <select class="form-select @error('track_inventory') is-invalid @enderror"
                                                    name="track_inventory">
                                                    <option value="1"
                                                        {{ old('track_inventory', $product->track_inventory) == 1 ? 'selected' : '' }}>
                                                        Oui</option>
                                                    <option value="0"
                                                        {{ old('track_inventory', $product->track_inventory) == 0 ? 'selected' : '' }}>
                                                        Non</option>
                                                </select>
                                                @error('track_inventory')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ═══════════════════════════════════════════════
                                 SECTION 5: Description & Status
                                 ═══════════════════════════════════════════════ --}}
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="mb-3">Description & Statut</h6>
                                    <div class="row gx-3">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Statut</label>
                                                <select class="form-select @error('is_active') is-invalid @enderror"
                                                    name="is_active">
                                                    <option value="1"
                                                        {{ old('is_active', $product->is_active) == 1 ? 'selected' : '' }}>
                                                        Actif</option>
                                                    <option value="0"
                                                        {{ old('is_active', $product->is_active) == 0 ? 'selected' : '' }}>
                                                        Inactif</option>
                                                </select>
                                                @error('is_active')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ═══════════════════════════════════════════════
                                 ACTIONS
                                 ═══════════════════════════════════════════════ --}}
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="{{ route('bo.catalog.products.index') }}"
                                    class="btn btn-outline-white">Annuler</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>

                        </form>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
                        End Page Content
                    ========================= -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productRadio = document.getElementById('item-type-product');
            const serviceRadio = document.getElementById('item-type-service');
            const productFields = document.querySelectorAll('.product-field');
            const serviceFields = document.querySelectorAll('.service-field');
            const hourlyFields = document.querySelectorAll('.hourly-field');
            const billingType = document.querySelector('[name="billing_type"]');

            function toggleFields() {
                const isService = serviceRadio.checked;

                productFields.forEach(el => {
                    el.style.display = isService ? 'none' : '';
                });
                serviceFields.forEach(el => {
                    el.style.display = isService ? '' : 'none';
                });

                if (isService) {
                    toggleHourlyFields();
                }
            }

            function toggleHourlyFields() {
                const val = billingType?.value;
                const showHourly = (val === 'hourly' || val === 'daily');
                hourlyFields.forEach(el => {
                    el.style.display = showHourly ? '' : 'none';
                });
            }

            productRadio?.addEventListener('change', toggleFields);
            serviceRadio?.addEventListener('change', toggleFields);
            billingType?.addEventListener('change', function() {
                if (serviceRadio.checked) toggleHourlyFields();
            });

            // Initialize on page load
            toggleFields();

            // Auto-generate SKU from product name
            document.getElementById('btn-generate-sku')?.addEventListener('click', function() {
                const name = document.querySelector('[name="name"]').value.trim();
                if (!name) { alert('Veuillez saisir le nom du produit d\'abord.'); return; }
                const slug = name.toUpperCase()
                    .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                    .replace(/[^A-Z0-9]+/g, '-')
                    .replace(/^-|-$/g, '')
                    .substring(0, 20);
                const rand = String(Math.floor(Math.random() * 9000 + 1000));
                document.getElementById('product-sku').value = slug + '-' + rand;
            });
        });
    </script>
@endpush
