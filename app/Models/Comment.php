<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class Comment extends Model
{
    use HasFactory;

    /**
     * Get the Post that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
