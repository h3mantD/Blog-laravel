@extends('template')

@section('content')
    
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div><input type="text" value="{{ old('title') }}" name='title'></div>
        @error('title')
            {{ $message }}
        @enderror
        <div><input type="text" value="{{ old('content') }}" name='content'></div>
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

        <div><input type="submit" name='submit' value="Create Post"></div>
        
    </form>

@endsection