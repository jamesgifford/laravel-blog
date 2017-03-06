<?php

Route::get('blog/post/{slug}', 'JamesGifford\Blog\Controllers\BlogController@post')->name('blog_post');
Route::get('blog', 'JamesGifford\Blog\Controllers\BlogController@home')->name('home');
