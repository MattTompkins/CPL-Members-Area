<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class MembersTable extends Component
{
    use WithPagination;

    public $search = '';
    public $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteMember'];

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('launch-delete-modal');
    }

    public function deleteMember()
    {
        $member = User::findOrFail($this->delete_id);
        $member->delete();
        app('toast')->create( "This account has been successfully deleted.", 'success');
    }

    public function render()
    {
        return view('livewire.members-table', [
            'users' => User::search($this->search)->paginate(15)
        ]);
    }
}
