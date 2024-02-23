<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;
    public $votesCount;

    public function render()
    {
        return view('livewire.idea-show');
    }
}
