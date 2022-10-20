@extends('layouts.app')

@section('title', $post->title)

@section('content')
    @if(now()->diffInMinutes($post->created_at) < 5)
        <div class="alert alert-info">New Blog Post!</div>
    @endif
    <h1>{{$post->title}}</h1>

    <p>{{$post->content}}</p>

    @updated(['date' => $post->created_at, 'name' => $post->user->name])
    @endupdated

    @updated(['date' => $post->updated_at])
    Updated
    @endupdated

    <p>Currently read by {{$counter}} people</p>
    <h4>Comments</h4>

    @forelse($post->comments as $comment)
        <p>
            {{$comment->content}},
        </p>
        <p class="text-muted">
            @updated(['date' => $comment->created_at])
            @endupdated
        </p>
    @empty
        <p>No comments yet!</p>
    @endforelse

@endsection
