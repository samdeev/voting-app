<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_of_ideas_show_on_main_page()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create();
        $categoryTwo = Category::factory()->create();

        $statusOne = Status::factory()->create();
        $statusTwo = Status::factory()->create();

        $ideaOne = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'status_id' => $statusOne->id
        ]);
        $ideaTwo = Idea::factory()->create([
            'category_id' => $categoryTwo->id,
            'status_id' => $statusTwo->id
        ]);

        $response = $this->get(route('ideas.index'));

        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($categoryOne->title);
        $response->assertSee($categoryTwo->title);
        $response->assertSee($statusOne->name);
        $response->assertSee($statusTwo->name);

    }

    public function test_single_idea_shows_correctly_on_show_page()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $idea = Idea::factory()->create([
            'category_id' => $category->id,
            'status_id' => $status->id
        ]);

        $response = $this->get(route('ideas.show', $idea));

        $response->assertSuccessful();
        $response->assertViewHas('idea.title', $idea->title);
        $response->assertViewHas('idea.description', $idea->description);
    }

    public function test_ideas_pagination_works()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $ideas = Idea::factory(11)->create([
            'category_id' => $category->id,
            'status_id' => $status->id
        ]);

        $response = $this->get('/');

        collect($ideas)->forPage(1, 10)->each(function ($idea) use ($response) {
            $response->assertSee($idea->title);
        });

        $lastItem =  collect($ideas)->last();
        $response->assertDontSee($lastItem);

        $response = $this->get('/?page=2');
        $response->assertSee($lastItem->title);
    }

    public function test_single_idea_has_unique_slug()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $idea = Idea::factory()->create([
            'category_id' => $category->id,
            'status_id' => $status->id
        ]);

        $response = $this->get(route('ideas.show', $idea));

        $this->assertTrue(request()->path() === 'ideas/' . $idea->slug);
    }
}

