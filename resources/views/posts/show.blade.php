@extends('template')

@section('content')
    <div class="container">

        <div>
            <h1>{{ $post['title'] }}</h1>
            <p>{{ $post['content'] }}</p>
        </div>

    </div>

    <div>
    <form action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">

    </form>
    </div>
@endsection