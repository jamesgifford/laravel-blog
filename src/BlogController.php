<?php

namespace JamesGifford\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a blog post
     * @param   string  $slug   the slug value of the post
     */
    public function post($slug) {
        return view('blog::post', compact('slug'));
    }
}
