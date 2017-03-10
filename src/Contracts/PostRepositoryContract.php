<?php

namespace JamesGifford\Blog\Contracts;

interface PostRepositoryContract
{
    /**
     * Get a single post by its slug value.
     * 
     * @param   string  $slug   the value of the post's slug
     * @return  \JamesGifford\Blog\Models\Post
     */
    public function post($slug);

    /**
     * Get recent posts.
     * 
     * @param   int     $quantity   the number of posts to get
     * @return  mixed
     */
    public function recent($quantity = 3);

    /**
     * Get recent featured posts.
     * 
     * @param   int     $quantity   the number of posts to get
     * @return  \JamesGifford\Blog\Contracts\PostRepositoryContract
     */
    public function featured($quantity = 3);

    /**
     * Return the last data result.
     * 
     * @return  mixed
     */
    public function data();

    /**
     * Return the last data result as an array.
     * 
     * @return  array
     */
    public function array();

    /**
     * Pass the last result data to a view and return it.
     * 
     * @return  \Illuminate\View\View
     */
    public function render();
}
