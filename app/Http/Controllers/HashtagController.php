<?php

namespace App\Http\Controllers;

use App\Hashtag;
use App\Tweet;
use Illuminate\Http\Request;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hashtag)
    {
        // $tweets = Tweet::orderBy('created_at','desc')->take(20)->get();
        // $tweets = Tweet::orderBy('created_at','desc')->take(20)->get();
        // foreach ($tweets as $tweet) {
        //     $tweet->tweet = Hashtag::linkToHashtag($tweet->tweet);
        // }
        // dd($tweets[0]->hashtags());
        $hashtags = Hashtag::where('hashtag', $hashtag)->orderBy('created_at','desc')->take(20)->get();
        $tweets = collect();
        foreach ($hashtags as $hashtag) {
            $tweet = $hashtag->tweet()->first();
            $tweet->tweet = Hashtag::linkToHashtag($tweet->tweet);
            $tweets->push($tweet);
        }

        return view('index', [
            'tweets'    => $tweets,
            'hashtag'   => $hashtag->hashtag,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function show(Hashtag $hashtag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function edit(Hashtag $hashtag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hashtag $hashtag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hashtag  $hashtag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hashtag $hashtag)
    {
        //
    }
}
