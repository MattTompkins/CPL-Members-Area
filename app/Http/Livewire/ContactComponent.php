<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactComponent extends Component
{
    public $contact;
    public $editing = false;
    
    protected $rules = [
        'contact.name'         => 'required|string',
        'contact.organisation' => 'required|string',
        'contact.email'        => 'nullable|email',
        'contact.phone1'       => 'nullable|string',
        'contact.phone2'       => 'nullable|string',
        'contact.notes'        => 'nullable|string',
    ];

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
    
    public function toggleEditMode()
    {
        $this->editing = !$this->editing;
    }
    
    public function save()
    {
        $this->validate();
        
        $this->contact->save();
        
        $this->editing = false;
    }
}
