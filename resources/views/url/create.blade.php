@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="/url">
    @csrf
    <div class="form-group">
        <label for="original_url">Original URL</label>
        <input type="text" name="original_url" class="form-control">
    </div>
    <div class="form-group">
        <label for="short_url">Short Url</label>
        <input type="text" name="short_url" class="form-control">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-primary">SAVE</button>
    </div>
</form>
</div>
@endsection
