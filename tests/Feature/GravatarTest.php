<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GravatarTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_generate_gravatar_default_image(): void
    {
        $user = User::factory()->create();

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://gravatar.com/avatar/' . md5($user->email) . '?s=200&d=monsterid',
            $gravatarUrl
        );

    }

    public function test_check_if_user_gravatar_image_exists()
    {
        $user = User::factory()->create();

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }
}
