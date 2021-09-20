<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieGenres;
use App\Models\User;
use App\Models\Watchlist;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Float_;
use Similarity;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'movie_name' => 'required',
            'movie_genre' => 'required',
            'score' => 'required'
        ]);
        // dd($request->score);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $watchlist = new Watchlist();
            $watchlist->movie_name = $request->movie_name;
            $watchlist->cover_photo = $request->movie_img_url;
            $watchlist->user_id = $request->user_id;
            $watchlist->rating = $request->score;
            foreach ($request->movie_genre as $genrerequest) {
                $watchlist->genre =  $genrerequest;
            }
            $watchlist->movie_id = $request->movieID;
            $watchlist->save();
            return redirect()->back()->with('success', 'Successfully added movie in your watchlist!');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = new Client();
        $res = $client->get('http://api.tvmaze.com/shows/' . $id);
        $movie_details = json_decode($res->getBody());
        return view('site.movie_details', compact('movie_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
