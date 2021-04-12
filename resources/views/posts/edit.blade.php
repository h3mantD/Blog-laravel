@extends('template')

@section('content')
    
    <form action="{{ route('posts.update', ['post'=>$post['id']]) }}" method="POST">
        @csrf
        @method('put')
        <div><input type="text" value="{{ old('title', $post['title'] ) }}" name='title'></div>
        @error('title')
            {{ $message }}
        @enderror
        <div><input type="text" value="{{ old('content', $post['content'] ) }}" name='content'></div>
        @error('content')
            {{ $message }}
        @enderror
        {{-- this will display all the errorss --}}
        {{-- @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div><input type="submit" name='submit' value="Update Post"></div>
        
    </form>

@endsection