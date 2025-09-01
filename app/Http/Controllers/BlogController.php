<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where('is_published', true)
                         ->orderBy('publish_date', 'desc')
                         ->paginate(6);
        
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)
                        ->where('is_published', true)
                        ->firstOrFail();
        
        $recentPosts = BlogPost::where('is_published', true)
                               ->where('id', '!=', $post->id)
                               ->orderBy('publish_date', 'desc')
                               ->take(3)
                               ->get();
        
        return view('blog.show', compact('post', 'recentPosts'));
    }
}