@extends('template')
@section('content')
    <div class="container">
        <h1>Blog Posts</h1>
        @forelse ($posts as $key => $post)
            <div>
                <h2>{{ $loop->index+1 }} - {{ $post['title'] }}</h2>
                <p>{{ $post['content'] }}</p>
            </div>
            <div>
                <form action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">

                </form>
                <form action="{{ route('posts.edit', ['post' => $post['id']]) }}" method="get">
         
                    <input type="submit" value="Edit">

                </form>
            </div>
        @empty
            <p>No record found</p>
            
        @endforelse

        
         


    </div>
@endsection