<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public $user;
    public function mount($user)
    {
        $this->user = $this->getUser($user->id);
    }
    public function render()
    {
        return view('livewire.chat');
    }

    public function getUser($userId)
    {
        return User::find($userId);
    }
}
