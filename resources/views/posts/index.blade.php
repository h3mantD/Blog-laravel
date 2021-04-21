@extends('template')
@section('content')
    <div class="container" style="position: absolute; top:10%" >
        <h1>Blog Posts</h1>
        @forelse ($posts as $key => $post)

            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                   <a href="{{ route('posts.show', ['post' => $post]) }}" target="_blank" rel="noopener noreferrer"><h5 class="card-title">{{ $loop->index+1 }} - {{ $post['title'] }}</h5></a>
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
                 <div class="card-footer text-muted">
                    @if ($post['comments_count'])
                        Total comments count : {{ $post['comments_count'] }}
                    @else
                        No Comments yet
                    @endif
                    
                </div>
            </div>

            <br>

        @empty
            <p>No record found</p>
            
        @endforelse

    </div> {{-- End if container --}}
@endsection