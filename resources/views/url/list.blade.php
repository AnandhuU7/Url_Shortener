@extends("layouts.app")

@section("content")
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Short URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($urls as $url)
                    <tr>
                        <td>
                            {{ $url->extractNameFromUrl() }}
                        </td>
                        <td>
                            <a href="{{ $url->original_url }}" target="_blank">{{ $url->short_url }}</a>
                        </td>
                        <td>
                            <form action="/url/{{$url->id}}/edit" method="GET" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-secondary mx-2">Edit</button>
                            </form>

                            <form action="url/{{$url->id}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-2" onClick="return confirm('Are you sure')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
