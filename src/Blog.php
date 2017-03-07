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
     * @return  \JamesGifford\Blog\Models\Post
     */
    public function post($slug)
    {
        return Post::published()->where('slug', $slug)->first();
    }

    /**
     * Get some of the most recent posts
     * 
     * @param   int  $quantity   the number of recent posts
     * @return  \Illuminate\Database\Eloquent\Collection
     */
    public function recent($quantity = 3)
    {
        return Post::published()->orderBy('created_at', 'desc')->take($quantity)->get();
    }
}
