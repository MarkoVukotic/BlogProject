<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{
    HomeController,
    PostsController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');


Route::resource('/posts', PostsController::class);


Route::get('/posts/{id}', function ($id){
   return 'Blog post' . $id;
})->name('posts.show');

Route::get('/recent-posts/{$dats_ago?}',function($daysAgo = 20){
   return 'Post from ' . $daysAgo . ' days ago';
})->name('post.recent.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
