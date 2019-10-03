<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCachedCommentsCountAttribute()  //mutator
    {
        return \Cache::remember(
            $this->cacheKey() . ':comments_count',
            5,
            function () {
                return $this->comments()->count(); //select count
            }
        );
    }

    public function cacheKey() //posts_1_2019-10-02
    {
        return sprintf(
            "%s/%s/%s",
            $this->getTable(),
            $this->getKey(),
            $this->updated_at->timestamp
        );
    }
}
