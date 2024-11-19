<?php

namespace App\Livewire\Message;

use App\Models\Support;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public array $messages = [];

    #[On('refresh-messages')]
    public function mount()
    {
        $user = Auth::user();
        $messages_query = Support::whereHas('lines', function ($query) use ($user) {
            $query->where('sender_user_id', '!=', $user->id)->whereNull('read_at');
        })->with('initiate_user');

        if ($user->role == 'admin') {
            $this->messages = $messages_query->get()->toArray();
        } else {
            $this->messages = $messages_query->where('initiate_user_id', $user->id)->get()->toArray();
        }
    }

    public function render()
    {
        return view('livewire.message.index');
    }
}
