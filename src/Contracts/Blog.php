<?php

namespace JamesGifford\Blog\Contracts;

interface Blog
{
    /**
     * Add a piece of data to the view.
     *
     * @param  
     */
    public function post($slug);
}
