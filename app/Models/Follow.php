<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
     /** @use HasFactory<\Database\Factories\FollowFactory> */
    use HasFactory;

    protected $fillable = [
        'follower_id',
        'followed_id',
    ];

    /**
     * Get the user that is a follower
     *
     * @return int
     */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }
    
    /**
    * Get the user that is followed.
    *
    * @return int
    */
    public function followed()
{
    return $this->belongsTo(User::class, 'followed_id');
}


}
