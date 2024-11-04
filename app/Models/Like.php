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
     * Get the user that owns the like
     * 
     * @return string
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the liked post
     *
     * @return string
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }


}
