<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        $models = [
            Post::class,
            Video::class,
        ];
        $model = $this->faker->randomElement($models);
        return [
            'body' => $this->faker->paragraph,
            'post_id' => Post::factory() ,// Associate with a random post
            'commentable_id' => $model::factory(),
            'commentable_type' => $model,
        ];
    }
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
