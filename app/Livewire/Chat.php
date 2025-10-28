<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $user;
    public $message;
    public $senderId;
    public $receiverId;
    public $messages;
    public function mount($user)
    {
        $this->user = $this->getUser($user->id);
        $this->senderId = Auth::user()->id;
        $this->receiverId = $user->id;
    }
    public function render()
    {
        return view('livewire.chat');
    }

    public function getUser($userId)
    {
        return User::find($userId);
    }

    public function sendMessage() {
        $this->saveMessage();
        $this->message = '';
    }

    public function saveMessage() {
        return Message::query()->create([
            'message' => $this->message,
            'sender_id' => $this->senderId,
            'receiver_id' => $this->receiverId,
            'is_read' => false,
        ]);
    }
}
