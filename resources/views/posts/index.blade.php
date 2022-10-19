@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8">
            @foreach($posts as $post)
                @include('partials.post')
            @endforeach
        </div>
        @include('partials.mostCommentedBlogPost')
    </div>
@endsection
