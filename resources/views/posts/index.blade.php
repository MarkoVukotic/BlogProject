@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8">
            @foreach($posts as $post)
                @include('partials.post')
            @endforeach
        </div>
        <div class="col-4">
            @include('posts._activity')
        </div>
    </div>
@endsection
