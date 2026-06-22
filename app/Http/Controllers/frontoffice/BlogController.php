<?php

namespace App\Http\Controllers\Frontoffice;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $query = BlogPost::with(['category', 'author'])
            ->published()
            ->orderByDesc('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $request->category));
        }

        $posts      = $query->paginate(9)->withQueryString();
        $categories = BlogCategory::whereHas('publishedPosts')->withCount('publishedPosts')->get();
        $featured   = BlogPost::with(['category', 'author'])->published()->orderByDesc('views')->first();

        return view('frontoffice.pages.blog.index', compact('posts', 'categories', 'featured'));
    }

    public function show(string $slug): View
    {
        $post = BlogPost::with(['category', 'author'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $post->incrementViews();

        $related = BlogPost::with('category')
            ->published()
            ->where('id', '!=', $post->id)
            ->when($post->blog_category_id, fn ($q) => $q->where('blog_category_id', $post->blog_category_id))
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return view('frontoffice.pages.blog.show', compact('post', 'related'));
    }
}
