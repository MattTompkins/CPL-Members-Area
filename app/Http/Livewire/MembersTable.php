<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class MembersTable extends Component
{

    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.members-table', 
        [
            'users' => User::search($this->search)
                ->paginate(2)
        ]);
    }
}
