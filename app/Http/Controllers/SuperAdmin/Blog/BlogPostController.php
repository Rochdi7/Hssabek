<?php

namespace App\Http\Controllers\SuperAdmin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    public function index(Request $request): View
    {
        $query = BlogPost::with(['category', 'author'])->orderByDesc('created_at');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('category')) {
            $query->where('blog_category_id', $request->category);
        }
        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        $posts      = $query->paginate(15)->withQueryString();
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();
        $totalPosts = BlogPost::count();
        $published  = BlogPost::published()->count();
        $drafts     = BlogPost::draft()->count();

        return view('backoffice.superadmin.blog.posts.index', compact(
            'posts', 'categories', 'totalPosts', 'published', 'drafts'
        ));
    }

    public function create(): View
    {
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();

        return view('backoffice.superadmin.blog.posts.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'tags'             => 'nullable|string',
            'status'           => 'required|in:draft,published,archived',
            'published_at'     => 'nullable|date',
            'cover_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_image_alt'  => 'nullable|string|max:255',
            'meta_title'       => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords'    => 'nullable|string|max:500',
        ], [
            'title.required'   => 'Le titre est obligatoire.',
            'content.required' => 'Le contenu est obligatoire.',
            'status.required'  => 'Le statut est obligatoire.',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('blog', 'public');
        }

        $slug = $this->uniqueSlug(Str::slug($validated['title']));
        $tags = $validated['tags']
            ? array_filter(array_map('trim', explode(',', $validated['tags'])))
            : null;

        BlogPost::create([
            'blog_category_id' => $validated['blog_category_id'],
            'author_id'        => auth()->id(),
            'title'            => $validated['title'],
            'slug'             => $slug,
            'excerpt'          => $validated['excerpt'],
            'content'          => $validated['content'],
            'cover_image'      => $coverPath,
            'cover_image_alt'  => $validated['cover_image_alt'],
            'tags'             => $tags ?: null,
            'status'           => $validated['status'],
            'published_at'     => $validated['status'] === 'published'
                ? ($validated['published_at'] ?? now())
                : $validated['published_at'],
            'meta_title'       => $validated['meta_title'],
            'meta_description' => $validated['meta_description'],
            'meta_keywords'    => $validated['meta_keywords'],
            'reading_time'     => BlogPost::computeReadingTime($validated['content']),
        ]);

        return redirect()->route('sa.blog.posts.index')
            ->with('success', 'Article « ' . $validated['title'] . ' » créé avec succès.');
    }

    public function edit(BlogPost $post): View
    {
        $categories = BlogCategory::where('is_active', true)->orderBy('name')->get();

        return view('backoffice.superadmin.blog.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, BlogPost $post): RedirectResponse
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'blog_category_id' => 'nullable|exists:blog_categories,id',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'tags'             => 'nullable|string',
            'status'           => 'required|in:draft,published,archived',
            'published_at'     => 'nullable|date',
            'cover_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_image_alt'  => 'nullable|string|max:255',
            'meta_title'       => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords'    => 'nullable|string|max:500',
        ], [
            'title.required'   => 'Le titre est obligatoire.',
            'content.required' => 'Le contenu est obligatoire.',
        ]);

        $coverPath = $post->cover_image;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('blog', 'public');
        }

        $tags = $validated['tags']
            ? array_filter(array_map('trim', explode(',', $validated['tags'])))
            : null;

        // Only update slug if title changed
        $slug = $post->slug;
        if ($post->title !== $validated['title']) {
            $slug = $this->uniqueSlug(Str::slug($validated['title']), $post->id);
        }

        $post->update([
            'blog_category_id' => $validated['blog_category_id'],
            'title'            => $validated['title'],
            'slug'             => $slug,
            'excerpt'          => $validated['excerpt'],
            'content'          => $validated['content'],
            'cover_image'      => $coverPath,
            'cover_image_alt'  => $validated['cover_image_alt'],
            'tags'             => $tags ?: null,
            'status'           => $validated['status'],
            'published_at'     => $validated['status'] === 'published' && ! $post->published_at
                ? ($validated['published_at'] ?? now())
                : ($validated['published_at'] ?? $post->published_at),
            'meta_title'       => $validated['meta_title'],
            'meta_description' => $validated['meta_description'],
            'meta_keywords'    => $validated['meta_keywords'],
            'reading_time'     => BlogPost::computeReadingTime($validated['content']),
        ]);

        return redirect()->route('sa.blog.posts.index')
            ->with('success', "Article « {$post->title} » mis à jour avec succès.");
    }

    public function destroy(BlogPost $post): RedirectResponse
    {
        $title = $post->title;
        $post->delete();

        return redirect()->route('sa.blog.posts.index')
            ->with('success', "Article « {$title} » supprimé.");
    }

    private function uniqueSlug(string $base, ?int $exceptId = null): string
    {
        $slug  = $base;
        $count = 1;
        $query = BlogPost::where('slug', $slug);
        if ($exceptId) {
            $query->where('id', '!=', $exceptId);
        }
        while ($query->clone()->exists()) {
            $slug  = $base . '-' . $count++;
            $query = BlogPost::where('slug', $slug);
            if ($exceptId) {
                $query->where('id', '!=', $exceptId);
            }
        }

        return $slug;
    }
}
