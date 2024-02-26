<?php

namespace Tests\Feature;

use App\Livewire\IdeaShow;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

class VoteShowPageTest extends TestCase
{
    use RefreshDatabase;
    public function test_idea_livewire_components_exists_on_show_page()
    {
       $user = User::factory()->create();

       $category = Category::factory()->create();

       $status = Status::factory()->create();

       $idea = Idea::factory()->create([
        'user_id' => $user->id,
        'category_id' => $category->id,
        'status_id' => $status->id,
        'title' => 'Test Title',
        'slug' => Str::slug('Test Title'),
        'description' => 'Test description',
       ]);

       $this->get(route('ideas.show', $idea))->assertSeeLivewire('idea-show');
    }

    public function test_show_page_correctly_receives_votes()
    {
       $user = User::factory()->create();
       $userB = User::factory()->create();

       $category = Category::factory()->create();

       $status = Status::factory()->create();

       $idea = Idea::factory()->create([
        'user_id' => $user->id,
        'category_id' => $category->id,
        'status_id' => $status->id,
        'title' => 'Test Title',
        'slug' => Str::slug('Test Title'),
        'description' => 'Test description',
       ]);

       Vote::factory()->create([
        'user_id' => $user->id,
        'idea_id' => $idea->id
       ]);
       Vote::factory()->create([
        'user_id' => $userB->id,
        'idea_id' => $idea->id
       ]);

       $this->get(route('ideas.show', $idea))->assertViewHas('votesCount', 2);
    }

    public function test_votes_count_shows_correctly_on_show_page_livewire_component()
    {
       $user = User::factory()->create();

       $category = Category::factory()->create();

       $status = Status::factory()->create();

       $idea = Idea::factory()->create([
        'user_id' => $user->id,
        'category_id' => $category->id,
        'status_id' => $status->id,
        'title' => 'Test Title',
        'slug' => Str::slug('Test Title'),
        'description' => 'Test description',
       ]);

       Livewire::test(IdeaShow::class)
        ->set('idea', $idea)
        ->set('votesCount', 5)
        ->assertSet('votesCount', 5)
        ->assertSeeHtml('<div class="text-xl leading-snug">5</div');
    }
}
