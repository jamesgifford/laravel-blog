<?php

namespace JamesGifford\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Set the table name used for posts
     */
    protected $table = 'blog_posts';

    /**
    * Scope a query to only include published posts
    *
    * @param    \Illuminate\Database\Eloquent\Builder   $query
    * @return   \Illuminate\Database\Eloquent\Builder
    */
    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    /**
    * Scope a query to only include unpublished posts
    *
    * @param    \Illuminate\Database\Eloquent\Builder   $query
    * @return   \Illuminate\Database\Eloquent\Builder
    */
    public function scopeUnublished($query)
    {
        return $query->where('is_published', 0);
    }
}
