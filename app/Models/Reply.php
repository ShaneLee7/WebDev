<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /** @use HasFactory<\Database\Factories\ReplyFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment_id',
        'content',
    ];
    /**
     * Get original user
     *
     * @return string
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get comment being replied
     *
     * @return string
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
