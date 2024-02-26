<?php

namespace Tests\Feature;

use App\Livewire\IdeaIndex;
use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteIndexPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_idea_livewire_components_exists_on_index_page()
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

       $this->get(route('ideas.index'))->assertSeeLivewire('idea-index');
    }

    public function test_index_page_correctly_receives_votes()
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

       $this->get(route('ideas.index'))->assertViewHas('ideas', fn ($ideas) => $ideas->first()->votes_count === 2 );
    }

    // public function test_votes_count_shows_correctly_on_index_page_livewire_component()
    // {
    //    $user = User::factory()->create();

    //    $category = Category::factory()->create();

    //    $status = Status::factory()->create();

    //    $idea = Idea::factory()->create([
    //     'user_id' => $user->id,
    //     'category_id' => $category->id,
    //     'status_id' => $status->id,
    //     'title' => 'Test Title',
    //     'slug' => Str::slug('Test Title'),
    //     'description' => 'Test description',
    //    ]);

    //    Livewire::test(IdeaIndex::class)
    //     ->set('idea', $idea)
    //     ->set('votesCount', 5)
    //     ->assertSet('votesCount', 5)
    //     ->assertSeeHtml('<div class="font-semibold text-2xl">5</div>')
    //     ->assertSeeHtml('<div class="text-sm font-bold leading-none">5</div>');
    // }
}
