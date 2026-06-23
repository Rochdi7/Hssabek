# Backoffice UI Theme Documentation

> **MANDATORY:** Any new backoffice page MUST follow this theme exactly.
> Do not invent new layouts, CSS classes, or component structures.

---

## Layout System

### Master Layout
**File:** `resources/views/backoffice/layout/mainlayout.blade.php`

```blade
@extends('backoffice.layout.mainlayout')

@section('title', 'Page Title')

@section('content')
    <!-- your page content -->
@endsection
```

### Partials Structure
```
backoffice/layout/
├── mainlayout.blade.php         ← master template
└── partials/
    ├── head.blade.php           ← CSS, meta tags, appearance settings
    ├── header.blade.php         ← top navigation bar
    ├── sidebar.blade.php        ← left navigation menu
    └── footer-scripts.blade.php ← JS includes, jQuery, Bootstrap
```

### Layout Variants (auto-detected via $page variable)
- **Auth pages** (login, register): fullscreen, white background, no sidebar
- **Print pages** (invoice print): no header, no sidebar
- **Error pages**: no sidebar
- **RTL mode**: Arabic locale triggers `dir="rtl"` on `<html>`
- **Mini layout / Dark theme / Transparent**: configurable via tenant appearance settings

---

## Page Structure Template

Every backoffice page follows this structure:

```html
<!-- Page Title -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">Titre de la Page</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('bo.dashboard') }}">Tableau de bord</a>
                </li>
                <li class="breadcrumb-item active">Module</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Title -->

<!-- Content area -->
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-header">
                <!-- Filter row or page actions -->
            </div>
            <div class="card-body">
                <!-- Table or form content -->
            </div>
        </div>
    </div>
</div>
```

---

## Card Component

```html
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Titre</h4>
        <!-- Optional: action button top-right -->
        <a href="{{ route('bo.module.create') }}" class="btn btn-primary btn-sm">
            <i class="ti ti-plus"></i> Nouveau
        </a>
    </div>
    <div class="card-body">
        <!-- content -->
    </div>
    <div class="card-footer">
        <!-- pagination or footer actions -->
    </div>
</div>
```

---

## Table Structure (List Pages)

Reference: `resources/views/customers.blade.php`, `invoices.blade.php`

```html
<div class="table-responsive">
    <table class="table table-stripped table-hover datatable">
        <thead>
            <tr>
                <th>Colonne 1</th>
                <th>Colonne 2</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr>
                <td>{{ $item->field }}</td>
                <td>{{ $item->other_field }}</td>
                <td class="text-end">
                    <!-- Action dropdown -->
                    <div class="dropdown dropdown-action">
                        <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('bo.module.edit', $item) }}">
                                <i class="far fa-edit me-2"></i>Modifier
                            </a>
                            <a class="dropdown-item" href="{{ route('bo.module.show', $item) }}">
                                <i class="far fa-eye me-2"></i>Voir
                            </a>
                            <a class="dropdown-item confirm-text" href="#"
                               data-action="{{ route('bo.module.destroy', $item) }}">
                                <i class="far fa-trash-alt me-2"></i>Supprimer
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="100%" class="text-center">Aucun enregistrement trouvé.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{ $items->links() }}
```

---

## Filter / Search Row

Reference: `resources/views/customers.blade.php`

```html
<div class="card-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="input-group">
                <input type="text" class="form-control" id="search"
                       placeholder="Rechercher...">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="col-auto">
            <a href="{{ route('bo.module.create') }}" class="btn btn-primary">
                <i class="ti ti-plus"></i> Ajouter
            </a>
        </div>
    </div>
</div>
```

---

## Form Structure (Create/Edit Pages)

Reference: `resources/views/add-customer.blade.php`, `add-invoice.blade.php`

```html
<form action="{{ route('bo.module.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Informations</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name', $model->name ?? '') }}"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- more fields -->
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('bo.module.index') }}" class="btn btn-secondary me-2">
                        Annuler
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
```

