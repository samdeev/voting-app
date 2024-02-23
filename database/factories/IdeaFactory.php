<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(5, true);

        return [
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'status_id' => Status::all()->random()->id,
            'title' =>$title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(5),
        ];
    }
}
