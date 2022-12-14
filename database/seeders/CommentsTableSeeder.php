<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = BlogPost::all();
        if($posts->count() === 0 ){
            $this->command->info('There are no blog posts, so no comments will be added');
            return;
        }

        $users = User::all();

        $comments_count = (int)$this->command->ask('How many comments would you like to create', 150);
        Comment::factory($comments_count)->make()->each(function ($comment) use ($posts, $users) {
            $comment->blog_post_id = $posts->random()->id;
            $comment->user_id = $users->random()->id;
            $comment->save();
     });
    }
}
