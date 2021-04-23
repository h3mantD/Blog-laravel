@extends('template')

@section('content')
   
    <div class="container" style="position: absolute; top:10%;">

        <form action="{{ route('user/profile-information') }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="formGroupExampleInput">Blog Title</label>
                <input type="text" name="title" value="{{ old('title', $post['title'] ) }}" class="form-control" id="formGroupExampleInput" >
                @error('title')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Content</label>
                <input type="text" name="content" value="{{ old('title', $post['content'] ) }}" class="form-control" id="formGroupExampleInput2" >
                @error('content')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add Blog">
            </div>
        </form>

    </div>



@endsection