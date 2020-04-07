<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'tweets';

    public function hashtags()
    {
        return $this->hasMany(Hashtag::class, 'tweet_id', 'id');
    }
}
