<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\Hashtag;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tweet = new Tweet();
        $tweet->user = $request->username;
        $tweet->tweet = $request->tweet;
        $tweet->save();

        $hashtags = $this->searchHashtags($tweet->tweet);
        foreach ($hashtags as $value) {
            $hashtag = new Hashtag();
            $hashtag->tweet_id = $tweet->id;
            $hashtag->hashtag = $value;
            $hashtag->save();
        }

        dd($tweet);
        return view('index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        return $tweet->hashtags()->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tweet $tweet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        //
    }

    function searchHashtags($string) {
        $hashtags = array();
        preg_match_all("/#(\w+)/u", $string, $matches);
        if ($matches) {
            $hashtagsArray = array_count_values($matches[1]);
            $hashtags = array_keys($hashtagsArray);
        }
        return $hashtags;
    }
}
