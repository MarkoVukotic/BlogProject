<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class PostTagController extends Controller
{
    public function index($tagId)
    {
        try {

            $tag = Tag::findOrFail($tagId);

            return view('posts.index',
                ['posts' => $tag->blogPosts,
                'mostCommented' => [],
                'mostActive' => [],
                'mostActiveUsers' => [],
                'mostActiveUsersLastMonth' => [],
                ]);

        } catch (\Exception $e) {
            echo $e->getLine();
            echo $e->getMessage();
        }
    }
}
