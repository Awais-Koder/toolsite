<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::with('category', 'user')
            ->where('is_published', true)
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(10);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = \App\Models\Post::with('category', 'user')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
