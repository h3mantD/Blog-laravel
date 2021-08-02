<div>
    <h3>{{ $post->title }}</h3> 
    <p style="cursor: pointer" wire:click="deletePost('{{ $post->id }}')"><b>delete post</b></p>
</div>
