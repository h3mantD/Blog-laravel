<?php

namespace App\Http\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class CreatePost extends Component
{
    public $title;
    public $body;

    public function createPost() {
        $post = new BlogPost();
        $post->title = $this->title;
        $post->content = $this->body;
        $post->user_id = 1;
        $post->save();

        $this->emit('updatePostGrid');
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
