@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <h1>Contact</h1>
    @can('home_secret')
        <a href="{{route('secret')}}">Secret Route</a>
        <p>Special contact details</p>
    @endcan
@endsection
