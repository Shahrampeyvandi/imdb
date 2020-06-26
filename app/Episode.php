<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $guarded = ['id'];


    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
