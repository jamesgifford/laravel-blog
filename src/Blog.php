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
        $slug = strtolower($slug);

        return Post::live()->where('slug', $slug)->first();
    }

    /**
     * Get some of the most recent posts
     * 
     * @param   int  $quantity   the number of recent posts
     * @return  \Illuminate\Pagination\LengthAwarePaginator
     */
    public function recent($quantity = 3)
    {
        return Post::live()->orderBy('created_at', 'desc')->paginate($quantity);
    }

    /**
     * Get some of the most recent featured posts
     * 
     * @param   int  $quantity   the number of recent posts
     * @return  \Illuminate\Database\Eloquent\Collection
     */
    public function featured($quantity = 3)
    {
        return Post::live()->featured()->orderBy('created_at', 'desc')->take($quantity)->get();
    }
}
