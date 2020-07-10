<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $guarded = ['id'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
