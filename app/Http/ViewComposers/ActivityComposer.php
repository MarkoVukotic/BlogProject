<?php

namespace App\Http\ViewComposers;

use App\Models\{
    BlogPost,
    User
};
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ActivityComposer
{

    public function compose(View $view){
        try {

            $mostCommented = Cache::tags(['blog-post'])->remember('blog-post-commented', 60, function(){
                return BlogPost::mostCommented()->with('tags')->with('user')->take(5)->get();
            });

            $mostActiveUsers = Cache::remember('users-most-active', 60, function(){
                return User::WithMostBlogPosts()->take(5)->get();
            });

            $mostActiveUsersLastMonth = Cache::remember('users-most-active-last-month', 60, function(){
                return User::WithMostBlogPostLastMonth()->take(5)->get();
            });

            $view->with('mostCommented',  $mostCommented);
            $view->with('mostActiveUsers',  $mostActiveUsers);
            $view->with('mostActiveUsersLastMonth',  $mostActiveUsersLastMonth);

        }catch (\Exception $exception){
            echo $exception->getMessage();
            echo $exception->getLine();
        }
    }


}
