<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class EventsManageTable extends Component
{
    use WithPagination;

    public $search = '';
    public $delete_id;
    
    protected $listeners = ['deleteConfirmed' => 'deleteEvent'];

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('launch-delete-modal');
    }

    public function deleteEvent()
    {
        $event = Event::findOrFail($this->delete_id);
        $event->delete();
        app('toast')->create( "This event has been successfully deleted.", 'success');
    }

    public function render()
    {
        return view(
            'livewire.events-manage-table',
            [
                'events' => Event::search($this->search)->paginate(15),
            ]
        );
    }
}
