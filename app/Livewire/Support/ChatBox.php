<?php

namespace App\Livewire\Support;

use App\Models\Support;
use App\Models\SupportLine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatBox extends Component
{
    public ?array $support = null;
    public ?string $message = null;

    protected $rules = [
        'message' => 'required',
    ];

    #[On('view-support')]
    public function view(int $support)
    {
        $this->support = Support::with('initiate_user', 'lines')->find($support)->toArray();
        SupportLine::where('support_id', $this->support['id'])->where('sender_user_id', '!=', Auth::user()->id)->whereNull('read_at')->update([
            'read_at' => now(),
        ]);
        $this->dispatch('refresh-messages');
    }

    public function send()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            SupportLine::create([
                'sender_user_id' => Auth::user()->id,
                'support_id' => $this->support['id'],
                'message' => $this->message,
            ]);

            DB::commit();
            $this->message = null;
            $this->dispatch('view-support', $this->support['id']);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updatedSupportStatus($value)
    {
        Support::where('id', $this->support['id'])->update([
            'status' => $value,
        ]);
        $this->dispatch('refresh-chat-list');
        $this->dispatch('toast', 'success', 'Status support updated successfully');
    }

    public function render()
    {
        return view('livewire.support.chat-box');
    }
}
