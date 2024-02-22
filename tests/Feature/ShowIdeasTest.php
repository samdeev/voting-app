<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_of_ideas_show_on_main_page()
    {
        $ideas = Idea::factory(5)->create();

        $response = $this->get(route('ideas.index'));

        $response->assertSuccessful();

        collect($ideas)->each(function ($idea) use ($response) {
            $response->assertSee($idea->title);
        });

    }

    public function test_single_idea_shows_correctly_on_show_page()
    {
        $idea = Idea::factory()->create();

        $response = $this->get(route('ideas.show', $idea));

        $response->assertSuccessful();
        $response->assertSee(data_get($idea, 'title'));
        $response->assertSee(data_get($idea, 'description'));
    }

    public function test_ideas_pagination_works()
    {
        $ideas = Idea::factory(11)->create();

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
        $idea = Idea::factory()->create();

        $response = $this->get(route('ideas.show', $idea));

        $response->assertSuccessful();
        
        $this->assertTrue(request()->path() === "ideas/$idea->slug");
    }
}

