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

    public static function searchHashtags($string) {
        $hashtags = array();
        preg_match_all("/#(\w+)/u", $string, $matches);
        if ($matches) {
            $hashtagsArray = array_count_values($matches[1]);
            $hashtags = array_keys($hashtagsArray);
        }
        return $hashtags;
    }

    public static function linkToHashtag($tweet)
    {
        $hashtags = self::searchHashtags($tweet);
        foreach ($hashtags as $hashtag) {
            $tweet = str_replace($hashtag , '<a href="'. route('hashtag.index', $hashtag) .'">'. $hashtag .'</a>', $tweet);
        }
        return $tweet;
    }
}
