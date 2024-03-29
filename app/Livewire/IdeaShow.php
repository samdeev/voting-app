<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;

    public function mount(Idea $idea)
    {
        $this->hasVoted = $idea->voted_by_user;
    }

    public function render()
    {
        return view('livewire.idea-show');
    }
}
