<?php

namespace JamesGifford\Blog;

use JamesGifford\Blog\Contracts\BlogContract;
use JamesGifford\Blog\Repositories\PostRepositoryDB as PostRepository;

class Blog implements BlogContract
{
    /**
     * Get a single blog post by its slug value.
     * 
     * @param   string  $slug   the slug value
     * @return  \Illuminate\View\View
     */
    public function post($slug)
    {
        $slug = strtolower($slug);

        return (new PostRepository())->post($slug);
    }

    /**
     * Get some of the most recent posts.
     * 
     * @param   int  $quantity   the number of recent posts
     * @return  \Illuminate\View\View
     */
    public function recent($quantity = 3)
    {
        return (new PostRepository())->recent($quantity);
    }

    /**
     * Get some of the most recent featured posts.
     * 
     * @param   int  $quantity   the number of recent posts
     * @return  \JamesGifford\Blog\Repositories\PostRepository
     */
    public function featured($quantity = 3)
    {
        return (new PostRepository())->featured($quantity);
    }
}
