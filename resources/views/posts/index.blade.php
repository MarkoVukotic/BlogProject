@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8">
            @foreach($posts as $post)
                @include('partials.post')
            @endforeach
        </div>
        <div class="col-4">
            <div class="container">
                <div class="row mb-4">
                    @include('partials.mostCommentedBlogPost')
                </div>
                <div class="row mb-4">
                    @include('partials.mostActiveUsers')
                </div>
                <div class="row">
                    @include('partials.mostActiveUsersLastMonth')
                </div>
            </div>
        </div>
    </div>
@endsection
