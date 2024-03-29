@extends('layouts.app')

@section('title', 'Update the post')


@section('content')

    <form action="{{route('posts.update', ['post' => $post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('partials.form')
        <div><input type="submit" value="Update" class="btn btn-primary"></div>
    </form>

@endsection
