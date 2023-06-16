<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Accordion extends Component
{
    public $items = [];

    public $activeItem = null;

    public function mount($items)
    {
        $this->items = $items;
    }

    public function toggleItem($index)
    {
        if ($this->activeItem === $index) {
            $this->activeItem = null;
        } else {
            $this->activeItem = $index;
        }
    }

    public function render()
    {
        return view('livewire.accordion');
    }
}
