<?php

namespace App\Http\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class PostGrid extends Component
{
    public $posts;

    protected $listeners = ['updatePostGrid' => 'updateGrid'];

    public function updateGrid() {
        $this->posts = BlogPost::orderby('created_at', 'desc')->get();
    }

    public function mount() {
        $this->posts = BlogPost::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.post-grid', ['posts' => $this->posts]);
    }
}
