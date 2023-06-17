<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactsTable extends Component
{

    public $search = '';
    public $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteContact'];

    public function deleteConfirmation($id)
    {
        $this->dispatchBrowserEvent('log-message', ['message' => 'Hello from Livewire!']);

        $this->delete_id = $id;
        $this->dispatchBrowserEvent('launch-delete-modal');
    }

    public function deleteContact()
    {
        if ($this->delete_id) {
            $contact = Contact::findOrFail($this->delete_id);
            $contact->delete();
            app('toast')->create("This contact has been successfully deleted.", 'success');
        }
    }


    public function render()
    {
        return view('livewire.contacts-table', [
            'contacts' => Contact::search($this->search)->paginate(15)
        ]);
    }
}
