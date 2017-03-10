<?php

namespace JamesGifford\Blog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JamesGifford\Blog\Models\BlogPost;

class BlogController extends Controller
{
    /**
     * Display the blog home page.
     */
    public function home()
    {
        return view('blog::home');
    }

    /**
     * Display a single blog post.
     * 
     * @param   string  $slug   the slug value of the post
     */
    public function post($slug)
    {
        $slug = strtolower($slug);
        $post = BlogPost::where('is_published', 1)->first();

        return view('blog::post', compact('slug'));
    }
}
