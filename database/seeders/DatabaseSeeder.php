<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(20)->create();
         $posts = BlogPost::factory(50)->make()->each(function($post) use($users) {
             $post->user_id = $users->random()->id;
             $post->save();
         });

         $comments = Comment::factory(50)->make()->each(function ($comment) use ($posts) {
                $comment->blog_post_id = $posts->random()->id;
                $comment->save();
         });







    }
}