---

## Alert / Flash Messages

Reference: `resources/views/backoffice/components/alerts.blade.php`

```blade
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
```

The alerts component is included via `@include('backoffice.components.alerts')` or automatically in the layout.

---

## Badge / Status Pills

```html
<!-- Invoice status -->
<span class="badge bg-success-light">Payée</span>
<span class="badge bg-warning-light">En attente</span>
<span class="badge bg-danger-light">En retard</span>
<span class="badge bg-secondary-light">Brouillon</span>
<span class="badge bg-info-light">Envoyée</span>
```

---

## Icon System

The backoffice uses **two** icon libraries. Use the one that the reference template for your module uses:

| Library | Prefix | Example |
|---------|--------|---------|
| **Font Awesome 5/6** | `fa`, `fas`, `far`, `fab` | `<i class="fas fa-edit"></i>` |
| **Tabler Icons** | `ti ti-*` | `<i class="ti ti-plus"></i>` |
| **isax** icons | `isax-*` | `<i class="isax-add-circle"></i>` |

**Rule:** Match the icon set used in the reference template for that module. Do NOT mix icon sets within a single page.

---

## Modal Dialog

Reference: `resources/views/backoffice/components/modal-popup.blade.php`

```html
<!-- Trigger -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Ouvrir
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Titre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </div>
        </div>
    </div>
</div>
```

---

## Rich Text Editor

Summernote is used for rich text fields (notes, descriptions):

```blade
@include('backoffice.components._summernote-editor', ['field' => 'notes'])
```

---

## Date Picker

```blade
@include('backoffice.components.date-input', ['name' => 'due_date', 'value' => old('due_date')])
```

---

## Export Dropdown

```blade
@include('backoffice.components.export-dropdown', ['route' => 'bo.export.invoices'])
```

---

## Column Toggle

```blade
@include('backoffice.components.column-toggle')
```

---

## CSS / JS Assets

All assets are loaded via the layout partials. **Do NOT add new CSS files** unless they are already present in the theme.

Loaded CSS (in `head.blade.php`):
- Bootstrap 5
- Font Awesome
- Tabler Icons
- isax icon font
- DataTables
- Select2
- Summernote
- Custom theme CSS (`assets/css/style.css`)

Loaded JS (in `footer-scripts.blade.php`):
- jQuery
- Bootstrap 5 bundle
- DataTables + plugins
- Select2
- Summernote
- SweetAlert2 (for confirm dialogs)
- Custom theme JS (`assets/js/script.js`)

---

## Responsive Classes

Preserve all responsive classes from the reference:
- `d-none d-md-block` — hide on mobile
- `col-sm-12 col-md-6 col-lg-4` — responsive grid
- `table-responsive` — scrollable tables on mobile

---

## Sidebar Navigation

**File:** `resources/views/backoffice/layout/partials/sidebar.blade.php`

To add a new module to the sidebar, follow the exact pattern already in the sidebar file — same `<li>` structure, same active class detection, same icon style.

---

## Settings Pages

**Reference:** `resources/views/company-settings.blade.php`, `account-settings.blade.php`

Settings pages use a two-column layout:
- Left: `resources/views/backoffice/components/settings-sidebar.blade.php`
- Right: Form content card

---

## Rules Summary for New Pages

1. Always `@extends('backoffice.layout.mainlayout')`
2. Always include the breadcrumb in the same position
3. Always use `card`, `card-header`, `card-body`, `card-footer` structure
4. Always use the same table markup as the reference for list pages
5. Always use `@forelse` with `@empty` on all lists
6. Always use `@error` + `is-invalid` + `invalid-feedback` on all form fields
7. Always place the Add/New button top-right in the card header
8. Always place Save/Cancel buttons bottom-right in the card footer
9. Never add new CSS classes not in the theme
10. Never use inline `style=""` attributes
11. All user-facing strings must be in **French**
