<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
			'title' => $this->faker->name,
			'body' => $this->faker->name,
			'user_id' => $this->faker->name,
        ];
    }
}
