<?php

namespace JamesGifford\Blog;

use JamesGifford\Blog\Contracts\Blog as BlogContract;
use JamesGifford\Blog\Models\Post;

class Blog implements BlogContract
{
    /**
     * Get a single blog post by its slug value
     * 
     * @param   string  $slug   the slug value
     * @return  \Illuminate\View\View
     */
    public function post($slug)
    {
        $slug = strtolower($slug);

        $post = Post::live()->where('slug', $slug)->first();

        return view('blog::post')->with('post', $post);
    }

    /**
     * Get some of the most recent posts
     * 
     * @param   int  $quantity   the number of recent posts
     * @return  \Illuminate\View\View
     */
    public function recent($quantity = 3)
    {
        $posts = Post::live()->orderBy('created_at', 'desc')->paginate($quantity);

        return view('blog::posts')->with('posts', $posts);
    }

    /**
     * Get some of the most recent featured posts
     * 
     * @param   int  $quantity   the number of recent posts
     * @return  \Illuminate\View\View
     */
    public function featured($quantity = 3)
    {
        $posts = Post::live()->featured()->orderBy('created_at', 'desc')->take($quantity)->get();
        
        return view('blog::posts')->with('posts', $posts);
    }
}
