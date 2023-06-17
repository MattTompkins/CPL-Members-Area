<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactsTable extends Component
{

    public $search = '';
    public $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteMember'];

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('launch-delete-modal');
    }

    public function contact()
    {
        $member = Contact::findOrFail($this->delete_id);
        $member->delete();
        app('toast')->create( "This contact has been successfully deleted.", 'success');
    }


    public function render()
    {
        return view('livewire.contacts-table', [
            'contacts' => Contact::search($this->search)->paginate(15)
        ]);
    }
}
