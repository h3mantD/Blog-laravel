<?php

namespace App\Http\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class Post extends Component
{
    public $post;

    public function mount(BlogPost $post) {
        $this->post = $post;
    }
    public function deletePost($id) {
        BlogPost::find($id)->delete();
        $this->emit('updatePostGrid');
    }

    public function render()
    {
        return view('livewire.post');
    }
}
