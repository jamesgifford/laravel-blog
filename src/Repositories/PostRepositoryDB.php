<?php

namespace JamesGifford\Blog\Repositories;

use JamesGifford\Blog\Contracts\PostRepositoryContract;
use JamesGifford\Blog\Models\Post;

/**
 * Post repository for database communication
 */
class PostRepositoryDB implements PostRepositoryContract
{
    /**
     * The last result from the database.
     * 
     * @var     mixed
     */
    protected $data;

    /**
     * Get a single post by its slug value.
     * 
     * @param   string  $slug   the value of the post's slug
     * @return  \JamesGifford\Blog\Models\Post
     */
    public function post($slug)
    {
        $this->data = Post::live()->where('slug', $slug)->first();

        return $this;
    }

    /**
     * Get recent featured posts.
     * 
     * @param   int     $quantity   the number of posts to get
     * @return  \JamesGifford\Blog\Contracts\PostRepositoryContract
     */
    public function featured($quantity = 3)
    {
        $this->data = Post::live()->featured()->orderBy('created_at', 'desc')->take($quantity)->get();

        return $this;
    }

    /**
     * Get recent posts.
     * 
     * @param   int     $quantity   the number of posts to get
     * @return  mixed
     */
    public function recent($quantity = 3)
    {
        $this->data = Post::live()->orderBy('created_at', 'desc')->paginate($quantity);

        return $this;
    }

    /**
     * Return the last data result.
     * 
     * @return  mixed
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Return the last data result as an array.
     * 
     * @return  array
     */
    public function array()
    {
        return $this->data->toArray();
    }

    /**
     * Pass the last result data to a view and return it.
     * 
     * @return  \Illuminate\View\View
     */
    public function render()
    {
        // Check whether the data returned a single post or multiple posts
        if(is_a($this->data, 'JamesGifford\Blog\Models\Post')) {
            return view('blog::post')->with('post', $this->data);
        }
        else {
            return view('blog::posts')->with('posts', $this->data);
        }
    }
}
