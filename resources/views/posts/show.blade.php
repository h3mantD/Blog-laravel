@extends('template')

@section('content')

    <script>
    $(document).ready(function(){
        $('.comment').hide();
        $("#addCom").click(function(){
            $(".comment").toggle();
        });
    });
    </script>

    <div class="container" style="position: absolute; top:10%;">

        <div>
            <h1>{{ $post['title'] }}</h1>
            <p>{{ $post['content'] }}</p>
        </div>


    <div class="row">
        <form action="{{ route('posts.destroy', ['post' => $post['id']]) }}" method="post" style="padding: 5px">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-primary" value="Delete" >

        </form>
        <form action="{{ route('posts.edit', ['post' => $post['id']]) }}" method="get" style="padding: 5px">

            <input type="submit" class="btn btn-primary" value="Edit" >

        </form>
        <button class="btn btn-primary" onclick=""  id="addCom">Show/hide Add comment</button>
    </div>
    <br>
    <div class="comment">
            <form action="" method="post">
                @csrf
                <input type="text" name="comment" id="com">
                <input type="submit" value="Add Comment" name="" id="">
            </form>
    </div>

    <div class="allComments">
        <h2>Comments</h2>
        @forelse ($post->comments as $com)
            <p>{{ $com->content }}</p> 
            <p class="text-muted">added {{ \Carbon\Carbon::parse($com->created_at)->diffForHumans() }}</p>
        @empty
            <p>no comments yet</p>
        @endforelse
    </div>

    </div>
@endsection