<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $component;

    public function render()
    {
        return view('livewire.home')->extends('testing-livewire');
    }
}
