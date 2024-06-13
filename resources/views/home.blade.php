@extends('layouts.app')

@section('content')

<div class="container">
    <form method="post" action="/shortend">
        @csrf
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" name="original_url" class="form-control">
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary">GENERATE LINK</button>
        </div>
    </form>
</div>

@endsection



