<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $table = 'hashtags';

    public function tweet()
    {
        return $this->belongsTo(Tweet::class, 'tweet_id', 'id');
    }
}
