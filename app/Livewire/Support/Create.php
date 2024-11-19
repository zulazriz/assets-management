<?php

namespace App\Livewire\Support;

use App\Helpers\FileHelper;
use App\Models\Support;
use App\Models\SupportLine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public array $support = [];

    protected $rules = [
        'support.subject' => 'required|string',
        'support.message' => 'required|string',
        'support.attachments' => 'nullable|array',
        'support.attachments.*' => 'file',
    ];

    public function create()
    {
        $this->validate();

        $user = Auth::user();

        DB::beginTransaction();

        try {
            if (isset($this->support['attachments'])) {
                $this->support['attachments'] = implode('|', array_map(function ($attachment) {
                    return FileHelper::saveFile($attachment);
                }, $this->support['attachments']));
            }

            $created_support = Support::create(array_merge($this->support, [
                'initiate_user_id' => $user->id,
                'status' => 'sent',
            ]));

            SupportLine::create(array_merge($this->support, [
                'support_id' => $created_support->id,
                'sender_user_id' => $user->id,
            ]));

            DB::commit();
            return redirect()->route('support.index.show')->with([
                'toastStatus' => 'success',
                'toastMessage' => 'Support created successfully',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            redirect()->route('support.index.show')->with([
                'toastStatus' => 'error',
                'toastMessage' => 'Something wrong!',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.support.create');
    }
}
