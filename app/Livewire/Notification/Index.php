<?php

namespace App\Livewire\Notification;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public array $notifications = [];

    public function mount()
    {
        $this->notifications = Notification::where('user_id', Auth::user()->id)->get()->toArray();
    }

    public function render()
    {
        return view('livewire.notification.index');
    }
}
