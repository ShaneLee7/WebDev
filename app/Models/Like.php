<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /** @use HasFactory<\Database\Factories\LikeFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
    ];
    /**
     * Get the original comment
     *
     * @return string
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the original post
     *
     * @return string
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

   /**
     * Get the total number of likes for the comment.
     *
     * @return int
     */
    public function totalLikes(): int
    {
        return $this->hasMany(Like::class)->count();
    }
}
