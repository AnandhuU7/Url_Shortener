@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="/url/{{$url->id}}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label for="original_url">URL</label>
        <input type="text" name="original_url" value="{{$url->original_url}}" class="form-control">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-primary">UPDATE</button>
    </div>
</form>
</div>
@endsection
