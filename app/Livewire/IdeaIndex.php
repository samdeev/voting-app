<?php

namespace App\Livewire;

use Livewire\Component;

class IdeaIndex extends Component
{
    public $idea;
    public $votesCount;
    public function render()
    {
        return view('livewire.idea-index');
    }
}
