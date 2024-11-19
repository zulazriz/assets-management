<?php

namespace App\Livewire\Support;

use App\Models\Support;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatList extends Component
{
    public array $supports = [];
    public ?string $by_status = null;
    public ?string $by_subject = null;

    #[On('refresh-chat-list')]
    public function mount()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            $this->supports = Support::with('initiate_user')->get()->toArray();
        } else {
            $this->supports = Support::where('initiate_user_id', $user->id)->with('initiate_user')->get()->toArray();
        }
    }

    public function render()
    {
        $filtered_supports = $this->supports;

        if ($this->by_subject) {
            $by_subject = $this->by_subject;
            $filtered_supports = array_filter($filtered_supports, function ($chat) use ($by_subject) {
                return str_contains($chat['subject'], $by_subject);
            });
        }

        if ($this->by_status) {
            $by_status = $this->by_status;
            $filtered_supports = array_filter($filtered_supports, function ($chat) use ($by_status) {
                return $chat['status'] == $by_status;
            });
        }

        return view('livewire.support.chat-list', [
            'filtered_supports' => $filtered_supports,
        ]);
    }
}
