<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class DeleteUserButton extends Component
{
    public $userId; // Add the userId property

    protected $listeners = ['deleteConfirmed' => 'deleteMember'];

    public function deleteConfirmation($id)
    {
        $this->userId = $id;
        $this->dispatchBrowserEvent('launch-delete-modal');
    }

    public function deleteMember()
    {
        $member = User::findOrFail($this->userId);
        $member->delete();
        redirect()->route('members.index');
    }

    public function render()
    {
        return view('livewire.delete-user-button');
    }
}
