<div>
    @livewire('create-post')
    <hr>
    @foreach ($posts as $post)
        @livewire('post', ['post' => $post], key($post->id))    
    @endforeach
</div>
