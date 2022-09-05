<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('posts.index')->with('posts', BlogPost::all());
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        try {
            $validated = $request->validated();
            $post = BlogPost::create($validated);

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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return view('posts.show')->with(['post' => BlogPost::findOrFail($id)]);
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            return view('posts.edit', ['post' => BlogPost::findOrFail($id)]);
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            BlogPost::findOrFail($id)->delete();

            return redirect()->route('posts.index');
        } catch (\Exception $exception) {
            echo $exception->getLine();
            echo $exception->getMessage();
        }
    }
}
