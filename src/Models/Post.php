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
     * Scope a query to only include active posts
     *
     * @param    \Illuminate\Database\Eloquent\Builder   $query
     * @return   \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /**
     * Scope a query to only include inactive (draft) posts
     *
     * @param    \Illuminate\Database\Eloquent\Builder   $query
     * @return   \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', 0);
    }

    /**
     * Scope a query to only include featured posts
     *
     * @param    \Illuminate\Database\Eloquent\Builder   $query
     * @return   \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

    /**
     * Scope a query to only include non-featured posts
     *
     * @param    \Illuminate\Database\Eloquent\Builder   $query
     * @return   \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNonFeatured($query)
    {
        return $query->where('is_featured', 0);
    }

    /**
     * Scope a query to only include published posts
     *
     * @param    \Illuminate\Database\Eloquent\Builder   $query
     * @return   \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', date('Y-m-d H:m:s'));
    }

    /**
     * Scope a query to only include unpublished posts
     *
     * @param    \Illuminate\Database\Eloquent\Builder   $query
     * @return   \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnpublished($query)
    {
        return $query->where('published_at', '>', date('Y-m-d H:m:s'));
    }

    /**
     * Scope a query to only include active and published posts
     *
     * @param    \Illuminate\Database\Eloquent\Builder   $query
     * @return   \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLive($query)
    {
        return $query->active()->published();
    }
}
