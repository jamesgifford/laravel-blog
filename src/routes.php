<?php

Route::get('blog', function(){
    echo 'Hello from the blog package!';
});

Route::get('blog/post/{slug}', 'JamesGifford\Blog\BlogController@post');
