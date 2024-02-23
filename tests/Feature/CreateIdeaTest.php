<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Status;
use Livewire\Livewire;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Livewire\CreateIdea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;

    public function test_hide_create_idea_form_when_logged_out()
    {
        $response = $this->get(route('ideas.index'));

        $response->assertSuccessful();
        $response->assertSee('Login');
        $response->assertSee('Sign Up');
    }

    public function test_show_create_idea_form_when_logged_in()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('ideas.index'));

        $response->assertSuccessful();
        $response->assertSee('Let us know what you would like and we\'ll take a look over!', false);
        $response->assertSee('Attach');
        $response->assertSee('Submit');
    }

    public function test_main_page_contains_create_idea_form_livewire_component()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('ideas.index'))
            ->assertSeeLivewire('create-idea');
    }

    public function test_create_idea_validation_works()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category_id', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category_id', 'description'])
            ->assertSee('The title field is required.');
    }

    public function test_create_idea_works_properly()
    {
        $user = User::factory()->create();

        $category = Category::factory()->create();

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('user_id', $user->id)
            ->set('category_id', $category->id)
            ->set('status_id', Status::factory()->create())
            ->set('title', 'Test Title')
            ->set('slug', Str::slug('Test Title'))
            ->set('description', 'Test description')
            ->call('createIdea')
            ->assertRedirect(route('ideas.index'));

        $response = $this->get(route('ideas.index'));
        $response->assertSuccessful();
        $response->assertSee('Test Title');
        $response->assertSee('Test description');

        $this->assertDatabaseHas('ideas', [
            'title' => 'Test Title'
        ]);
    }
}
