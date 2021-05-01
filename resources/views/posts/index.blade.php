@extends('template')
@section('content')
    <div class="container" style="position: absolute; top:10%">

        <h1>Blog Posts</h1>
        <div class="row">
            <div class="col-9">
                @forelse ($posts as $key => $post)
                    <div class="card">
                        <div class="card-header">
                            created by {{ $post->user->name }} [
                            {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                            ]
                        </div>
                        <div class="card-body">
                            <a href="{{ route('posts.show', ['post' => $post]) }}" target="_blank"
                                rel="noopener noreferrer">
                                <h5 class="card-title">{{ $loop->index + 1 }} - {{ $post['title'] }}</h5>
                            </a>
                            <p class="card-text">{{ $post['content'] }}</p>

                            <div class="row">
                                @can('delete-post', $post)
                                    <form action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="post"
                                        style="padding: 5px">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-primary" value="Delete">

                                    </form>
                                @endcan

                                @can('update-post', $post)
                                    <form action="{{ route('posts.edit', ['post' => $post['id']]) }}" method="get"
                                        style="padding: 5px">

                                        <input type="submit" class="btn btn-primary" value="Edit">

                                    </form>
                                @endcan
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
            </div>
            <div class="col-3">
                <div class="container">
                    <div class="row">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Most Commented Blogs
                            </div>
                            <ul class="list-group list-group-flush">
                                @forelse ($most_commented as $p)
                                    <a href="{{ route('posts.show', ['post' => $p]) }}" rel="noopener noreferrer">
                                        <li class="list-group-item">{{ $p->title }}</li>
                                    </a>
                                @empty
                                    <li class="list-group-item">No Blog posts yet!</li>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Most Active Users
                            </div>
                            <ul class="list-group list-group-flush">
                                @forelse ($most_active_users as $u)
                                    <a href="#" rel="noopener noreferrer">
                                        <li class="list-group-item">{{ $u->name }}</li>
                                    </a>
                                @empty
                                    <li class="list-group-item">No Blog posts yet!</li>
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- End if container --}}
@endsection
