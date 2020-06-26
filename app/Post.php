<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'awards' => 'array'
    ];

       public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }

    
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

     public function videos()
    {
        return $this->morphMany(Video::class, 'videoble');
    }
    // image and comment may be for videos or blogs


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // votes may be for videos or comments
    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }


    public function actores()
    {
        return $this->belongsToMany(Actor::class, 'actor_video', 'video_id', 'actor_id');
    }

    public function trailer()
    {
        return $this->hasOne(Trailer::class);
    }
}
