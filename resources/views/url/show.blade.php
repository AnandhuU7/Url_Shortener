@extends('layouts.app')

@section('content')
    <div class="container">
        <p>Shortened URL: <a href="{{$url->original_url}}" target="_blank">{{$url->short_url}}</a></p>
    </div>
@endsection
