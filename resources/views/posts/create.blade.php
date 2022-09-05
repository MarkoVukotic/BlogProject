@extends('layout.app')

@section('title', 'Create the post')


@section('content')

    <form action="{{route('posts.store')}}" method="POST">
        @method('PUT')
        @csrf
        @include('partials.form')
        <div><input type="submit" value="Create"></div>
    </form>

@endsection
