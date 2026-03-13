<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Templates\TemplateCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TemplateCatalogController extends Controller
{
    private const DOCUMENT_TYPE_LABELS = [
        'invoice'                  => 'Facture',
        'quote'                    => 'Devis',
        'delivery_challan'         => 'Bon de livraison',
        'credit_note'              => 'Avoir',
        'debit_note'               => 'Note de débit',
        'purchase_order'           => 'Bon de commande',
        'vendor_bill'              => 'Facture fournisseur',
        'receipt'                  => 'Reçu',
        'payment_receipt'          => 'Reçu de paiement',
        'supplier_payment_receipt' => 'Reçu paiement fournisseur',
        'goods_receipt'            => 'Bon de réception',
    ];

    public function index(Request $request)
    {
        $query = TemplateCatalog::query()->orderBy('document_type')->orderBy('sort_order');

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%")
                  ->orWhere('document_type', 'like', "%{$search}%");
            });
        }

        if ($docType = $request->get('document_type')) {
            $query->where('document_type', $docType);
        }

        $templates = $query->paginate(20)->appends($request->query());

        $totalTemplates = TemplateCatalog::count();
        $activeTemplates = TemplateCatalog::where('is_active', true)->count();
        $freeTemplates = TemplateCatalog::where('is_free', true)->count();

        $documentTypeLabels = self::DOCUMENT_TYPE_LABELS;

        return view('backoffice.superadmin.template-catalog.index', compact(
            'templates',
            'totalTemplates',
            'activeTemplates',
            'freeTemplates',
            'documentTypeLabels'
        ));
    }

    public function create()
    {
        $documentTypeLabels = self::DOCUMENT_TYPE_LABELS;

        return view('backoffice.superadmin.template-catalog.create', compact('documentTypeLabels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'code'          => 'required|string|max:255|unique:template_catalog,code',
            'document_type' => 'required|string|in:' . implode(',', array_keys(self::DOCUMENT_TYPE_LABELS)),
            'category'      => 'nullable|string|max:100',
            'description'   => 'nullable|string|max:1000',
            'view_path'     => 'required|string|max:255',
            'preview_image' => 'nullable|string|max:255',
            'price'         => 'required|numeric|min:0',
            'currency'      => 'nullable|string|max:3',
            'is_free'       => 'nullable|boolean',
            'is_featured'   => 'nullable|boolean',
            'is_active'     => 'nullable|boolean',
            'sort_order'    => 'nullable|integer|min:0',
        ], [
            'name.required'          => 'Le nom est obligatoire.',
            'code.required'          => 'Le code est obligatoire.',
            'code.unique'            => 'Ce code existe déjà.',
            'document_type.required' => 'Le type de document est obligatoire.',
            'document_type.in'       => 'Le type de document est invalide.',
            'view_path.required'     => 'Le chemin de la vue est obligatoire.',
            'price.required'         => 'Le prix est obligatoire.',
            'price.min'              => 'Le prix doit être positif.',
        ]);

        $slug = Str::slug($validated['code']);

        TemplateCatalog::create([
            'name'          => $validated['name'],
            'code'          => $validated['code'],
            'slug'          => $slug,
            'document_type' => $validated['document_type'],
            'category'      => $validated['category'] ?? 'general',
            'description'   => $validated['description'],
            'engine'        => 'blade',
            'view_path'     => $validated['view_path'],
            'preview_image' => $validated['preview_image'],
            'version'       => '1.0.0',
            'price'         => $validated['price'],
            'currency'      => $validated['currency'] ?? 'MAD',
            'is_free'       => $request->boolean('is_free'),
            'is_featured'   => $request->boolean('is_featured'),
            'is_active'     => $request->boolean('is_active', true),
            'sort_order'    => $validated['sort_order'] ?? 0,
            'created_by'    => auth()->id(),
        ]);

        return redirect()->route('sa.template-catalog.index')
            ->with('success', __("Modèle « {$validated['name']} » créé avec succès."));
    }

    public function edit(TemplateCatalog $template_catalog)
    {
        $documentTypeLabels = self::DOCUMENT_TYPE_LABELS;
        $template = $template_catalog;

        return view('backoffice.superadmin.template-catalog.edit', compact('template', 'documentTypeLabels'));
    }

    public function update(Request $request, TemplateCatalog $template_catalog)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'code'          => 'required|string|max:255|unique:template_catalog,code,' . $template_catalog->id,
            'document_type' => 'required|string|in:' . implode(',', array_keys(self::DOCUMENT_TYPE_LABELS)),
            'category'      => 'nullable|string|max:100',
            'description'   => 'nullable|string|max:1000',
            'view_path'     => 'required|string|max:255',
            'preview_image' => 'nullable|string|max:255',
            'price'         => 'required|numeric|min:0',
            'currency'      => 'nullable|string|max:3',
            'is_free'       => 'nullable|boolean',
            'is_featured'   => 'nullable|boolean',
            'is_active'     => 'nullable|boolean',
            'sort_order'    => 'nullable|integer|min:0',
        ], [
            'name.required'          => 'Le nom est obligatoire.',
            'code.required'          => 'Le code est obligatoire.',
            'code.unique'            => 'Ce code existe déjà.',
            'document_type.required' => 'Le type de document est obligatoire.',
            'document_type.in'       => 'Le type de document est invalide.',
            'view_path.required'     => 'Le chemin de la vue est obligatoire.',
            'price.required'         => 'Le prix est obligatoire.',
            'price.min'              => 'Le prix doit être positif.',
        ]);

        $template_catalog->update([
            'name'          => $validated['name'],
            'code'          => $validated['code'],
            'slug'          => Str::slug($validated['code']),
            'document_type' => $validated['document_type'],
            'category'      => $validated['category'] ?? 'general',
            'description'   => $validated['description'],
            'view_path'     => $validated['view_path'],
            'preview_image' => $validated['preview_image'],
            'price'         => $validated['price'],
            'currency'      => $validated['currency'] ?? 'MAD',
            'is_free'       => $request->boolean('is_free'),
            'is_featured'   => $request->boolean('is_featured'),
            'is_active'     => $request->boolean('is_active'),
            'sort_order'    => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('sa.template-catalog.index')
            ->with('success', __("Modèle « {$validated['name']} » mis à jour avec succès."));
    }

    public function destroy(TemplateCatalog $template_catalog)
    {
        $name = $template_catalog->name;
        $template_catalog->delete();

        return redirect()->route('sa.template-catalog.index')
            ->with('success', __("Modèle « {$name} » supprimé avec succès."));
    }
}
