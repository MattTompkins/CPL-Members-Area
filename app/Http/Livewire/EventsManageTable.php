<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class EventsManageTable extends Component
{
    use WithPagination;

    public $search = '';
    
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
