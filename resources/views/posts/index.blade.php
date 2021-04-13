@extends('template')
@section('content')
    <div class="container" >
        <h1>Blog Posts</h1>
        @forelse ($posts as $key => $post)

            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $loop->index+1 }} - {{ $post['title'] }}</h5>
                    <p class="card-text">{{ $post['content'] }}</p>
        
                <div class="row">
                    <form action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="post" style="padding: 5px">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-primary" value="Delete" >

                    </form>
                    <form action="{{ route('posts.edit', ['post' => $post['id']]) }}" method="get" style="padding: 5px">
            
                        <input type="submit" class="btn btn-primary" value="Edit" >

                    </form>
                </div>
                </div>
            </div>

            <br>

        @empty
            <p>No record found</p>
            
        @endforelse

    </div> {{-- End if container --}}
@endsection