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
    public function index($msg = null)
    {
        $tweets = Tweet::
            orderBy('created_at','desc')
            ->take(20)
            ->get();
        foreach ($tweets as $tweet) {
            $tweet->tweet = Hashtag::linkToHashtag($tweet->tweet);
        }

        return view('index', [
            'tweets'    => $tweets,
            'msg'       => $msg,
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
        if(is_null($request->username)){
            return redirect()->route('tweet.new',['msg' => 'O user é requerido', 'username' => '', 'tweet' => $request->tweet]);
        }
        if(is_null($request->tweet)){
            return redirect()->route('tweet.new',['msg' => 'O tweet é requerido', 'username' => $request->username, 'tweet' => '']);
        }
        if(strlen($request->tweet) > 280){
            return redirect()->route('tweet.new',['msg' => 'O tweet excedeu o máximo de 280 caracteres.', 'username' => $request->username, 'tweet' => $request->tweet]);
        }

        $tweet = new Tweet();
        $tweet->user = strtolower($request->username);
        $tweet->tweet = $request->tweet;
        $tweet->save();

        $hashtags = Hashtag::searchHashtags($tweet->tweet);
        foreach ($hashtags as $value) {
            $hashtag = new Hashtag();
            $hashtag->tweet_id = $tweet->id;
            $hashtag->hashtag = $value;
            $hashtag->save();
        }

        return redirect()->route('tweet.index');
    }

    public function tweet(Request $request)
    {
        $msgError = (is_null($request->msg)) ? '' : $request->msg;
        $username = (is_null($request->username)) ? '' : $request->username;
        $tweet = (is_null($request->tweet)) ? '' : $request->tweet;

        return view('tweet', [
            'msgError' => $msgError,
            'username' => $request->username,
            'tweet' => $request->tweet,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet)
    {
        //
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
    public function destroy($id)
    {
        $tweet = Tweet::where('id', $id)->first() ?? '';
        if(!empty($tweet)){
            $tweet->delete();
            $msg = 'Tweet removido com sucesso';
        } else {
            $msg = 'Tweet não encontrado';
        }

        return redirect()->route('tweet.index', $msg);
    }
}
