<?php

namespace App\Http\Controllers\SuperAdmin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
    public function index(): View
    {
        $categories = BlogCategory::withCount('posts')->orderBy('name')->get();

        return view('backoffice.superadmin.blog.categories.index', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:100|unique:blog_categories,name',
            'color' => 'required|in:primary,success,warning,danger,info,dark',
        ], [
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique'   => 'Cette catégorie existe déjà.',
            'color.required' => 'La couleur est obligatoire.',
        ]);

        BlogCategory::create([
            'name'  => $validated['name'],
            'slug'  => Str::slug($validated['name']),
            'color' => $validated['color'],
        ]);

        return redirect()->route('sa.blog.categories.index')
            ->with('success', 'Catégorie « ' . $validated['name'] . ' » créée avec succès.');
    }

    public function update(Request $request, BlogCategory $category): RedirectResponse
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:100|unique:blog_categories,name,' . $category->id,
            'color' => 'required|in:primary,success,warning,danger,info,dark',
        ], [
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique'   => 'Cette catégorie existe déjà.',
        ]);

        $category->update([
            'name'  => $validated['name'],
            'slug'  => Str::slug($validated['name']),
            'color' => $validated['color'],
        ]);

        return redirect()->route('sa.blog.categories.index')
            ->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(BlogCategory $category): RedirectResponse
    {
        $name = $category->name;
        $category->delete();

        return redirect()->route('sa.blog.categories.index')
            ->with('success', "Catégorie « {$name} » supprimée.");
    }
}
