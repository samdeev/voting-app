<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use App\Models\Vote;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IdeaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_check_if_idea_is_voted_for_by_user()
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
            'description' => 'Test Description'
        ]);

        Vote::factory()->create([
            'user_id' => $user->id,
            'idea_id' => $idea->id
        ]);

        $this->assertTrue($idea->isVotedByUser($user));
        $this->assertFalse($idea->isVotedByUser(null));
    }
}
