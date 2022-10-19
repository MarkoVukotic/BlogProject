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
                    @card
                    @slot('title','Most Commented')
                    @slot('subtitle','What people are currently talking about')
                    @slot('items')
                        @foreach($mostCommented as $post)
                            <li class="list-group-item">
                                <a href="{{route('posts.show', ['post' => $post->id])}}">
                                    {{$post->title}}
                                </a>
                            </li>
                        @endforeach
                    @endslot
                    @endcard
                </div>
                <div class="row mb-4">
                    @card()
                    @slot('title','Most Active')
                    @slot('subtitle','Users with most posts written')
                    @slot('items', collect($mostActiveUsers)->pluck('name'))
                    @endcard
                </div>
                <div class="row">
                    @card()
                    @slot('title','Most Active Last Month')
                    @slot('subtitle','Users with most posts written in the last month')
                    @slot('items', collect($mostActiveUsersLastMonth)->pluck('name'))
                    @endcard
                </div>
            </div>
        </div>
    </div>
@endsection
