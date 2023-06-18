<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class DeleteEventButton extends Component
{
    public $eventID; // Add the userId property

    protected $listeners = ['deleteConfirmed' => 'deleteEvent'];

    public function deleteConfirmation($id)
    {
        $this->eventID = $id;
        $this->dispatchBrowserEvent('launch-delete-modal');
    }

    public function deleteEvent()
    {
        $event = Event::findOrFail($this->eventID);
        $event->delete();
        app('toast')->create( "This event has been successfully deleted.", 'success');
        redirect()->route('events.index');
    }

    public function render()
    {
        return view('livewire.delete-event-button');
    }
}
