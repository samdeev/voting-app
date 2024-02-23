<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Response;

class CreateIdea extends Component
{
    public $title;
    public $category_id = 1;
    public $description;
    public function createIdea()
    {
        $validated = $this->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|min:4',
            'description' => 'required|min:4',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($this->title);

        if (auth()->check()) {
            Idea::create($validated);

            session()->flash('success', 'Idea was added successfully');

            $this->reset();

            return redirect()->route('ideas.index');
        }

        abort(Response::HTTP_FORBIDDEN);

    }
    public function render()
    {
        $categories = Category::all();

        return view('livewire.create-idea', [
            'categories' => $categories
        ]);
    }
}
