<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    protected $table = 'tweets';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function hashtags()
    {
        return $this->hasMany(Hashtag::class, 'tweet_id', 'id');
    }
}
