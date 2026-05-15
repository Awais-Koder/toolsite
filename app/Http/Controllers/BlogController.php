<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')
            ->where('is_published', true)
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(10);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('category', 'user')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
