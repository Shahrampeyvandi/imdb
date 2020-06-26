<?php

namespace App;

use CategoryVideo;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = ['id'];

    public function videoble()
    {
        return $this->morphTo();
    }
 
}
