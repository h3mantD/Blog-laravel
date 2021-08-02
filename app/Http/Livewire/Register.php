<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirm;
    
    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirm' => 'required_with:password|same:password|min:6'
    ];

    public function updated($parameter) {
        $this->validateOnly($parameter);
    }

    public function submit() {
        $this->validate();
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();
        
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
