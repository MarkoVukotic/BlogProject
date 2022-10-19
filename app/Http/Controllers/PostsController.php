<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $posts = BlogPost::latest()->withCount('comments')->get();
            $mostCommented = BlogPost::mostCommented()->take(5)->get();
            $mostActiveUsers = User::WithMostBlogPosts()->take(5)->get();
            $mostActiveUsersLastMonth = User::WithMostBlogPostLastMonth()->take(5)->get();

            return view('posts.index', compact(['posts', 'mostCommented', 'mostActiveUsers', 'mostActiveUsersLastMonth']));

        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('posts.create');
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePost $request)
    {
        try {
            $validated = $request->validated();
            $post = BlogPost::create($validated + ['user_id' => auth()->id()]);

            return redirect()->route('posts.show', $post->id);
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return view('posts.show')->with(
                ['post' => BlogPost::with('comments')->findOrFail($id)]);
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
           $blog_post =  BlogPost::findOrFail($id);
           $this->authorize($blog_post);
            return view('posts.edit', ['post' => $blog_post]);
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorePost $request, $id)
    {
        try {
            $post = BlogPost::findOrFail($id);
            $validated = $request->validated();
            $post->fill($validated);
            $post->save();

            return redirect()->route('posts.show', $post->id);
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $blog_post = BlogPost::findOrFail($id);
            $this->authorize($blog_post);
            $blog_post->delete();

            return redirect()->route('posts.index');
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }
}
