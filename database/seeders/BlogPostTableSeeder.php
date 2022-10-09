<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $users = User::all();
        $blogPostsCount = (int)$this->command->ask('How many blog posts would you like to create', 50);
        $posts = BlogPost::factory($blogPostsCount)->make()->each(function($post) use($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
